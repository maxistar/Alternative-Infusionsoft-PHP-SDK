<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * ContactService 
 */
class isoft_service_Contact extends isoft_Service {
	/**
	 * add	 
	 */
	function add($data){
	    return $this->owner->call('ContactService.add', $data);
	}
	/**
	 * addToCampaign	 
	 */
	function addToCampaign($contactId, $campaignId){
	    return $this->owner->call('ContactService.addToCampaign', $contactId, $campaignId);
	}
	/**
	 * addToGroup	 
	 */
	function addToGroup($contactId, $tagId){
	    return $this->owner->call('ContactService.addToGroup', $contactId, $tagId);
	}
	/**
	 * addWithDupCheck	 
	 */
	function addWithDupCheck($data, $dupCheckType){
	    return $this->owner->call('ContactService.addWithDupCheck', $data, $dupCheckType);
	}
	/**
	 * findByEmail	 
	 */
	function findByEmail($email, $selectedFields){
	    return $this->owner->call('ContactService.findByEmail', $email, $selectedFields);
	}
	/**
	 * getNextCampaignStep	 
	 */
	function getNextCampaignStep($contactId, $followUpSequenceId){
	    return $this->owner->call('ContactService.getNextCampaignStep', $contactId, $followUpSequenceId);
	}
	/**
	 * load	 
	 */
	function load($contactId, $selectedFields){
	    return $this->owner->call('ContactService.load', $contactId, $selectedFields);
	}
	/**
	 * pauseCampaign	 
	 */
	function pauseCampaign($contactId, $sequenceId){
	    return $this->owner->call('ContactService.pauseCampaign', $contactId, $sequenceId);
	}
	/**
	 * removeFromCampaign	 
	 */
	function removeFromCampaign($contactId, $followUpSequenceId){
	    return $this->owner->call('ContactService.removeFromCampaign', $contactId, $followUpSequenceId);
	}
	/**
	 * removeFromGroup	 
	 */
	function removeFromGroup($contactId, $tagId){
	    return $this->owner->call('ContactService.removeFromGroup', $contactId, $tagId);
	}
	/**
	 * rescheduleCampaignStep	 
	 */
	function rescheduleCampaignStep($contactIds, $sequenceStepId){
	    return $this->owner->call('ContactService.rescheduleCampaignStep', $contactIds, $sequenceStepId);
	}
	/**
	 * resumeCampaignForContact	 
	 */
	function resumeCampaignForContact($contactId, $seqId){
	    return $this->owner->call('ContactService.resumeCampaignForContact', $contactId, $seqId);
	}
	/**
	 * runActionSequence	 
	 */
	function runActionSequence($contactId, $actionSetId){
	    return $this->owner->call('ContactService.runActionSequence', $contactId, $actionSetId);
	}
	/**
	 * update	 
	 */
	function update($contactId){
	    return $this->owner->call('ContactService.update', $contactId);
	}
} 
