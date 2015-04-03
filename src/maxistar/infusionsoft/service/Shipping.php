<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Shipping_Service
 * ShippingService
 */
namespace maxistar\infusionsoft\service;
class Shipping extends \maxistar\infusionsoft\Service {

    /**
     * ShippingService.getAllShippingOptions
	 *
	 * Returns all shipping options configured
     *
	 * @returns Returns all shipping options configured
	 */
	function getAllShippingOptions(){
	    $args = array();

	    return $this->owner->call('ShippingService.getAllShippingOptions', $args);
	}

    /**
     * ShippingService.getFlatRateShippingOption
	 *
	 * Returns the options and values of the flat rate shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the flat rate shipping option provided
	 */
	function getFlatRateShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getFlatRateShippingOption', $args);
	}

    /**
     * ShippingService.getOrderTotalShippingOption
	 *
	 * Returns the options and values of the order total shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the order total shipping option provided
	 */
	function getOrderTotalShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getOrderTotalShippingOption', $args);
	}

    /**
     * ShippingService.getOrderTotalShippingRanges
	 *
	 * Returns the options and values of the order total shipping ranges option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the order total shipping ranges option provided
	 */
	function getOrderTotalShippingRanges($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getOrderTotalShippingRanges', $args);
	}

    /**
     * ShippingService.getProductBasedShippingOption
	 *
	 * Returns the options and values of the product based shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the product based shipping option provided
	 */
	function getProductBasedShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getProductBasedShippingOption', $args);
	}

    /**
     * ShippingService.getOrderQuantityShippingOption
	 *
	 * Returns the options and values of the order quantity shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the order quantity shipping option provided
	 */
	function getOrderQuantityShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getOrderQuantityShippingOption', $args);
	}

    /**
     * ShippingService.getWeightBasedShippingOption
	 *
	 * Returns the options and values of the weight based shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the weight based shipping option provided
	 */
	function getWeightBasedShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getWeightBasedShippingOption', $args);
	}

    /**
     * ShippingService.getUpsShippingOption
	 *
	 * Returns the options and values of the ups shipping option provided
     *
     * @param int optionId The Id for the shipping option
	 * @returns Returns the options and values of the ups shipping option provided
	 */
	function getUpsShippingOption($optionId){
	    $args = array($optionId);

	    return $this->owner->call('ShippingService.getUpsShippingOption', $args);
	}
} 
