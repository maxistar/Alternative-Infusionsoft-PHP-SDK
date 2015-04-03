<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Affiliate_Service
 * AffiliateService
 */
namespace maxistar\infusionsoft\service;
class Affiliate extends \maxistar\infusionsoft\Service {

    /**
     * AffiliateService.affClawbacks
	 *
	 * The affClawbacks method is used when you need to retrieve all clawed back commissions for a particular affiliate.     Claw backs typically occur when an order has been refunded to the customer
     *
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate claw backs for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate claw backs for
	 * @returns The affClawbacks method is used when you need to retrieve all clawed back commissions for a particular affiliate.     Claw backs typically occur when an order has been refunded to the customer
	 */
	function affClawbacks($affiliateId, $filterStartDate, $filterEndDate){
	    $args = array($affiliateId, $filterStartDate, $filterEndDate);

	    return $this->owner->call('AffiliateService.affClawbacks', $args);
	}

    /**
     * AffiliateService.affCommissions
	 *
	 * This method is used to retrieve all commissions for a specific affiliate within a date range
     *
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate commissions for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate commissions for
	 * @returns This method is used to retrieve all commissions for a specific affiliate within a date range
	 */
	function affCommissions($affiliateId, $filterStartDate, $filterEndDate){
	    $args = array($affiliateId, $filterStartDate, $filterEndDate);

	    return $this->owner->call('AffiliateService.affCommissions', $args);
	}

    /**
     * AffiliateService.getRedirectLinksForAffiliate
	 *
	 * Gets a list of the Redirect Links for the specified Affiliate.
     *
     * @param int affiliateId The Id number for the affiliate record you would like the redirect links for
	 * @returns Gets a list of the Redirect Links for the specified Affiliate.
	 */
	function getRedirectLinksForAffiliate($affiliateId){
	    $args = array($affiliateId);

	    return $this->owner->call('AffiliateService.getRedirectLinksForAffiliate', $args);
	}

    /**
     * AffiliateService.affPayouts
	 *
	 * This method is used to retrieve all payments for a specific affiliate within a date range
     *
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate payments for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate payments for
	 * @returns This method is used to retrieve all payments for a specific affiliate within a date range
	 */
	function affPayouts($affiliateId, $filterStartDate, $filterEndDate){
	    $args = array($affiliateId, $filterStartDate, $filterEndDate);

	    return $this->owner->call('AffiliateService.affPayouts', $args);
	}

    /**
     * AffiliateService.affRunningTotals
	 *
	 * The affRunningTotals method is used to retrieve the current balances for Amount Earned, Clawbacks, and Running     Balance.
     *
     * @param array affiliateIds An integer array of the affiliate Id numbers that you would like the balances for
	 * @returns The affRunningTotals method is used to retrieve the current balances for Amount Earned, Clawbacks, and Running     Balance.
	 */
	function affRunningTotals($affiliateIds){
	    $args = array($affiliateIds);

	    return $this->owner->call('AffiliateService.affRunningTotals', $args);
	}

    /**
     * AffiliateService.affSummary
	 *
	 * The affSummary method is used to retrieve a summary of statistics for a list of affiliates
     *
     * @param int affiliateId An array of Affiliate Id numbers you would like stats for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate stats for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate stats for
	 * @returns The affSummary method is used to retrieve a summary of statistics for a list of affiliates
	 */
	function affSummary($affiliateId, $filterStartDate, $filterEndDate){
	    $args = array($affiliateId, $filterStartDate, $filterEndDate);

	    return $this->owner->call('AffiliateService.affSummary', $args);
	}
} 
