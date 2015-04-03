<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Contact_Service
 * ContactService
 */
namespace maxistar\infusionsoft\service;
class Contact extends \maxistar\infusionsoft\Service {

    /**
     * ContactService.add
	 *
	 * Creates a new contact record from the data passed in the associative array
     *
     * @param array data an associative array of the data for this new contact record. The array key is the field name to store the
            value within
	 * @returns Creates a new contact record from the data passed in the associative array
	 */
	function add($data){
	    $args = array($data);

	    return $this->owner->call('ContactService.add', $args);
	}

    /**
     * ContactService.merge
	 *
	 * Merge two contacts together
     *
     * @param int contactId the contact Id number you want to merge
     * @param int duplicateContactId the Id of the duplicate contact you would like to merge
	 * @returns Merge two contacts together
	 */
	function merge($contactId, $duplicateContactId){
	    $args = array($contactId, $duplicateContactId);

	    return $this->owner->call('ContactService.merge', $args);
	}

    /**
     * ContactService.addToCampaign
	 *
	 * Adds a contact to a follow-up sequence (campaigns were the original name of follow-up sequences)
     *
     * @param int contactId the contact Id number you would like to start the follow-up sequence for
     * @param int campaignId the Id number of the follow-up sequence you would like to start
	 * @returns Adds a contact to a follow-up sequence (campaigns were the original name of follow-up sequences)
	 */
	function addToCampaign($contactId, $campaignId){
	    $args = array($contactId, $campaignId);

	    return $this->owner->call('ContactService.addToCampaign', $args);
	}

    /**
     * ContactService.addToGroup
	 *
	 * Adds a tag to a contact record
     *
     * @param int contactId the contact Id number you would like to add to a group
     * @param int groupId the Id number of the group you wish to add the contact to
	 * @returns Adds a tag to a contact record
	 */
	function addToGroup($contactId, $groupId){
	    $args = array($contactId, $groupId);

	    return $this->owner->call('ContactService.addToGroup', $args);
	}

    /**
     * ContactService.getNextCampaignStep
	 *
	 * Returns the Id number of the next follow-up sequence step for the given contact
     *
     * @param int contactId the Id number of the contact record you would like to get the next sequence step for
     * @param int followUpSequenceId the follow-up sequence Id number you would like to get the next step for the given contact
	 * @returns Returns the Id number of the next follow-up sequence step for the given contact
	 */
	function getNextCampaignStep($contactId, $followUpSequenceId){
	    $args = array($contactId, $followUpSequenceId);

	    return $this->owner->call('ContactService.getNextCampaignStep', $args);
	}

    /**
     * ContactService.findByEmail
	 *
	 * Finds all contacts with the given email address. This searches the Email, Email 2, and Email 3 fields
     *
     * @param email email The email address to search contacts by
     * @param array selectedFields The contact fields you would like returned
	 * @returns Finds all contacts with the given email address. This searches the Email, Email 2, and Email 3 fields
	 */
	function findByEmail($email, $selectedFields){
	    $args = array($email, $selectedFields);

	    return $this->owner->call('ContactService.findByEmail', $args);
	}

    /**
     * ContactService.load
	 *
	 * Load data from a specific contact record
     *
     * @param int contactId The Id number of the contact you would like to load data from
     * @param array selectedFields An array of strings where each string is the database field name of the field you would like sent back
	 * @returns Load data from a specific contact record
	 */
	function load($contactId, $selectedFields){
	    $args = array($contactId, $selectedFields);

	    return $this->owner->call('ContactService.load', $args);
	}

    /**
     * ContactService.pauseCampaign
	 *
	 * Pauses a follow-up sequence for the given contact record
     *
     * @param int contactId The Id number of the contact record you are pausing the sequence on
     * @param int sequenceId The follow-up sequence Id number
	 * @returns Pauses a follow-up sequence for the given contact record
	 */
	function pauseCampaign($contactId, $sequenceId){
	    $args = array($contactId, $sequenceId);

	    return $this->owner->call('ContactService.pauseCampaign', $args);
	}

    /**
     * ContactService.resumeCampaignForContact
	 *
	 * Resumes a follow-up sequence that has been stopped/paused for a given contact
     *
     * @param int contactId The Id number of the contact you would like to remove the tag from
     * @param int seqId The follow-up sequence Id number
	 * @returns Resumes a follow-up sequence that has been stopped/paused for a given contact
	 */
	function resumeCampaignForContact($contactId, $seqId){
	    $args = array($contactId, $seqId);

	    return $this->owner->call('ContactService.resumeCampaignForContact', $args);
	}

    /**
     * ContactService.rescheduleCampaignStep
	 *
	 * Immediately performs the given follow-up sequence stepId for the given contacts
     *
     * @param array contactIds An array of contact Id numbers you would like to reschedule the step for
     * @param int sequenceStepId The Id number of the particular sequence step you would like to reschedule
	 * @returns Immediately performs the given follow-up sequence stepId for the given contacts
	 */
	function rescheduleCampaignStep($contactIds, $sequenceStepId){
	    $args = array($contactIds, $sequenceStepId);

	    return $this->owner->call('ContactService.rescheduleCampaignStep', $args);
	}

    /**
     * ContactService.update
	 *
	 * Updates the data on a contact record
     *
     * @param int contactId The Id number of the contact you wish to update
     * @param array data An associate array of the data for this contact. The array key needs to be the field name in which you store
            the value
	 * @returns Updates the data on a contact record
	 */
	function update($contactId, $data){
	    $args = array($contactId, $data);

	    return $this->owner->call('ContactService.update', $args);
	}
} 
