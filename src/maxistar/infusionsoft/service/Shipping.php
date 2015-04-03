<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Shipping_Service
 * Date: Fri, 03 Apr 2015 09:15:16 +0300
 * ShippingService
 
 */
namespace maxistar\infusionsoft\service;
class Shipping extends \maxistar\infusionsoft\Service {

    /**
     * getAllShippingOptions
	 */
	function getAllShippingOptions(){
	    return $this->owner->call('ShippingService.getAllShippingOptions');
	}

    /**
     * getFlatRateShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getFlatRateShippingOption($optionId){
	    return $this->owner->call('ShippingService.getFlatRateShippingOption', $optionId);
	}

    /**
     * getOrderTotalShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getOrderTotalShippingOption($optionId){
	    return $this->owner->call('ShippingService.getOrderTotalShippingOption', $optionId);
	}

    /**
     * getOrderTotalShippingRanges
     * @param int optionId The Id for the shipping option
	 */
	function getOrderTotalShippingRanges($optionId){
	    return $this->owner->call('ShippingService.getOrderTotalShippingRanges', $optionId);
	}

    /**
     * getProductBasedShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getProductBasedShippingOption($optionId){
	    return $this->owner->call('ShippingService.getProductBasedShippingOption', $optionId);
	}

    /**
     * getOrderQuantityShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getOrderQuantityShippingOption($optionId){
	    return $this->owner->call('ShippingService.getOrderQuantityShippingOption', $optionId);
	}

    /**
     * getWeightBasedShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getWeightBasedShippingOption($optionId){
	    return $this->owner->call('ShippingService.getWeightBasedShippingOption', $optionId);
	}

    /**
     * getUpsShippingOption
     * @param int optionId The Id for the shipping option
	 */
	function getUpsShippingOption($optionId){
	    return $this->owner->call('ShippingService.getUpsShippingOption', $optionId);
	}
} 
