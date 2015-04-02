<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Product_Service
 * Date: Thu, 02 Apr 2015 19:52:00 +0300
 * ProductService
 
 */
class isoft_service_Product extends isoft_Service {

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
