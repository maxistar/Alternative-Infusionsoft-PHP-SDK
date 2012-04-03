<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * WebFormService 
 */
class isoft_service_WebForm extends isoft_Service {
	/**
	 * getHTML	 
	 */
	function getHTML($webFormId){
	    return $this->owner->call('WebFormService.getHTML', $webFormId);
	}
	/**
	 * getMap	 
	 */
	function getMap(){
	    return $this->owner->call('WebFormService.getMap');
	}
} 
