<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Discount_Service
 * DiscountService
 */
namespace maxistar\infusionsoft\service;
class Discount extends \maxistar\infusionsoft\Service {

    /**
     * DiscountService.addFreeTrial
	 *
	 * Adds a Free trial
     *
     * @param string description The description for free trial
     * @param int freeTrialDays The number of days free trial last
     * @param int hidePrice The option to show or hide price
     * @param int subscriptionPlanId The Id of the subscription
	 * @returns Adds a Free trial
	 */
	function addFreeTrial($description, $freeTrialDays, $hidePrice, $subscriptionPlanId){
	    $args = array($description, $freeTrialDays, $hidePrice, $subscriptionPlanId);

	    return $this->owner->call('DiscountService.addFreeTrial', $args);
	}

    /**
     * DiscountService.getFreeTrial
	 *
	 * Returns the options and values of the free trial id passed
     *
	 * @returns Returns the options and values of the free trial id passed
	 */
	function getFreeTrial(){
	    $args = array();

	    return $this->owner->call('DiscountService.getFreeTrial', $args);
	}

    /**
     * DiscountService.addOrderTotalDiscount
	 *
	 * Adds a order total discount
     *
     * @param string description Description for commission
     * @param int applyDiscountToCommission Do you want to apply the discount to the commission?
     * @param int percentOrAmt Percentage
     * @param int amt The amount
     * @param string payType This will either be gross or net
	 * @returns Adds a order total discount
	 */
	function addOrderTotalDiscount($description, $applyDiscountToCommission, $percentOrAmt, $amt, $payType){
	    $args = array($description, $applyDiscountToCommission, $percentOrAmt, $amt, $payType);

	    return $this->owner->call('DiscountService.addOrderTotalDiscount', $args);
	}

    /**
     * DiscountService.getOrderTotalDiscount
	 *
	 * Adds a order total discount
     *
	 * @returns Adds a order total discount
	 */
	function getOrderTotalDiscount(){
	    $args = array();

	    return $this->owner->call('DiscountService.getOrderTotalDiscount', $args);
	}

    /**
     * DiscountService.addCategoryDiscount
	 *
	 * Adds a category discount
     *
     * @param string description The description of category discount
     * @param int applyDiscountToCommission Boolean integer to determine whether or not a discount is applied to commission
     * @param int amt The amount of discount
	 * @returns Adds a category discount
	 */
	function addCategoryDiscount($description, $applyDiscountToCommission, $amt){
	    $args = array($description, $applyDiscountToCommission, $amt);

	    return $this->owner->call('DiscountService.addCategoryDiscount', $args);
	}

    /**
     * DiscountService.getCategoryDiscount
	 *
	 * Returns the options and values of the category discount id passed
     *
	 * @returns Returns the options and values of the category discount id passed
	 */
	function getCategoryDiscount(){
	    $args = array();

	    return $this->owner->call('DiscountService.getCategoryDiscount', $args);
	}

    /**
     * DiscountService.addProductTotalDiscount
	 *
	 * Add a product total discount
     *
     * @param string description The Id of category discount
     * @param int applyDiscountToCommission The Id of category discount
     * @param int productId The Id of category discount
     * @param int percentOrAmt The Id of category discount
     * @param int amt The Id of category discount
	 * @returns Add a product total discount
	 */
	function addProductTotalDiscount($description, $applyDiscountToCommission, $productId, $percentOrAmt, $amt){
	    $args = array($description, $applyDiscountToCommission, $productId, $percentOrAmt, $amt);

	    return $this->owner->call('DiscountService.addProductTotalDiscount', $args);
	}

    /**
     * DiscountService.getProductTotalDiscount
	 *
	 * Returns the options and values of the product total discount id passed
     *
	 * @returns Returns the options and values of the product total discount id passed
	 */
	function getProductTotalDiscount(){
	    $args = array();

	    return $this->owner->call('DiscountService.getProductTotalDiscount', $args);
	}

    /**
     * DiscountService.addShippingTotalDiscount
	 *
	 * Adds a shipping total discount
     *
     * @param string description Description of shipping discount
     * @param int applyDiscountToCommission Determines whether or not to apply discount to commission
     * @param int percentOrAmt Percent or amount of discount
     * @param int amt Amount of discount
	 * @returns Adds a shipping total discount
	 */
	function addShippingTotalDiscount($description, $applyDiscountToCommission, $percentOrAmt, $amt){
	    $args = array($description, $applyDiscountToCommission, $percentOrAmt, $amt);

	    return $this->owner->call('DiscountService.addShippingTotalDiscount', $args);
	}

    /**
     * DiscountService.getShippingTotalDiscount
	 *
	 * Returns the options and values of the shipping total discount id passed
     *
	 * @returns Returns the options and values of the shipping total discount id passed
	 */
	function getShippingTotalDiscount(){
	    $args = array();

	    return $this->owner->call('DiscountService.getShippingTotalDiscount', $args);
	}
} 
