<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Funnel_Service
 * Date: Thu, 02 Apr 2015 00:43:11 +0300
 * FunnelService
 
 */
class isoft_service_Funnel extends isoft_Service {

    /**
     * achieveGoal
     * @param string Integration The integration name of the goal
     * @param string CallName The call name of the goal
     * @param int contactId The id of the contact you want to add to a sequence.
	 */
	function achieveGoal($Integration, $CallName, $contactId){
	    return $this->owner->call('FunnelService.achieveGoal', $Integration, $CallName, $contactId);
	}
} 
