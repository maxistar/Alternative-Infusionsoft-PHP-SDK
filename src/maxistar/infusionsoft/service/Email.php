<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from https://developer.infusionsoft.com/docs/read/Email_Service
 * EmailService
 */
namespace maxistar\infusionsoft\service;
class Email extends \maxistar\infusionsoft\Service {

    /**
     * EmailService.attachEmail
	 *
	 * This will create an item in the email history for a contact. This does not actually send the email, it only places an
    item into the email history. Using the API to instruct Infusionsoft to send an email will handle this
    automatically.
     *
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
	 * @returns (boolean) True/False
	 */
	function attachEmail($contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType){
	    $args = array($contactId, $fromName, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $header, $receivedDate, $sentDate, $emailSentType);

	    return $this->owner->call('EmailService.attachEmail', $args);
	}

    /**
     * EmailService.getAvailableMergeFields
	 *
	 * This retrieves all possible merge fields for the context provided
     *
     * @param string mergeContext Contact, Opportunity, Invoice, or CreditCard
	 * @returns (array) the available merge fields for the given context
	 */
	function getAvailableMergeFields($mergeContext){
	    $args = array($mergeContext);

	    return $this->owner->call('EmailService.getAvailableMergeFields', $args);
	}

    /**
     * EmailService.getOptStatus
	 *
	 * 
     *
     * @param string email The email address you wish to retrieve the status of
	 * @returns (int) 0 = opt out/non-marketable/soft bounce/hard bounce, 1 = single opt on, 2 = double opt in
	 */
	function getOptStatus($email){
	    $args = array($email);

	    return $this->owner->call('EmailService.getOptStatus', $args);
	}

    /**
     * EmailService.optIn
	 *
	 * This method opts-in an email address. This method only works the first time an email address opts-in
     *
     * @param string email The email address to opt-in
     * @param string optInReason This is how you can note why/how this email was opted-in. *This can not be blank. You must specify a reason.
	 * @returns (boolean) True/False
	 */
	function optIn($email, $optInReason){
	    $args = array($email, $optInReason);

	    return $this->owner->call('EmailService.optIn', $args);
	}

    /**
     * EmailService.optOut
	 *
	 * Opts-out an email address. Note that once an address is opt-out, the API cannot opt it back in
     *
     * @param string email The email address to opt-out
     * @param string optOutreason Reason the address is being opt-out
	 * @returns (boolean) True/False
	 */
	function optOut($email, $optOutreason){
	    $args = array($email, $optOutreason);

	    return $this->owner->call('EmailService.optOut', $args);
	}

    /**
     * EmailService.sendEmail
	 *
	 * This will send an email to a list of contacts, as well as record the email in the contacts' email history
     *
     * @param string contactList An integer array of Contact Id numbers you would like to send this email to
     * @param string fromAddress The email address this template will be sent from
     * @param string toAddress The email address this template will send to. This is typically the merge field "~Contact.Email~"
     * @param string ccAddresses The email address(es) this template will carbon copy. Multiples separated by comma
     * @param string bccAddresses the email address(es) this template will blind carbon copy. Multiples separated by comma
     * @param string contentType HTML, Text, or Multipart (this is case sensitive)
     * @param string subject The subject line of this email
     * @param string htmlBody The HTML content the body of this email is comprised of
     * @param string textBody The content of the plain text body of this template
     * @param optional string templateId The Id number of the template you would like to send
	 * @returns True if the email has been sent, an error will be sent back otherwise!
	 */
	function sendEmail($contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody, $templateId = null){
	    $args = array($contactList, $fromAddress, $toAddress, $ccAddresses, $bccAddresses, $contentType, $subject, $htmlBody, $textBody);

		if ($templateId !== null) {
			$args[] = $templateId;
		}
		
	    return $this->owner->call('EmailService.sendEmail', $args);
	}

    /**
     * EmailService.sendTemplate
	 *
	 * This will send an email to a list of contacts, as well as record the email in the contacts' email history
     *
     * @param array contactList An integer array of Contact Id numbers you would like to send this email to
     * @param string templateId The Id of of template to send
	 * @returns True if the email has been sent, an error will be sent back otherwise!
	 */
	function sendTemplate($contactList, $templateId){
	    $args = array($contactList, $templateId);

	    return $this->owner->call('EmailService.sendTemplate', $args);
	}
} 
