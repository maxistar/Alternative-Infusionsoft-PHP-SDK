<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * FileService 
 */
class isoft_service_File extends isoft_Service {
	/**
	 * getDownloadUrl	 
	 */
	function getDownloadUrl(){
	    return $this->owner->call('FileService.getDownloadUrl');
	}
	/**
	 * getFile	 
	 */
	function getFile(){
	    return $this->owner->call('FileService.getFile');
	}
	/**
	 * renameFile	 
	 */
	function renameFile($FileName){
	    return $this->owner->call('FileService.renameFile', $FileName);
	}
	/**
	 * replaceFile	 
	 */
	function replaceFile($Base64EncodedData){
	    return $this->owner->call('FileService.replaceFile', $Base64EncodedData);
	}
	/**
	 * uploadFile	 
	 */
	function uploadFile($Base64EncodedData, $ContactId){
	    return $this->owner->call('FileService.uploadFile', $Base64EncodedData, $ContactId);
	}
} 
