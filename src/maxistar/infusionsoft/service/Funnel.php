<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Funnel_Service
 * FunnelService
 */
namespace maxistar\infusionsoft\service;
class Funnel extends \maxistar\infusionsoft\Service {

    /**
     * FunnelService.achieveGoal
	 *
	 * 
     *
     * @param string Integration The integration name of the goal
     * @param string CallName The call name of the goal
     * @param int contactId The id of the contact you want to add to a sequence.
	 * @returns 
	 */
	function achieveGoal($Integration, $CallName, $contactId){
	    $args = array($Integration, $CallName, $contactId);

	    return $this->owner->call('FunnelService.achieveGoal', $args);
	}
} 
