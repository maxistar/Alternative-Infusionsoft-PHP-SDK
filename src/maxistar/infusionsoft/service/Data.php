<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Data_Service
 * DataService
 */
namespace maxistar\infusionsoft\service;
class Data extends \maxistar\infusionsoft\Service {

    /**
     * DataService.add
	 *
	 * Adds a record to the specified table in Infusionsoft.
     *
     * @param string table The Infusionsoft database table name
     * @param struct values An associative array of data you would like stored into this new row in the table
	 * @returns (int) the new records unique ID number
	 */
	function add($table, $values){
	    $args = array($table, $values);

	    return $this->owner->call('DataService.add', $args);
	}

    /**
     * DataService.load
	 *
	 * Loads a struct with data from the given database record
     *
     * @param string table Infusionsoft database table name from which you want to load a record
     * @param int recordId The unique Id number for the record you would like to load
     * @param array wantedFields The fields you would like returned from this row in the database
	 * @returns (struct) the specified fields for the given contact record
	 */
	function load($table, $recordId, $wantedFields){
	    $args = array($table, $recordId, $wantedFields);

	    return $this->owner->call('DataService.load', $args);
	}

    /**
     * DataService.update
	 *
	 * Updates the specified record (indicated by ID) with the data provided
     *
     * @param string table The Infusionsoft database table name
     * @param int Id The Id number of the record you would like updated on the given table
     * @param struct values An associative array of data you would like updated
	 * @returns (int) the ID number of the updated record
	 */
	function update($table, $Id, $values){
	    $args = array($table, $Id, $values);

	    return $this->owner->call('DataService.update', $args);
	}

    /**
     * DataService.delete
	 *
	 * Deletes the specified record in the given table from the database
     *
     * @param string table The table you would like to delete the record from
     * @param int Id The id number of the record you want to delete
	 * @returns (boolean) True/False
	 */
	function delete($table, $Id){
	    $args = array($table, $Id);

	    return $this->owner->call('DataService.delete', $args);
	}

    /**
     * DataService.findByField
	 *
	 * This will locate all records in a given table that match the criteria for a given field
     *
     * @param string table The Infusionsoft database table name
     * @param int limit How many records you would like returned. The maximum possible is 1000
     * @param int page The page of results you would like returned. The first page is page 0 (loop through pages to get more than             1000 records)
     * @param string fieldName The name of the field you would like to run the search on
     * @param string fieldValue The value stored in the field you would like to search by
     * @param array (of strings) returnFields The fields you would like returned from the table you are searching on
	 * @returns (array) array of structs, one per result found. The struct will contain all fields specified in the method     call with their corresponding value
	 */
	function findByField($table, $limit, $page, $fieldName, $fieldValue, $returnFields){
	    $args = array($table, $limit, $page, $fieldName, $fieldValue, $returnFields);

	    return $this->owner->call('DataService.findByField', $args);
	}

    /**
     * DataService.query
	 *
	 * Performs a query across the given table based on the query data
     *
     * @param string table The table to look in
     * @param int limit The number of records to pull (max 1000)
     * @param int page What page of data to pull (in case there are more than 1000 records). The paging starts with 0
     * @param struct queryData A struct containing query data. The key is the field to search on, and the value is the data to look for. %             is the wild card operator and all searches are case insensitive. If you would like to query for an             empty(null) field, use ~null~ in your query parameter, such as &lsquo;FirstName' =&gt; &lsquo;~null~'
     * @param array selectedFields What fields to return from the query
     * @param optional string orderBy The field which the results should be sorted by
     * @param optional bool ascending Changes the order of results to ascending instead of descending (default)
	 * @returns (array) array of structs, one per result found by the query. The struct will contain all fields specified by     selectedFields with their correspondingvalues
	 */
	function query($table, $limit, $page, $queryData, $selectedFields, $orderBy = null, $ascending = null){
	    $args = array($table, $limit, $page, $queryData, $selectedFields);

		if ($orderBy !== null) {
			$args[] = $orderBy;
		}
		
		if ($ascending !== null) {
			$args[] = $ascending;
		}
		
	    return $this->owner->call('DataService.query', $args);
	}

    /**
     * DataService.count
	 *
	 * Performs a query across the given table based on the query data and returns the count of records
     *
     * @param string table The table to look in
     * @param struct queryData A struct containing query data. The key is the field to search on, and the value is the data to look for. %             is the wild card operator and all searches are case insensitive. If you would like to query for an             empty(null) field, use ~null~ in your query parameter, such as &lsquo;FirstName' =&gt; &lsquo;~null~'
	 * @returns (int) Count of records that match the specified query
	 */
	function count($table, $queryData){
	    $args = array($table, $queryData);

	    return $this->owner->call('DataService.count', $args);
	}

    /**
     * DataService.addCustomField
	 *
	 * Creates a new custom fields within Infusionsoft
     *
     * @param string customFieldType Where the custom field will be used inside Infusionsoft. Options include Contact, Company, Affiliate,             Task/Appt/Note, Order, Subscription, or Opportunity
     * @param string displayName The label/name of this new custom field
     * @param string dataType What type of data this field will support. Text, Dropdown, TextArea, etc.
     * @param int headerId Which custom field header you want this field to appear under. Customer headers are located on custom tabs
	 * @returns (int) ID of the custom field added
	 */
	function addCustomField($customFieldType, $displayName, $dataType, $headerId){
	    $args = array($customFieldType, $displayName, $dataType, $headerId);

	    return $this->owner->call('DataService.addCustomField', $args);
	}

    /**
     * DataService.authenticateUser
	 *
	 * This method is used to authenticate an Infusionsoft username and password(md5 hash). If the credentials match it will     return back a User ID, if the credentials do not match it will send back an error message
     *
     * @param string username The Infusionsoft username
     * @param string passwordHash An MD5 hash of the Infusionsoft users' password
	 * @returns (int) user ID of the authenticated user
	 */
	function authenticateUser($username, $passwordHash){
	    $args = array($username, $passwordHash);

	    return $this->owner->call('DataService.authenticateUser', $args);
	}

    /**
     * DataService.getAppSetting
	 *
	 * This method will return back the data currently configured in a user configured application setting
     *
     * @param string module The application module this setting is a part of
     * @param string setting The database name of the setting you would like the values returned for
	 * @returns (string) Current values in given application setting
	 */
	function getAppSetting($module, $setting){
	    $args = array($module, $setting);

	    return $this->owner->call('DataService.getAppSetting', $args);
	}

    /**
     * DataService.getAppointmentICal
	 *
	 * Returns an iCalendar entry for the given appointment
     *
     * @param int appointmentId The id of the appointment you want the calendar for
	 * @returns Returns an iCalendar entry for the given appointment
	 */
	function getAppointmentICal($appointmentId){
	    $args = array($appointmentId);

	    return $this->owner->call('DataService.getAppointmentICal', $args);
	}

    /**
     * DataService.getTemporaryKey
	 *
	 * Returns a temporary API key which is valid for one hour if given a valid Vendor key and user credentials. For     security, never store a users password in plaintext. You only need to pass the MD5 hash with this method, so only     the MD5 hash needs to be stored.
     *
     * @param string username An Infusionsoft username
     * @param string passwordHash An MD5 hash of the users' password. This is the password used to login to the Infusionsoft UI
	 * @returns (string) a temporary API key valid for one hour
	 */
	function getTemporaryKey($username, $passwordHash){
	    $args = array($username, $passwordHash);

	    return $this->owner->call('DataService.getTemporaryKey', $args);
	}

    /**
     * DataService.updateCustomField
	 *
	 * Updates a custom field. Every field can have it's display name and group id changed, but only certain data types will     allow you to change values(dropdown, listbox, radio, etc)
     *
     * @param int customFieldId The Id number of the custom field you would like to update
     * @param struct values The preset values for the given custom field
	 * @returns (boolean) True/False
	 */
	function updateCustomField($customFieldId, $values){
	    $args = array($customFieldId, $values);

	    return $this->owner->call('DataService.updateCustomField', $args);
	}
} 
