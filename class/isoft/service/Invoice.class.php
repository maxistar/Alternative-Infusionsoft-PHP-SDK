<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * InvoiceService 
 */
class isoft_service_Invoice extends isoft_Service {
	/**
	 * addManualPayment	 
	 */
	function addManualPayment($invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions){
	    return $this->owner->call('InvoiceService.addManualPayment', $invoiceId, $amt, $paymentDate, $paymentType, $paymentDescription, $bypassCommissions);
	}
	/**
	 * addOrderCommissionOverride	 
	 */
	function addOrderCommissionOverride($invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date){
	    return $this->owner->call('InvoiceService.addOrderCommissionOverride', $invoiceId, $affiliateId, $productId, $percentage, $amount, $payoutType, $description, $date);
	}
	/**
	 * addOrderItem	 
	 */
	function addOrderItem($invoiceId, $productId, $type, $price, $quantity, $title, $description){
	    return $this->owner->call('InvoiceService.addOrderItem', $invoiceId, $productId, $type, $price, $quantity, $title, $description);
	}
	/**
	 * addPaymentPlan	 
	 */
	function addPaymentPlan($invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts){
	    return $this->owner->call('InvoiceService.addPaymentPlan', $invoiceId, $autoCharge, $creditCardId, $merchantAccountId, $daysBetweenRetry, $maxRetry, $initialPmtAmt, $initialPmtDate, $planStartDate, $numPmts, $daysBetweenPmts);
	}
	/**
	 * addRecurringCommissionOverride	 
	 */
	function addRecurringCommissionOverride($recurringOrderId, $affiliateId, $amount, $payoutType, $description){
	    return $this->owner->call('InvoiceService.addRecurringCommissionOverride', $recurringOrderId, $affiliateId, $amount, $payoutType, $description);
	}
	/**
	 * addRecurringOrder	 
	 */
	function addRecurringOrder($contactId, $allowDuplicate, $cProgramId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge){
	    return $this->owner->call('InvoiceService.addRecurringOrder', $contactId, $allowDuplicate, $cProgramId, $qty, $price, $taxable, $merchantAccountId, $creditCardId, $affiliateId, $daysTillCharge);
	}
	/**
	 * calculateAmountOwed	 
	 */
	function calculateAmountOwed($invoiceId){
	    return $this->owner->call('InvoiceService.calculateAmountOwed', $invoiceId);
	}
	/**
	 * chargeInvoice	 
	 */
	function chargeInvoice($invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions){
	    return $this->owner->call('InvoiceService.chargeInvoice', $invoiceId, $notes, $creditCardId, $merchantAccountId, $bypassCommissions);
	}
	/**
	 * createBlankOrder	 
	 */
	function createBlankOrder($contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId){
	    return $this->owner->call('InvoiceService.createBlankOrder', $contactId, $description, $orderDate, $leadAffiliateId, $saleAffiliateId);
	}
	/**
	 * createInvoiceForRecurring	 
	 */
	function createInvoiceForRecurring($recurringOrderId){
	    return $this->owner->call('InvoiceService.createInvoiceForRecurring', $recurringOrderId);
	}
	/**
	 * deleteInvoice	 
	 */
	function deleteInvoice($invoiceId){
	    return $this->owner->call('InvoiceService.deleteInvoice', $invoiceId);
	}
	/**
	 * deleteSubscription	 
	 */
	function deleteSubscription($recurringOrderId){
	    return $this->owner->call('InvoiceService.deleteSubscription', $recurringOrderId);
	}
	/**
	 * getAllPaymentOptions	 
	 */
	function getAllPaymentOptions(){
	    return $this->owner->call('InvoiceService.getAllPaymentOptions');
	}
	/**
	 * getAllShippingOptions	 
	 */
	function getAllShippingOptions(){
	    return $this->owner->call('InvoiceService.getAllShippingOptions');
	}
	/**
	 * getPayments	 
	 */
	function getPayments($invoiceId){
	    return $this->owner->call('InvoiceService.getPayments', $invoiceId);
	}
	/**
	 * locateExistingCard	 
	 */
	function locateExistingCard($contactId, $last4){
	    return $this->owner->call('InvoiceService.locateExistingCard', $contactId, $last4);
	}
	/**
	 * recalculateTax	 
	 */
	function recalculateTax($invoiceId){
	    return $this->owner->call('InvoiceService.recalculateTax', $invoiceId);
	}
	/**
	 * updateJobRecurringNextBillDate	 
	 */
	function updateJobRecurringNextBillDate($recurringOrderId, $NextBillDate){
	    return $this->owner->call('InvoiceService.updateJobRecurringNextBillDate', $recurringOrderId, $NextBillDate);
	}
	/**
	 * validateCreditCard	 
	 */
	function validateCreditCard($creditCardId){
	    return $this->owner->call('InvoiceService.validateCreditCard', $creditCardId);
	}
	/**
	 * validateCreditCard_2	 
	 */
	function validateCreditCard_2($creditCardData){
	    return $this->owner->call('InvoiceService.validateCreditCard', $creditCardData);
	}
} 
