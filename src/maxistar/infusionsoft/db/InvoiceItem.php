<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from InvoiceItem.html
 * InvoiceItem Table
 */
namespace maxistar\infusionsoft\db;

class InvoiceItem {
    /**
     * Table name
     */
	const TABLE_NAME = 'InvoiceItem';

	/**
	 * Id	 
	 */
	const ID = 'Id';

	/**
	 * InvoiceId	 
	 */
	const INVOICE_ID = 'InvoiceId';

	/**
	 * OrderItemId	 
	 */
	const ORDER_ITEM_ID = 'OrderItemId';

	/**
	 * InvoiceAmt	 
	 */
	const INVOICE_AMT = 'InvoiceAmt';

	/**
	 * Discount	 
	 */
	const DISCOUNT = 'Discount';

	/**
	 * DateCreated	 
	 */
	const DATE_CREATED = 'DateCreated';

	/**
	 * Description	 
	 */
	const DESCRIPTION = 'Description';

	/**
	 * CommissionStatus	 
	 */
	const COMMISSION_STATUS = 'CommissionStatus';
} 
