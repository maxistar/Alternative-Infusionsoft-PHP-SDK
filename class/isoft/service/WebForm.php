<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Webform_Service
 * Date: Thu, 02 Apr 2015 00:43:11 +0300
 * WebFormService
 
 */
class isoft_service_WebForm extends isoft_Service {

    /**
     * getMap
	 */
	function getMap(){
	    return $this->owner->call('WebFormService.getMap');
	}

    /**
     * getHTML
     * @param int webFormId The Id to your web form
	 */
	function getHTML($webFormId){
	    return $this->owner->call('WebFormService.getHTML', $webFormId);
	}
} 
