<?
/**
 * InfusionSoft Object Oriented API
 *
 * see http://help.infusionsoft.com/developers/services-methods
 * APIEmailService 
 */
class isoft_service_Email extends isoft_Service {
	/**
	 * addEmailTemplate	 
	 */
	function addEmailTemplate($pieceTitle, $categories, $fromAddress, $toAddress, $ccAddress, $bccAddress, $subject, $textBody, $htmlBody, $contentType, $mergeContext){
	    return $this->owner->call('APIEmailService.addEmailTemplate', $pieceTitle, $categories, $fromAddress, $toAddress, $ccAddress, $bccAddress, $subject, $textBody, $htmlBody, $contentType, $mergeContext);
	}
	/**
	 * attachEmail	 
	 */
	function attachEmail($contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType){
	    return $this->owner->call('APIEmailService.attachEmail', $contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType);
	}
	/**
	 * getAvailableMergeFields	 
	 */
	function getAvailableMergeFields($mergeContext){
	    return $this->owner->call('APIEmailService.getAvailableMergeFields', $mergeContext);
	}
	/**
	 * getEmailTemplate	 
	 */
	function getEmailTemplate($templateId){
	    return $this->owner->call('APIEmailService.getEmailTemplate', $templateId);
	}
	/**
	 * getOptStatus	 
	 */
	function getOptStatus($email){
	    return $this->owner->call('APIEmailService.getOptStatus', $email);
	}
	/**
	 * optIn	 
	 */
	function optIn($email, $optInReason){
	    return $this->owner->call('APIEmailService.optIn', $email, $optInReason);
	}
	/**
	 * optOut	 
	 */
	function optOut($email, $optOutreason){
	    return $this->owner->call('APIEmailService.optOut', $email, $optOutreason);
	}
	/**
	 * sendEmail	 
	 */
	function sendEmail($contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody){
	    return $this->owner->call('APIEmailService.sendEmail', $contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody);
	}
	/**
	 * sendEmail_2	 
	 */
	function sendEmail_2($contactList, $templateId){
	    return $this->owner->call('APIEmailService.sendEmail', $contactList, $templateId);
	}
	/**
	 * updateEmailTemplate	 
	 */
	function updateEmailTemplate($templateId, $pieceTitle, $category, $fromAddress, $toAddress, $ccAddress, $bccAddress, $subject, $textBody, $htmlBody, $contentType, $mergeContext){
	    return $this->owner->call('APIEmailService.updateEmailTemplate', $templateId, $pieceTitle, $category, $fromAddress, $toAddress, $ccAddress, $bccAddress, $subject, $textBody, $htmlBody, $contentType, $mergeContext);
	}
} 
