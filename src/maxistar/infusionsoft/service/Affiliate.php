<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Affiliate_Service
 * Date: Fri, 03 Apr 2015 09:15:16 +0300
 * AffiliateService
 
 */
namespace maxistar\infusionsoft\service;
class Affiliate extends \maxistar\infusionsoft\Service {

    /**
     * affClawbacks
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate claw backs for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate claw backs for
	 */
	function affClawbacks($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('AffiliateService.affClawbacks', $affiliateId, $filterStartDate, $filterEndDate);
	}

    /**
     * affCommissions
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate commissions for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate commissions for
	 */
	function affCommissions($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('AffiliateService.affCommissions', $affiliateId, $filterStartDate, $filterEndDate);
	}

    /**
     * getRedirectLinksForAffiliate
     * @param int affiliateId The Id number for the affiliate record you would like the redirect links for
	 */
	function getRedirectLinksForAffiliate($affiliateId){
	    return $this->owner->call('AffiliateService.getRedirectLinksForAffiliate', $affiliateId);
	}

    /**
     * affPayouts
     * @param int affiliateId The Id number for the affiliate record you would like the claw backs for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate payments for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate payments for
	 */
	function affPayouts($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('AffiliateService.affPayouts', $affiliateId, $filterStartDate, $filterEndDate);
	}

    /**
     * affRunningTotals
     * @param array affiliateIds An integer array of the affiliate Id numbers that you would like the balances for
	 */
	function affRunningTotals($affiliateIds){
	    return $this->owner->call('AffiliateService.affRunningTotals', $affiliateIds);
	}

    /**
     * affSummary
     * @param int affiliateId An array of Affiliate Id numbers you would like stats for
     * @param dateTime filterStartDate The starting date for the date range which you would like affiliate stats for
     * @param dateTime filterEndDate The ending date for the date range which you would like the affiliate stats for
	 */
	function affSummary($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('AffiliateService.affSummary', $affiliateId, $filterStartDate, $filterEndDate);
	}
} 
