<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/File_Service
 * FileService
 */
namespace maxistar\infusionsoft\service;
class File extends \maxistar\infusionsoft\Service {

    /**
     * FileService.getFile
	 *
	 * This method retrieves the file data for the given ID number.
     *
     * @param int FileId The ID of the file you would like to return.
	 * @returns This method retrieves the file data for the given ID number.
	 */
	function getFile($FileId){
	    $args = array($FileId);

	    return $this->owner->call('FileService.getFile', $args);
	}

    /**
     * FileService.getDownloadUrl
	 *
	 * This method will return a string of the download URL for the given file.
     *
     * @param int FileId The ID of the file url to be returned.
	 * @returns This method will return a string of the download URL for the given file.
	 */
	function getDownloadUrl($FileId){
	    $args = array($FileId);

	    return $this->owner->call('FileService.getDownloadUrl', $args);
	}

    /**
     * FileService.uploadFile
	 *
	 * This method uploads the file to Infusionsoft. The optional contactId parameter is used to place the file in a
    specific contact's filebox.
     *
     * @param string FileName The name of the file to be uploaded
     * @param string Base64EncodedData A string that is 64 base encoded.
     * @param optional int ContactId ID of the contact record to add the file to.
	 * @returns This method uploads the file to Infusionsoft. The optional contactId parameter is used to place the file in a
    specific contact's filebox.
	 */
	function uploadFile($FileName, $Base64EncodedData, $ContactId = null){
	    $args = array($FileName, $Base64EncodedData);

		if ($ContactId !== null) {
			$args[] = $ContactId;
		}
		
	    return $this->owner->call('FileService.uploadFile', $args);
	}

    /**
     * FileService.replaceFile
	 *
	 * This method will return a string of the download URL for the given file.
     *
     * @param int FileId ID of the file to be replaced.
     * @param string Base64EncodedData New string of data.
	 * @returns This method will return a string of the download URL for the given file.
	 */
	function replaceFile($FileId, $Base64EncodedData){
	    $args = array($FileId, $Base64EncodedData);

	    return $this->owner->call('FileService.replaceFile', $args);
	}

    /**
     * FileService.renameFile
	 *
	 * This method will return a string of the download URL for the given file.
     *
     * @param int FileId Id of the file to be renamed.
     * @param string fileName New string of data.
	 * @returns This method will return a string of the download URL for the given file.
	 */
	function renameFile($FileId, $fileName){
	    $args = array($FileId, $fileName);

	    return $this->owner->call('FileService.renameFile', $args);
	}
} 
