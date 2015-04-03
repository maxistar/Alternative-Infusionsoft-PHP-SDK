<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Invoice_Service
 * InvoiceService
 */
namespace maxistar\infusionsoft\service;
class Invoice extends \maxistar\infusionsoft\Service {

    /**
     * InvoiceService.createBlankOrder
	 *
	 * Creates a one-time order with no added line items
     *
     * @param int contactId The Id number of the contact record this order will be connected to
     * @param string description The name this order will display. This is also the hyperlink to the order found on the contact's order             tab
     * @param dateTime orderDate Date of order
     * @param int leadAffiliateId The Id number of the affiliate you would like placed as the lead affiliate. 0 if no affiliate should be             attached
     * @param int saleAffiliateId The Id number of the affiliate you would like placed as the sale affiliate. 0 if no affiliate should be             attached
	 * @returns (int) Invoice Id for this new order
	 */
	function createBlankOrder($contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId){
	    $args = array($contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId);

	    return $this->owner->call('InvoiceService.createBlankOrder', $args);
	}

    /**
     * InvoiceService.addOrderItem
	 *
	 * Adds a line item to an order. This used to add a Product to an order as well as any other sort of     charge/discount.
     *
     * @param int invoiceId The Id number of the invoice this item is being added to
     * @param int productId The Id number of the product you are adding. If you are adding something such as tax, shipping, or a             discount, make this 0
     * @param int type The line item type - defined in the table below
     * @param double price The price of this line item.
     * @param int quantity The quantity of item added
     * @param string description The short description of this line item
     * @param string notes A full description for this line item
	 * @returns (boolean) True/False
	 */
	function addOrderItem($invoiceId, $productId, $type, $price, $quantity, $description, $notes){
	    $args = array($invoiceId, $productId, $type, $price, $quantity, $description, $notes);

	    return $this->owner->call('InvoiceService.addOrderItem', $args);
	}

    /**
     * InvoiceService.chargeInvoice
	 *
	 * This will cause a credit card to be charged for the amount currently due on an invoice
     *
     * @param int invoiceId The Invoice Id you would like to charge the balance due on
     * @param string notes A note about the payment. Ex: "API Upsell Payment"
     * @param int creditCardId The Id number of the credit card being charged
     * @param int merchantAccountId The Id number of the merchant account the payment is to process through
     * @param boolean bypassCommissions A boolean telling the system if this payment should count towards affiliate commissions earned. This is             almost always false.
	 * @returns (struct) a struct containing payment details. The struct will contain the following keys:
	 */
	function chargeInvoice($invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions){
	    $args = array($invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions);

	    return $this->owner->call('InvoiceService.chargeInvoice', $args);
	}

    /**
     * InvoiceService.deleteSubscription
	 *
	 * Deletes the specified subscription from the database, as well as all invoices tied to the subscription
     *
     * @param int recurringOrderId The Id number of the particular subscription being deleted
	 * @returns (boolean) True/False
	 */
	function deleteSubscription($recurringOrderId){
	    $args = array($recurringOrderId);

	    return $this->owner->call('InvoiceService.deleteSubscription', $args);
	}

    /**
     * InvoiceService.deleteInvoice
	 *
	 * This method is used when you would like to delete an order (not a subscription). You pass in the invoice for this     particular order, and the method handles deleting the invoice as well as the order (Job table) tied to the     invoice.
     *
     * @param int invoiceId The Id of the invoice
	 * @returns (boolean) True/False
	 */
	function deleteInvoice($invoiceId){
	    $args = array($invoiceId);

	    return $this->owner->call('InvoiceService.deleteInvoice', $args);
	}

    /**
     * InvoiceService.addRecurringOrder
	 *
	 * Creates a subscription for a contact. Subscriptions are billing automatically by Infusionsoft within the next six     hours. If you want to bill immediately you will need to utilize the InvoiceService.createInvoiceForRecurring and     InvoiceService.chargeInvoice methods to accomplish this.
     *
     * @param int contactId The Id number of the contact this subscription will be connected with
     * @param boolean allowDuplicate If duplicate subscriptions should be allowed
     * @param int SubscriptionPlanId The Id number of the subscription you are adding. This is from the SubscriptionPlan table
     * @param int qty Quantity of this service/product price - price charged per quantity
     * @param double price Price to charge for the subscription
     * @param boolean taxable If tax should be charged on this subscription
     * @param int merchantAccountId The merchant account this subscription will bill through
     * @param int creditCardId The Id of the credit card this subscription will charge to
     * @param int affiliateId The Id number for the affiliate being placed as the sale affiliate. 0 if no affiliate
     * @param int daysTillCharge The number of days until this subscription should be charged. Essentially free trial days
	 * @returns (int) Id of the newly created Subscription
	 */
	function addRecurringOrder($contactId, $allowDuplicate, $SubscriptionPlanId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge){
	    $args = array($contactId, $allowDuplicate, $SubscriptionPlanId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge);

	    return $this->owner->call('InvoiceService.addRecurringOrder', $args);
	}

    /**
     * InvoiceService.createInvoiceForRecurring
	 *
	 * This will create an invoice for all charges due on a Subscription. If the subscription has three billing cycles that     are due, it will create one invoice with all three items attached.
     *
     * @param int recurringOrderId The Id number for the particular subscription you want invoiced
	 * @returns (int) the Id of the invoice that was created, or zero if the subscription failed to generate any invoices (none     due)
	 */
	function createInvoiceForRecurring($recurringOrderId){
	    $args = array($recurringOrderId);

	    return $this->owner->call('InvoiceService.createInvoiceForRecurring', $args);
	}

    /**
     * InvoiceService.addManualPayment
	 *
	 * Adds a payment to an invoice without actually processing a charge through a merchant. This is useful if you accept     cash/check, or handle payments outside of Infusionsoft.
     *
     * @param int invoiceId The Id of invoice being paid
     * @param double amt The amount of this payment
     * @param dateTime paymentDate Date of payment
     * @param string paymentType Cash, Check, Credit Card, Money Order, PayPal, etc.
     * @param string paymentDescription An area useful for noting payment details such as a check number
     * @param boolean bypassCommissions A boolean which tells the system if this payment should count towards what the affiliate has earned. This is             almost always false.
	 * @returns (boolean) True/False
	 */
	function addManualPayment($invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions){
	    $args = array($invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions);

	    return $this->owner->call('InvoiceService.addManualPayment', $args);
	}

    /**
     * InvoiceService.addPaymentPlan
	 *
	 * Allows you to setup a custom payment plan for an invoice.
     *
     * @param int invoiceId The Id of the invoice this payment plan is fo
     * @param boolean autoCharge If the auto-charge for this pay plan should be enabled or disabled
     * @param int creditCardId Credit card being charged for this pay plan
     * @param int merchantAccountId Merchant account this pay plan will charge through
     * @param int daysBetweenRetry The number of days Infusionsoft should wait before re-attempting to charge a failed payment
     * @param int maxRetry The maximum number of times Infusionsoft should retry a failed payment
     * @param double initialPmtAmt The amount of the very first charge on this payment plan
     * @param dateTime initialPmtDate The date the first payment should occur
     * @param dateTime planStartDate The date the second payment should occur for the payment plan
     * @param int numPmts The number of payments in this payment plan. This does not include the original/first payment
     * @param int daysBetweenPmts The number of days between payments in this payment plan. This first time this comes into play will be             between the second and third payments
	 * @returns (boolean) True/False
	 */
	function addPaymentPlan($invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts){
	    $args = array($invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts);

	    return $this->owner->call('InvoiceService.addPaymentPlan', $args);
	}

    /**
     * InvoiceService.calculateAmountOwed
	 *
	 * Used to determine the outstanding amount owed on a given invoice.
     *
     * @param int invoiceId The invoice Id number you would like amount owed for
	 * @returns (double) outstanding amount on the supplied invoice
	 */
	function calculateAmountOwed($invoiceId){
	    $args = array($invoiceId);

	    return $this->owner->call('InvoiceService.calculateAmountOwed', $args);
	}

    /**
     * InvoiceService.getAllPaymentOptions
	 *
	 * This is used to retrieve all Payment Types currently setup under the Order Settings section of Infusionsoft.
     *
	 * @returns (struct) all valid payment types currently setup in the application
	 */
	function getAllPaymentOptions(){
	    $args = array();

	    return $this->owner->call('InvoiceService.getAllPaymentOptions', $args);
	}

    /**
     * InvoiceService.getPayments
	 *
	 * Retrieves all payments for a given invoice.
     *
     * @param int invoiceId The Id of the invoice you would like payments for.
	 * @returns (array) list of all payments for an invoice
	 */
	function getPayments($invoiceId){
	    $args = array($invoiceId);

	    return $this->owner->call('InvoiceService.getPayments', $args);
	}

    /**
     * InvoiceService.locateExistingCard
	 *
	 * Finds a credit card on file for a contactId that matches the last four digits of the card.
     *
     * @param int contactId The contact Id number for which you would like to find the credit card for
     * @param string last4 The last 4 digits of the card you need the Id number for
	 * @returns (int) creditCardId if the card is found. Zero if no card matches
	 */
	function locateExistingCard($contactId, $last4){
	    $args = array($contactId, $last4);

	    return $this->owner->call('InvoiceService.locateExistingCard', $args);
	}

    /**
     * InvoiceService.recalculateTax
	 *
	 * Calculates tax, and places it onto the given invoice.
     *
     * @param int invoiceId The id of the invoice you want to calculate tax on
	 * @returns (boolean) True if the operation is successful.
	 */
	function recalculateTax($invoiceId){
	    $args = array($invoiceId);

	    return $this->owner->call('InvoiceService.recalculateTax', $args);
	}

    /**
     * InvoiceService.validateCreditCard
	 *
	 * Validates a credit card in one of two ways - the first will validate an existing card in the Infusionsoft system by     grabbing card data via the credit card ID. The second takes card details as a struct and validates it without having     it already saved.
     *
     * @param int creditCardId The Infusionsoft ID number of an existing credit card
	 * @returns (struct) Valid - True or False, and Message - any message about card validation
	 */
	function validateCreditCard($creditCardId){
	    $args = array($creditCardId);

	    return $this->owner->call('InvoiceService.validateCreditCard', $args);
	}

    /**
     * InvoiceService.getAllShippingOptions
	 *
	 * Retrieves the shipping options currently setup for the Infusionsoft shopping cart.
     *
	 * @returns (boolean) all shipping options that have been configured
	 */
	function getAllShippingOptions(){
	    $args = array();

	    return $this->owner->call('InvoiceService.getAllShippingOptions', $args);
	}

    /**
     * InvoiceService.updateJobRecurringNextBillDate
	 *
	 * Changes the next bill date on a subscription.
     *
     * @param int recurringOrderId The Id number of the subscription you would like to update. retrieved from the RecurringOrder table.
     * @param date nextBillDate The next billing date the subscription is being set to.
	 * @returns (boolean) True/False
	 */
	function updateJobRecurringNextBillDate($recurringOrderId, $nextBillDate){
	    $args = array($recurringOrderId, $nextBillDate);

	    return $this->owner->call('InvoiceService.updateJobRecurringNextBillDate', $args);
	}

    /**
     * InvoiceService.addOrderCommissionOverride
	 *
	 * Creates a commission on an existing invoice.
     *
     * @param int invoiceId The Id number of the invoice to create a commission on
     * @param int affiliateId The Id number of the affiliate the commission is for
     * @param int productId The Id number of the product this commission is for
     * @param int percentage The percentage paid for the product being sold
     * @param double amount Amount of commission being paid for the product sold
     * @param int payoutType How the commission should be earned - 4 if paid up front in full, 5 if earned upon customer payment
     * @param string description A note about this commission
     * @param date date Date the commission was generated, not necessarily earned (unless paid up front in full)
	 * @returns (boolean) True/False
	 */
	function addOrderCommissionOverride($invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date){
	    $args = array($invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date);

	    return $this->owner->call('InvoiceService.addOrderCommissionOverride', $args);
	}
} 
