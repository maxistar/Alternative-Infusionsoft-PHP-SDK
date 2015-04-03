<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Search_Service
 * SearchService
 */
namespace maxistar\infusionsoft\service;
class Search extends \maxistar\infusionsoft\Service {

    /**
     * SearchService.getSavedSearchResultsAllFields
	 *
	 * Runs a saved search/report and returns all possible fields
     *
     * @param int savedSearchId The Id number of the saved search being run
     * @param int userId The userId who the saved search is assigned to. If it is 'Everyone', you still need to pass a valid userId
     * @param int pageNumber The page you would like results from. Zero is the first page
	 * @returns (struct) results of the given saved search
	 */
	function getSavedSearchResultsAllFields($savedSearchId, $userId, $pageNumber){
	    $args = array($savedSearchId, $userId, $pageNumber);

	    return $this->owner->call('SearchService.getSavedSearchResultsAllFields', $args);
	}

    /**
     * SearchService.getSavedSearchResults
	 *
	 * Runs a saved search/report returning only the specified fields
     *
     * @param int savedSearchId The Id number of the saved search being run
     * @param int userId The userId who the saved search is assigned to. If it is 'Everyone', you still need to pass a valid userId
     * @param int pageNumber The page you would like results from. Zero is the first page
     * @param array returnFields The fields/columns of data you want returned from this saved search
	 * @returns (struct) the specified fields for the given saved search/report
	 */
	function getSavedSearchResults($savedSearchId, $userId, $pageNumber, $returnFields){
	    $args = array($savedSearchId, $userId, $pageNumber, $returnFields);

	    return $this->owner->call('SearchService.getSavedSearchResults', $args);
	}

    /**
     * SearchService.getAvailableQuickSearches
	 *
	 * This is used to find what possible quick searches the given user has access to
     *
     * @param int userId The userId you are checking access for
	 * @returns (struct) The quick search types available for the given user
	 */
	function getAvailableQuickSearches($userId){
	    $args = array($userId);

	    return $this->owner->call('SearchService.getAvailableQuickSearches', $args);
	}

    /**
     * SearchService.quickSearch
	 *
	 * This allows you to run a quick search via the API. The quick search is the search bar in the upper right hand corner
    of the Infusionsoft application
     *
     * @param int quickSearchType The type of search you are running. Person, Order, Opportunity, Company, Task, Subscription, or Affiliate
     * @param int userId The Id number of the user running this search. Results are dependent on this users' permissions
     * @param int searchData String to run the search based on
     * @param int page The page of results you would like returned
     * @param int returnLimit Number of results returned. Max is 1000
	 * @returns (struct) An array of all results returned from this quick search
	 */
	function quickSearch($quickSearchType, $userId, $searchData, $page, $returnLimit){
	    $args = array($quickSearchType, $userId, $searchData, $page, $returnLimit);

	    return $this->owner->call('SearchService.quickSearch', $args);
	}

    /**
     * SearchService.getDefaultQuickSearch
	 *
	 * Retrieves the quick search type that the given users has set as their default
     *
     * @param int userId The id of the user to lookup their search defaults
	 * @returns (string) The quick search type that the given user has selected as their default
	 */
	function getDefaultQuickSearch($userId){
	    $args = array($userId);

	    return $this->owner->call('SearchService.getDefaultQuickSearch', $args);
	}
} 
