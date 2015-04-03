<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Product_Service
 * ProductService
 */
namespace maxistar\infusionsoft\service;
class Product extends \maxistar\infusionsoft\Service {

    /**
     * ProductService.getInventory
	 *
	 * Returns a product inventory provided the Id
     *
     * @param int productId id of the product
	 * @returns Returns a product inventory provided the Id
	 */
	function getInventory($productId){
	    $args = array($productId);

	    return $this->owner->call('ProductService.getInventory', $args);
	}

    /**
     * ProductService.deactivateCreditCard
	 *
	 * Deactivates the specified Credit Card
     *
     * @param int creditCardId id of the credit card
	 * @returns Deactivates the specified Credit Card
	 */
	function deactivateCreditCard($creditCardId){
	    $args = array($creditCardId);

	    return $this->owner->call('ProductService.deactivateCreditCard', $args);
	}
} 
