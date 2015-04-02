<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Email_Service
 * Date: Thu, 02 Apr 2015 22:58:41 +0300
 * EmailService
 
 */
namespace maxistar\infusionsoft\service;
class Email extends \maxistar\infusionsoft\Service {

    /**
     * attachEmail
     * @param int contactId The Id of the contact you would like to add this email history to
     * @param string fromName The name portion of the from address. I.E. FirstName LastName, not the email@domain.com portion
     * @param string fromAddress The email address the email was sent from
     * @param string toAddress The email address the email was sent to
     * @param string ccAddresses Any email address that was CC'd
     * @param string bccAddresses Any email address that was BCC'd
     * @param string contentType What type of email this was. Text, HTML, or Multipart (case sensitive)
     * @param string subject The subject line
     * @param string htmlBody The html from the body of the email
     * @param string textBody The plain text body of the email
     * @param string header The email header information
     * @param string receivedDate The date this email was received. This determines where this displays in comparison to other emails
     * @param string sentDate The date this email was sent
     * @param int emailSentType A boolean int, 1 is used for marking the email as sent inside the contact history and 0 is used for marking
            the email as received
	 */
	function attachEmail($contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType){
	    return $this->owner->call('EmailService.attachEmail', $contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType);
	}

    /**
     * getAvailableMergeFields
     * @param string mergeContext Contact, Opportunity, Invoice, or CreditCard
	 */
	function getAvailableMergeFields($mergeContext){
	    return $this->owner->call('EmailService.getAvailableMergeFields', $mergeContext);
	}

    /**
     * getOptStatus
     * @param string email The email address you wish to retrieve the status of
	 */
	function getOptStatus($email){
	    return $this->owner->call('EmailService.getOptStatus', $email);
	}

    /**
     * optIn
     * @param string email The email address to opt-in
     * @param string optInReason This is how you can note why/how this email was opted-in. *This can not be blank. You must specify a reason.
	 */
	function optIn($email, $optInReason){
	    return $this->owner->call('EmailService.optIn', $email, $optInReason);
	}

    /**
     * optOut
     * @param string email The email address to opt-out
     * @param string optOutreason Reason the address is being opt-out
	 */
	function optOut($email, $optOutreason){
	    return $this->owner->call('EmailService.optOut', $email, $optOutreason);
	}

    /**
     * sendEmail
     * @param string contactList An integer array of Contact Id numbers you would like to send this email to
     * @param string fromAddress The email address this template will be sent from
     * @param string toAddress The email address this template will send to. This is typically the merge field "~Contact.Email~"
     * @param string ccAddresses The email address(es) this template will carbon copy. Multiples separated by comma
     * @param string bccAddresses the email address(es) this template will blind carbon copy. Multiples separated by comma
     * @param string contentType HTML, Text, or Multipart (this is case sensitive)
     * @param string subject The subject line of this email
     * @param string htmlBody The HTML content the body of this email is comprised of
     * @param string textBody The content of the plain text body of this template
     * @param string templateId(optional) The Id number of the template you would like to send
	 */
	function sendEmail($contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $templateId(optional)){
	    return $this->owner->call('EmailService.sendEmail', $contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $templateId(optional));
	}

    /**
     * sendTemplate
     * @param array contactList An integer array of Contact Id numbers you would like to send this email to
     * @param string templateId The Id of of template to send
	 */
	function sendTemplate($contactList, $templateId){
	    return $this->owner->call('EmailService.sendTemplate', $contactList, $templateId);
	}
} 
