<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/File_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * FileService
 
 */
namespace maxistar\infusionsoft\service;
class File extends \maxistar\infusionsoft\Service {

    /**
     * getFile
     * @param int FileId The ID of the file you would like to return.
	 */
	function getFile($FileId){
	    return $this->owner->call('FileService.getFile', $FileId);
	}

    /**
     * getDownloadUrl
     * @param int FileId The ID of the file url to be returned.
	 */
	function getDownloadUrl($FileId){
	    return $this->owner->call('FileService.getDownloadUrl', $FileId);
	}

    /**
     * uploadFile
     * @param string FileName The name of the file to be uploaded
     * @param string Base64EncodedData A string that is 64 base encoded.
     * @param int ContactId(optional) ID of the contact record to add the file to.
	 */
	function uploadFile($FileName, $Base64EncodedData, $ContactId(optional)){
	    return $this->owner->call('FileService.uploadFile', $FileName, $Base64EncodedData, $ContactId(optional));
	}

    /**
     * replaceFile
     * @param int FileId ID of the file to be replaced.
     * @param string Base64EncodedData New string of data.
	 */
	function replaceFile($FileId, $Base64EncodedData){
	    return $this->owner->call('FileService.replaceFile', $FileId, $Base64EncodedData);
	}

    /**
     * renameFile
     * @param int FileId Id of the file to be renamed.
     * @param string fileName New string of data.
	 */
	function renameFile($FileId, $fileName){
	    return $this->owner->call('FileService.renameFile', $FileId, $fileName);
	}
} 
