<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Affiliate_Program_Service
 * Date: Thu, 02 Apr 2015 00:43:11 +0300
 * AffiliateProgramService
 
 */
class isoft_service_AffiliateProgram extends isoft_Service {

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
