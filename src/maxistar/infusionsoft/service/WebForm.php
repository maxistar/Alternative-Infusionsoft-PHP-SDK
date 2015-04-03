<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Webform_Service
 * WebFormService
 */
namespace maxistar\infusionsoft\service;
class WebForm extends \maxistar\infusionsoft\Service {

    /**
     * WebFormService.getMap
	 *
	 * This retrieves the web form names and Id numbers from the application.
     *
	 * @returns (array) the title and Id number for each web form within the system
	 */
	function getMap(){
	    $args = array();

	    return $this->owner->call('WebFormService.getMap', $args);
	}

    /**
     * WebFormService.getHTML
	 *
	 * This retrieves the HTML for the given web form
     *
     * @param int webFormId The Id to your web form
	 * @returns (string) the HTML for this web form
	 */
	function getHTML($webFormId){
	    $args = array($webFormId);

	    return $this->owner->call('WebFormService.getHTML', $args);
	}
} 
