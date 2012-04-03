<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * APIAffiliateService 
 */
class isoft_service_Affiliate extends isoft_Service {
	/**
	 * affClawbacks	 
	 */
	function affClawbacks($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('APIAffiliateService.affClawbacks', $affiliateId, $filterStartDate, $filterEndDate);
	}
	/**
	 * affCommissions	 
	 */
	function affCommissions($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('APIAffiliateService.affCommissions', $affiliateId, $filterStartDate, $filterEndDate);
	}
	/**
	 * affPayouts	 
	 */
	function affPayouts($affiliateId, $filterStartDate, $filterEndDate){
	    return $this->owner->call('APIAffiliateService.affPayouts', $affiliateId, $filterStartDate, $filterEndDate);
	}
	/**
	 * affRunningTotals	 
	 */
	function affRunningTotals($affiliateIds){
	    return $this->owner->call('APIAffiliateService.affRunningTotals', $affiliateIds);
	}
	/**
	 * affSummary	 
	 */
	function affSummary($affiliateIds, $filterStartDate, $filterEndDate){
	    return $this->owner->call('APIAffiliateService.affSummary', $affiliateIds, $filterStartDate, $filterEndDate);
	}
} 
