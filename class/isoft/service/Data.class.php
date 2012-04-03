<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * DataService 
 */
class isoft_service_Data extends isoft_Service {
	/**
	 * add	 
	 */
	function add($table, $values){
	    return $this->owner->call('DataService.add', $table, $values);
	}
	/**
	 * addCustomFields	 
	 */
	function addCustomFields($customFieldType, $displayName, $dataType, $headerId){
	    return $this->owner->call('DataService.addCustomFields', $customFieldType, $displayName, $dataType, $headerId);
	}
	/**
	 * authenticateUser	 
	 */
	function authenticateUser($username, $passwordHash){
	    return $this->owner->call('DataService.authenticateUser', $username, $passwordHash);
	}
	/**
	 * delete	 
	 */
	function delete($table, $Id){
	    return $this->owner->call('DataService.delete', $table, $Id);
	}
	/**
	 * findByField	 
	 */
	function findByField($table, $limit, $page, $fieldName, $fieldValue, $array){
	    return $this->owner->call('DataService.findByField', $table, $limit, $page, $fieldName, $fieldValue, $array);
	}
	/**
	 * getAppSetting	 
	 */
	function getAppSetting($module, $setting){
	    return $this->owner->call('DataService.getAppSetting', $module, $setting);
	}
	/**
	 * getTemporaryKey	 
	 */
	function getTemporaryKey($username, $passwordHas){
	    return $this->owner->call('DataService.getTemporaryKey', $username, $passwordHas);
	}
	/**
	 * load	 
	 */
	function load($table, $recordId, $wantedFields){
	    return $this->owner->call('DataService.load', $table, $recordId, $wantedFields);
	}
	/**
	 * query	 
	 */
	function query($table, $limit, $page, $queryData, $selectedFields){
	    return $this->owner->call('DataService.query', $table, $limit, $page, $queryData, $selectedFields);
	}
	/**
	 * update	 
	 */
	function update($table, $id, $values){
	    return $this->owner->call('DataService.update', $table, $id, $values);
	}
	/**
	 * updateCustomField	 
	 */
	function updateCustomField($customFieldId, $values){
	    return $this->owner->call('DataService.updateCustomField', $customFieldId, $values);
	}
} 
