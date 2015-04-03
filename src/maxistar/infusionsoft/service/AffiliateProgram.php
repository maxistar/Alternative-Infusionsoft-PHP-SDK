<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Affiliate_Program_Service
 * AffiliateProgramService
 */
namespace maxistar\infusionsoft\service;
class AffiliateProgram extends \maxistar\infusionsoft\Service {

    /**
     * AffiliateProgramService.getAffiliatesByProgram
	 *
	 * 
     *
     * @param int programId The Referral Partner Commission Program Id
	 * @returns 
	 */
	function getAffiliatesByProgram($programId){
	    $args = array($programId);

	    return $this->owner->call('AffiliateProgramService.getAffiliatesByProgram', $args);
	}

    /**
     * AffiliateProgramService.getProgramsForAffiliate
	 *
	 * 
     *
     * @param int affiliateId The affiliate you want to get the programs for
	 * @returns 
	 */
	function getProgramsForAffiliate($affiliateId){
	    $args = array($affiliateId);

	    return $this->owner->call('AffiliateProgramService.getProgramsForAffiliate', $args);
	}

    /**
     * AffiliateProgramService.getAffiliatePrograms
	 *
	 * 
     *
	 * @returns 
	 */
	function getAffiliatePrograms(){
	    $args = array();

	    return $this->owner->call('AffiliateProgramService.getAffiliatePrograms', $args);
	}
} 
