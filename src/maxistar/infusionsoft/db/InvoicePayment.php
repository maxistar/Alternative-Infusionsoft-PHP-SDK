<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from InvoicePayment.html
 * InvoicePayment Table
 */
namespace maxistar\infusionsoft\db;

class InvoicePayment {
    /**
     * Table name
     */
	const TABLE_NAME = 'InvoicePayment';

	/**
	 * Id	 
	 */
	const ID = 'Id';

	/**
	 * InvoiceId	 
	 */
	const INVOICE_ID = 'InvoiceId';

	/**
	 * Amt	 
	 */
	const AMT = 'Amt';

	/**
	 * PayDate	 
	 */
	const PAY_DATE = 'PayDate';

	/**
	 * PayStatus	 
	 */
	const PAY_STATUS = 'PayStatus';

	/**
	 * PaymentId	 
	 */
	const PAYMENT_ID = 'PaymentId';

	/**
	 * SkipCommission	 
	 */
	const SKIP_COMMISSION = 'SkipCommission';
} 
