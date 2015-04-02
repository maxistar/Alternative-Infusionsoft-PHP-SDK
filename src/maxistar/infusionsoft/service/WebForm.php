<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Webform_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * WebFormService
 
 */
namespace maxistar\infusionsoft\service;
class WebForm extends \maxistar\infusionsoft\Service {

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
