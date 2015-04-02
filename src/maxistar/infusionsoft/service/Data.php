<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Data_Service
 * Date: Thu, 02 Apr 2015 19:52:00 +0300
 * DataService
 
 */
class isoft_service_Data extends isoft_Service {

    /**
     * add
     * @param string table The Infusionsoft database table name
     * @param struct values An associative array of data you would like stored into this new row in the table
	 */
	function add($table, $values){
	    return $this->owner->call('DataService.add', $table, $values);
	}

    /**
     * load
     * @param string table Infusionsoft database table name from which you want to load a record
     * @param int recordId The unique Id number for the record you would like to load
     * @param array wantedFields The fields you would like returned from this row in the database
	 */
	function load($table, $recordId, $wantedFields){
	    return $this->owner->call('DataService.load', $table, $recordId, $wantedFields);
	}

    /**
     * update
     * @param string table The Infusionsoft database table name
     * @param int Id The Id number of the record you would like updated on the given table
     * @param struct values An associative array of data you would like updated
	 */
	function update($table, $Id, $values){
	    return $this->owner->call('DataService.update', $table, $Id, $values);
	}

    /**
     * delete
     * @param string table The table you would like to delete the record from
     * @param int Id The id number of the record you want to delete
	 */
	function delete($table, $Id){
	    return $this->owner->call('DataService.delete', $table, $Id);
	}

    /**
     * findByField
     * @param string table The Infusionsoft database table name
     * @param int limit How many records you would like returned. The maximum possible is 1000
     * @param int page The page of results you would like returned. The first page is page 0 (loop through pages to get more than             1000 records)
     * @param string fieldName The name of the field you would like to run the search on
     * @param string fieldValue The value stored in the field you would like to search by
     * @param array (of strings) returnFields The fields you would like returned from the table you are searching on
	 */
	function findByField($table, $limit, $page, $fieldName, $fieldValue, $returnFields){
	    return $this->owner->call('DataService.findByField', $table, $limit, $page, $fieldName, $fieldValue, $returnFields);
	}

    /**
     * query
     * @param string table The table to look in
     * @param int limit The number of records to pull (max 1000)
     * @param int page What page of data to pull (in case there are more than 1000 records). The paging starts with 0
     * @param struct queryData A struct containing query data. The key is the field to search on, and the value is the data to look for. %             is the wild card operator and all searches are case insensitive. If you would like to query for an             empty(null) field, use ~null~ in your query parameter, such as &lsquo;FirstName' =&gt; &lsquo;~null~'
     * @param array selectedFields What fields to return from the query
	 */
	function query($table, $limit, $page, $queryData, $selectedFields){
	    return $this->owner->call('DataService.query', $table, $limit, $page, $queryData, $selectedFields);
	}

    /**
     * count
     * @param string table The table to look in
     * @param struct queryData A struct containing query data. The key is the field to search on, and the value is the data to look for. %             is the wild card operator and all searches are case insensitive. If you would like to query for an             empty(null) field, use ~null~ in your query parameter, such as &lsquo;FirstName' =&gt; &lsquo;~null~'
	 */
	function count($table, $queryData){
	    return $this->owner->call('DataService.count', $table, $queryData);
	}

    /**
     * addCustomField
     * @param string customFieldType Where the custom field will be used inside Infusionsoft. Options include Contact, Company, Affiliate,             Task/Appt/Note, Order, Subscription, or Opportunity
     * @param string displayName The label/name of this new custom field
     * @param string dataType What type of data this field will support. Text, Dropdown, TextArea, etc.
     * @param int headerId Which custom field header you want this field to appear under. Customer headers are located on custom tabs
	 */
	function addCustomField($customFieldType, $displayName, $dataType, $headerId){
	    return $this->owner->call('DataService.addCustomField', $customFieldType, $displayName, $dataType, $headerId);
	}

    /**
     * authenticateUser
     * @param string username The Infusionsoft username
     * @param string passwordHash An MD5 hash of the Infusionsoft users' password
	 */
	function authenticateUser($username, $passwordHash){
	    return $this->owner->call('DataService.authenticateUser', $username, $passwordHash);
	}

    /**
     * getAppSetting
     * @param string module The application module this setting is a part of
     * @param string setting The database name of the setting you would like the values returned for
	 */
	function getAppSetting($module, $setting){
	    return $this->owner->call('DataService.getAppSetting', $module, $setting);
	}

    /**
     * getAppointmentICal
     * @param int appointmentId The id of the appointment you want the calendar for
	 */
	function getAppointmentICal($appointmentId){
	    return $this->owner->call('DataService.getAppointmentICal', $appointmentId);
	}

    /**
     * getTemporaryKey
     * @param string username An Infusionsoft username
     * @param string passwordHash An MD5 hash of the users' password. This is the password used to login to the Infusionsoft UI
	 */
	function getTemporaryKey($username, $passwordHash){
	    return $this->owner->call('DataService.getTemporaryKey', $username, $passwordHash);
	}

    /**
     * updateCustomField
     * @param int customFieldId The Id number of the custom field you would like to update
     * @param struct values The preset values for the given custom field
	 */
	function updateCustomField($customFieldId, $values){
	    return $this->owner->call('DataService.updateCustomField', $customFieldId, $values);
	}
} 
