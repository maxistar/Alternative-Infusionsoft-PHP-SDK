<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Webform_Service
 * Date: Fri, 03 Apr 2015 09:15:16 +0300
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
