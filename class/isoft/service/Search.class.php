<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * SearchService 
 */
class isoft_service_Search extends isoft_Service {
	/**
	 * getAllReportColumns	 
	 */
	function getAllReportColumns($savedSearchId, $userId){
	    return $this->owner->call('SearchService.getAllReportColumns', $savedSearchId, $userId);
	}
	/**
	 * getAvailableQuickSearches	 
	 */
	function getAvailableQuickSearches($userId){
	    return $this->owner->call('SearchService.getAvailableQuickSearches', $userId);
	}
	/**
	 * getDefaultQuickSearch	 
	 */
	function getDefaultQuickSearch($userId){
	    return $this->owner->call('SearchService.getDefaultQuickSearch', $userId);
	}
	/**
	 * getSavedSearchResults	 
	 */
	function getSavedSearchResults($savedSearchId, $userId, $pageNumber, $returnFields){
	    return $this->owner->call('SearchService.getSavedSearchResults', $savedSearchId, $userId, $pageNumber, $returnFields);
	}
	/**
	 * getSavedSearchResultsAllFields	 
	 */
	function getSavedSearchResultsAllFields($savedSearchId, $userId, $pageNumber){
	    return $this->owner->call('SearchService.getSavedSearchResultsAllFields', $savedSearchId, $userId, $pageNumber);
	}
	/**
	 * quickSearch	 
	 */
	function quickSearch($quickSearchType, $userId, $searchData, $page, $returnLimit){
	    return $this->owner->call('SearchService.quickSearch', $quickSearchType, $userId, $searchData, $page, $returnLimit);
	}
} 
