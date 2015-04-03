<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Funnel_Service
 * Date: Fri, 03 Apr 2015 09:15:16 +0300
 * FunnelService
 
 */
namespace maxistar\infusionsoft\service;
class Funnel extends \maxistar\infusionsoft\Service {

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
