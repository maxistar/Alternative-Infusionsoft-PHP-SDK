<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Affiliate_Program_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * AffiliateProgramService
 
 */
namespace maxistar\infusionsoft\service;
class AffiliateProgram extends \maxistar\infusionsoft\Service {

    /**
     * getAffiliatesByProgram
     * @param int programId The Referral Partner Commission Program Id
	 */
	function getAffiliatesByProgram($programId){
	    return $this->owner->call('AffiliateProgramService.getAffiliatesByProgram', $programId);
	}

    /**
     * getProgramsForAffiliate
     * @param int affiliateId The affiliate you want to get the programs for
	 */
	function getProgramsForAffiliate($affiliateId){
	    return $this->owner->call('AffiliateProgramService.getProgramsForAffiliate', $affiliateId);
	}

    /**
     * getAffiliatePrograms
	 */
	function getAffiliatePrograms(){
	    return $this->owner->call('AffiliateProgramService.getAffiliatePrograms');
	}
} 
