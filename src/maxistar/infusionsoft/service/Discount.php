<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Discount_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * DiscountService
 
 */
namespace maxistar\infusionsoft\service;
class Discount extends \maxistar\infusionsoft\Service {

    /**
     * addFreeTrial
     * @param string description The description for free trial
     * @param int freeTrialDays The number of days free trial last
     * @param int hidePrice The option to show or hide price
     * @param int subscriptionPlanId The Id of the subscription
	 */
	function addFreeTrial($description, $freeTrialDays, $hidePrice, $subscriptionPlanId){
	    return $this->owner->call('DiscountService.addFreeTrial', $description, $freeTrialDays, $hidePrice, $subscriptionPlanId);
	}

    /**
     * getFreeTrial
	 */
	function getFreeTrial(){
	    return $this->owner->call('DiscountService.getFreeTrial');
	}

    /**
     * addOrderTotalDiscount
     * @param string description Description for commission
     * @param int applyDiscountToCommission Do you want to apply the discount to the commission?
     * @param int percentOrAmt Percentage
     * @param int amt The amount
     * @param string payType This will either be gross or net
	 */
	function addOrderTotalDiscount($description, $applyDiscountToCommission, $percentOrAmt, $amt, $payType){
	    return $this->owner->call('DiscountService.addOrderTotalDiscount', $description, $applyDiscountToCommission, $percentOrAmt, $amt, $payType);
	}

    /**
     * getOrderTotalDiscount
	 */
	function getOrderTotalDiscount(){
	    return $this->owner->call('DiscountService.getOrderTotalDiscount');
	}

    /**
     * addCategoryDiscount
     * @param string description The description of category discount
     * @param int applyDiscountToCommission Boolean integer to determine whether or not a discount is applied to commission
     * @param int amt The amount of discount
	 */
	function addCategoryDiscount($description, $applyDiscountToCommission, $amt){
	    return $this->owner->call('DiscountService.addCategoryDiscount', $description, $applyDiscountToCommission, $amt);
	}

    /**
     * getCategoryDiscount
	 */
	function getCategoryDiscount(){
	    return $this->owner->call('DiscountService.getCategoryDiscount');
	}

    /**
     * addProductTotalDiscount
     * @param string description The Id of category discount
     * @param int applyDiscountToCommission The Id of category discount
     * @param int productId The Id of category discount
     * @param int percentOrAmt The Id of category discount
     * @param int amt The Id of category discount
	 */
	function addProductTotalDiscount($description, $applyDiscountToCommission, $productId, $percentOrAmt, $amt){
	    return $this->owner->call('DiscountService.addProductTotalDiscount', $description, $applyDiscountToCommission, $productId, $percentOrAmt, $amt);
	}

    /**
     * getProductTotalDiscount
	 */
	function getProductTotalDiscount(){
	    return $this->owner->call('DiscountService.getProductTotalDiscount');
	}

    /**
     * addShippingTotalDiscount
     * @param string description Description of shipping discount
     * @param int applyDiscountToCommission Determines whether or not to apply discount to commission
     * @param int percentOrAmt Percent or amount of discount
     * @param int amt Amount of discount
	 */
	function addShippingTotalDiscount($description, $applyDiscountToCommission, $percentOrAmt, $amt){
	    return $this->owner->call('DiscountService.addShippingTotalDiscount', $description, $applyDiscountToCommission, $percentOrAmt, $amt);
	}

    /**
     * getShippingTotalDiscount
	 */
	function getShippingTotalDiscount(){
	    return $this->owner->call('DiscountService.getShippingTotalDiscount');
	}
} 
