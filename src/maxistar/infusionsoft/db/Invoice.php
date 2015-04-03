<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from Invoice.html
 * Invoice Table
 */
namespace maxistar\infusionsoft\db;

class Invoice {
    /**
     * Table name
     */
	const TABLE_NAME = 'Invoice';

	/**
	 * Id	 
	 */
	const ID = 'Id';

	/**
	 * ContactId	 
	 */
	const CONTACT_ID = 'ContactId';

	/**
	 * JobId	 
	 */
	const JOB_ID = 'JobId';

	/**
	 * DateCreated	 
	 */
	const DATE_CREATED = 'DateCreated';

	/**
	 * InvoiceTotal	 
	 */
	const INVOICE_TOTAL = 'InvoiceTotal';

	/**
	 * TotalPaid	 
	 */
	const TOTAL_PAID = 'TotalPaid';

	/**
	 * TotalDue	 
	 */
	const TOTAL_DUE = 'TotalDue';

	/**
	 * CreditStatus	 
	 */
	const CREDIT_STATUS = 'CreditStatus';

	/**
	 * RefundStatus	 
	 */
	const REFUND_STATUS = 'RefundStatus';

	/**
	 * PayPlanStatus	 
	 */
	const PAY_PLAN_STATUS = 'PayPlanStatus';

	/**
	 * AffiliateId	 
	 */
	const AFFILIATE_ID = 'AffiliateId';

	/**
	 * LeadAffiliateId	 
	 */
	const LEAD_AFFILIATE_ID = 'LeadAffiliateId';

	/**
	 * PromoCode	 
	 */
	const PROMO_CODE = 'PromoCode';

	/**
	 * InvoiceType	 
	 */
	const INVOICE_TYPE = 'InvoiceType';

	/**
	 * Description	 
	 */
	const DESCRIPTION = 'Description';

	/**
	 * ProductSold	 
	 */
	const PRODUCT_SOLD = 'ProductSold';

	/**
	 * Synced	 
	 */
	const SYNCED = 'Synced';
} 
