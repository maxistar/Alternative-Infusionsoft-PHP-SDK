<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Product_Service
 * Date: Fri, 03 Apr 2015 09:15:16 +0300
 * ProductService
 
 */
namespace maxistar\infusionsoft\service;
class Product extends \maxistar\infusionsoft\Service {

    /**
     * getInventory
     * @param int productId id of the product
	 */
	function getInventory($productId){
	    return $this->owner->call('ProductService.getInventory', $productId);
	}

    /**
     * deactivateCreditCard
     * @param int creditCardId id of the credit card
	 */
	function deactivateCreditCard($creditCardId){
	    return $this->owner->call('ProductService.deactivateCreditCard', $creditCardId);
	}
} 
