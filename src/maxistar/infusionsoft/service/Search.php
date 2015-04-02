<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Search_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * SearchService
 
 */
namespace maxistar\infusionsoft\service;
class Search extends \maxistar\infusionsoft\Service {

    /**
     * getSavedSearchResultsAllFields
     * @param int savedSearchId The Id number of the saved search being run
     * @param int userId The userId who the saved search is assigned to. If it is 'Everyone', you still need to pass a valid userId
     * @param int pageNumber The page you would like results from. Zero is the first page
	 */
	function getSavedSearchResultsAllFields($savedSearchId, $userId, $pageNumber){
	    return $this->owner->call('SearchService.getSavedSearchResultsAllFields', $savedSearchId, $userId, $pageNumber);
	}

    /**
     * getSavedSearchResults
     * @param int savedSearchId The Id number of the saved search being run
     * @param int userId The userId who the saved search is assigned to. If it is 'Everyone', you still need to pass a valid userId
     * @param int pageNumber The page you would like results from. Zero is the first page
     * @param array returnFields The fields/columns of data you want returned from this saved search
	 */
	function getSavedSearchResults($savedSearchId, $userId, $pageNumber, $returnFields){
	    return $this->owner->call('SearchService.getSavedSearchResults', $savedSearchId, $userId, $pageNumber, $returnFields);
	}

    /**
     * getAvailableQuickSearches
     * @param int userId The userId you are checking access for
	 */
	function getAvailableQuickSearches($userId){
	    return $this->owner->call('SearchService.getAvailableQuickSearches', $userId);
	}

    /**
     * quickSearch
     * @param int quickSearchType The type of search you are running. Person, Order, Opportunity, Company, Task, Subscription, or Affiliate
     * @param int userId The Id number of the user running this search. Results are dependent on this users' permissions
     * @param int searchData String to run the search based on
     * @param int page The page of results you would like returned
     * @param int returnLimit Number of results returned. Max is 1000
	 */
	function quickSearch($quickSearchType, $userId, $searchData, $page, $returnLimit){
	    return $this->owner->call('SearchService.quickSearch', $quickSearchType, $userId, $searchData, $page, $returnLimit);
	}

    /**
     * getDefaultQuickSearch
     * @param int userId The id of the user to lookup their search defaults
	 */
	function getDefaultQuickSearch($userId){
	    return $this->owner->call('SearchService.getDefaultQuickSearch', $userId);
	}
} 
