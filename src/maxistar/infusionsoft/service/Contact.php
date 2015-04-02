<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Contact_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * ContactService
 
 */
namespace maxistar\infusionsoft\service;
class Contact extends \maxistar\infusionsoft\Service {

    /**
     * add
     * @param array data an associative array of the data for this new contact record. The array key is the field name to store the
            value within
	 */
	function add($data){
	    return $this->owner->call('ContactService.add', $data);
	}

    /**
     * merge
     * @param int contactId the contact Id number you want to merge
     * @param int duplicateContactId the Id of the duplicate contact you would like to merge
	 */
	function merge($contactId, $duplicateContactId){
	    return $this->owner->call('ContactService.merge', $contactId, $duplicateContactId);
	}

    /**
     * addToCampaign
     * @param int contactId the contact Id number you would like to start the follow-up sequence for
     * @param int campaignId the Id number of the follow-up sequence you would like to start
	 */
	function addToCampaign($contactId, $campaignId){
	    return $this->owner->call('ContactService.addToCampaign', $contactId, $campaignId);
	}

    /**
     * addToGroup
     * @param int contactId the contact Id number you would like to add to a group
     * @param int groupId the Id number of the group you wish to add the contact to
	 */
	function addToGroup($contactId, $groupId){
	    return $this->owner->call('ContactService.addToGroup', $contactId, $groupId);
	}

    /**
     * getNextCampaignStep
     * @param int contactId the Id number of the contact record you would like to get the next sequence step for
     * @param int followUpSequenceId the follow-up sequence Id number you would like to get the next step for the given contact
	 */
	function getNextCampaignStep($contactId, $followUpSequenceId){
	    return $this->owner->call('ContactService.getNextCampaignStep', $contactId, $followUpSequenceId);
	}

    /**
     * findByEmail
     * @param email email The email address to search contacts by
     * @param array selectedFields The contact fields you would like returned
	 */
	function findByEmail($email, $selectedFields){
	    return $this->owner->call('ContactService.findByEmail', $email, $selectedFields);
	}

    /**
     * load
     * @param int contactId The Id number of the contact you would like to load data from
     * @param array selectedFields An array of strings where each string is the database field name of the field you would like sent back
	 */
	function load($contactId, $selectedFields){
	    return $this->owner->call('ContactService.load', $contactId, $selectedFields);
	}

    /**
     * pauseCampaign
     * @param int contactId The Id number of the contact record you are pausing the sequence on
     * @param int sequenceId The follow-up sequence Id number
	 */
	function pauseCampaign($contactId, $sequenceId){
	    return $this->owner->call('ContactService.pauseCampaign', $contactId, $sequenceId);
	}

    /**
     * resumeCampaignForContact
     * @param int contactId The Id number of the contact you would like to remove the tag from
     * @param int seqId The follow-up sequence Id number
	 */
	function resumeCampaignForContact($contactId, $seqId){
	    return $this->owner->call('ContactService.resumeCampaignForContact', $contactId, $seqId);
	}

    /**
     * rescheduleCampaignStep
     * @param array contactIds An array of contact Id numbers you would like to reschedule the step for
     * @param int sequenceStepId The Id number of the particular sequence step you would like to reschedule
	 */
	function rescheduleCampaignStep($contactIds, $sequenceStepId){
	    return $this->owner->call('ContactService.rescheduleCampaignStep', $contactIds, $sequenceStepId);
	}

    /**
     * update
     * @param int contactId The Id number of the contact you wish to update
     * @param array data An associate array of the data for this contact. The array key needs to be the field name in which you store
            the value
	 */
	function update($contactId, $data){
	    return $this->owner->call('ContactService.update', $contactId, $data);
	}
} 
