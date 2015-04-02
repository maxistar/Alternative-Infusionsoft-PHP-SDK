<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Invoice_Service
 * Date: Thu, 02 Apr 2015 00:43:11 +0300
 * InvoiceService
 
 */
class isoft_service_Invoice extends isoft_Service {

    /**
     * createBlankOrder
     * @param int contactId The Id number of the contact record this order will be connected to
     * @param string description The name this order will display. This is also the hyperlink to the order found on the contact's order             tab
     * @param dateTime orderDate Date of order
     * @param int leadAffiliateId The Id number of the affiliate you would like placed as the lead affiliate. 0 if no affiliate should be             attached
     * @param int saleAffiliateId The Id number of the affiliate you would like placed as the sale affiliate. 0 if no affiliate should be             attached
	 */
	function createBlankOrder($contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId){
	    return $this->owner->call('InvoiceService.createBlankOrder', $contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId);
	}

    /**
     * addOrderItem
     * @param int invoiceId The Id number of the invoice this item is being added to
     * @param int productId The Id number of the product you are adding. If you are adding something such as tax, shipping, or a             discount, make this 0
     * @param int type The line item type - defined in the table below
     * @param double price The price of this line item.
     * @param int quantity The quantity of item added
     * @param string description The short description of this line item
     * @param string notes A full description for this line item
	 */
	function addOrderItem($invoiceId, $productId, $type, $price, $quantity, $description, $notes){
	    return $this->owner->call('InvoiceService.addOrderItem', $invoiceId, $productId, $type, $price, $quantity, $description, $notes);
	}

    /**
     * chargeInvoice
     * @param int invoiceId The Invoice Id you would like to charge the balance due on
     * @param string notes A note about the payment. Ex: "API Upsell Payment"
     * @param int creditCardId The Id number of the credit card being charged
     * @param int merchantAccountId The Id number of the merchant account the payment is to process through
     * @param boolean bypassCommissions A boolean telling the system if this payment should count towards affiliate commissions earned. This is             almost always false.
	 */
	function chargeInvoice($invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions){
	    return $this->owner->call('InvoiceService.chargeInvoice', $invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions);
	}

    /**
     * deleteSubscription
     * @param int recurringOrderId The Id number of the particular subscription being deleted
	 */
	function deleteSubscription($recurringOrderId){
	    return $this->owner->call('InvoiceService.deleteSubscription', $recurringOrderId);
	}

    /**
     * deleteInvoice
     * @param int invoiceId The Id of the invoice
	 */
	function deleteInvoice($invoiceId){
	    return $this->owner->call('InvoiceService.deleteInvoice', $invoiceId);
	}

    /**
     * addRecurringOrder
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
	 */
	function addRecurringOrder($contactId, $allowDuplicate, $SubscriptionPlanId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge){
	    return $this->owner->call('InvoiceService.addRecurringOrder', $contactId, $allowDuplicate, $SubscriptionPlanId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge);
	}

    /**
     * createInvoiceForRecurring
     * @param int recurringOrderId The Id number for the particular subscription you want invoiced
	 */
	function createInvoiceForRecurring($recurringOrderId){
	    return $this->owner->call('InvoiceService.createInvoiceForRecurring', $recurringOrderId);
	}

    /**
     * addManualPayment
     * @param int invoiceId The Id of invoice being paid
     * @param double amt The amount of this payment
     * @param dateTime paymentDate Date of payment
     * @param string paymentType Cash, Check, Credit Card, Money Order, PayPal, etc.
     * @param string paymentDescription An area useful for noting payment details such as a check number
     * @param boolean bypassCommissions A boolean which tells the system if this payment should count towards what the affiliate has earned. This is             almost always false.
	 */
	function addManualPayment($invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions){
	    return $this->owner->call('InvoiceService.addManualPayment', $invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions);
	}

    /**
     * addPaymentPlan
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
	 */
	function addPaymentPlan($invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts){
	    return $this->owner->call('InvoiceService.addPaymentPlan', $invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts);
	}

    /**
     * calculateAmountOwed
     * @param int invoiceId The invoice Id number you would like amount owed for
	 */
	function calculateAmountOwed($invoiceId){
	    return $this->owner->call('InvoiceService.calculateAmountOwed', $invoiceId);
	}

    /**
     * getAllPaymentOptions
	 */
	function getAllPaymentOptions(){
	    return $this->owner->call('InvoiceService.getAllPaymentOptions');
	}

    /**
     * getPayments
     * @param int invoiceId The Id of the invoice you would like payments for.
	 */
	function getPayments($invoiceId){
	    return $this->owner->call('InvoiceService.getPayments', $invoiceId);
	}

    /**
     * locateExistingCard
     * @param int contactId The contact Id number for which you would like to find the credit card for
     * @param string last4 The last 4 digits of the card you need the Id number for
	 */
	function locateExistingCard($contactId, $last4){
	    return $this->owner->call('InvoiceService.locateExistingCard', $contactId, $last4);
	}

    /**
     * recalculateTax
     * @param int invoiceId The id of the invoice you want to calculate tax on
	 */
	function recalculateTax($invoiceId){
	    return $this->owner->call('InvoiceService.recalculateTax', $invoiceId);
	}

    /**
     * validateCreditCard
     * @param int creditCardId The Infusionsoft ID number of an existing credit card
	 */
	function validateCreditCard($creditCardId){
	    return $this->owner->call('InvoiceService.validateCreditCard', $creditCardId);
	}

    /**
     * getAllShippingOptions
	 */
	function getAllShippingOptions(){
	    return $this->owner->call('InvoiceService.getAllShippingOptions');
	}

    /**
     * updateJobRecurringNextBillDate
     * @param int recurringOrderId The Id number of the subscription you would like to update. retrieved from the RecurringOrder table.
     * @param date nextBillDate The next billing date the subscription is being set to.
	 */
	function updateJobRecurringNextBillDate($recurringOrderId, $nextBillDate){
	    return $this->owner->call('InvoiceService.updateJobRecurringNextBillDate', $recurringOrderId, $nextBillDate);
	}

    /**
     * addOrderCommissionOverride
     * @param int invoiceId The Id number of the invoice to create a commission on
     * @param int affiliateId The Id number of the affiliate the commission is for
     * @param int productId The Id number of the product this commission is for
     * @param int percentage The percentage paid for the product being sold
     * @param double amount Amount of commission being paid for the product sold
     * @param int payoutType How the commission should be earned - 4 if paid up front in full, 5 if earned upon customer payment
     * @param string description A note about this commission
     * @param date date Date the commission was generated, not necessarily earned (unless paid up front in full)
	 */
	function addOrderCommissionOverride($invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date){
	    return $this->owner->call('InvoiceService.addOrderCommissionOverride', $invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date);
	}
} 
