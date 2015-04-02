<?php
/**
 * InfusionSoft Object Oriented API
 *
 * this class is parsed from Contact.html
 * Date: Thu, 02 Apr 2015 22:59:19 +0300
 * Contact Table
 */
namespace maxistar\infusionsoft\db;

class Contact {

	/**
	 * Address1Type	 
	 */
	const ADDRESS1_TYPE = 'Address1Type';

	/**
	 * Address2Street1	 
	 */
	const ADDRESS2_STREET1 = 'Address2Street1';

	/**
	 * Address2Street2	 
	 */
	const ADDRESS2_STREET2 = 'Address2Street2';

	/**
	 * Address2Type	 
	 */
	const ADDRESS2_TYPE = 'Address2Type';

	/**
	 * Address3Street1	 
	 */
	const ADDRESS3_STREET1 = 'Address3Street1';

	/**
	 * Address3Street2	 
	 */
	const ADDRESS3_STREET2 = 'Address3Street2';

	/**
	 * Address3Type	 
	 */
	const ADDRESS3_TYPE = 'Address3Type';

	/**
	 * Anniversary	 
	 */
	const ANNIVERSARY = 'Anniversary';

	/**
	 * AssistantName	 
	 */
	const ASSISTANT_NAME = 'AssistantName';

	/**
	 * AssistantPhone	 
	 */
	const ASSISTANT_PHONE = 'AssistantPhone';

	/**
	 * BillingInformation	 
	 */
	const BILLING_INFORMATION = 'BillingInformation';

	/**
	 * Birthday	 
	 */
	const BIRTHDAY = 'Birthday';

	/**
	 * City	 
	 */
	const CITY = 'City';

	/**
	 * City2	 
	 */
	const CITY2 = 'City2';

	/**
	 * City3	 
	 */
	const CITY3 = 'City3';

	/**
	 * Company	 
	 */
	const COMPANY = 'Company';

	/**
	 * AccountId	 
	 */
	const ACCOUNT_ID = 'AccountId';

	/**
	 * CompanyID	 
	 */
	const COMPANY_ID = 'CompanyID';

	/**
	 * ContactNotes	 
	 */
	const CONTACT_NOTES = 'ContactNotes';

	/**
	 * ContactType	 
	 */
	const CONTACT_TYPE = 'ContactType';

	/**
	 * Country	 
	 */
	const COUNTRY = 'Country';

	/**
	 * Country2	 
	 */
	const COUNTRY2 = 'Country2';

	/**
	 * Country3	 
	 */
	const COUNTRY3 = 'Country3';

	/**
	 * CreatedBy	 
	 */
	const CREATED_BY = 'CreatedBy';

	/**
	 * DateCreated	 
	 */
	const DATE_CREATED = 'DateCreated';

	/**
	 * Email	 
	 */
	const EMAIL = 'Email';

	/**
	 * EmailAddress2	 
	 */
	const EMAIL_ADDRESS2 = 'EmailAddress2';

	/**
	 * EmailAddress3	 
	 */
	const EMAIL_ADDRESS3 = 'EmailAddress3';

	/**
	 * Fax1	 
	 */
	const FAX1 = 'Fax1';

	/**
	 * Fax1Type	 
	 */
	const FAX1_TYPE = 'Fax1Type';

	/**
	 * Fax2	 
	 */
	const FAX2 = 'Fax2';

	/**
	 * Fax2Type	 
	 */
	const FAX2_TYPE = 'Fax2Type';

	/**
	 * FirstName	 
	 */
	const FIRST_NAME = 'FirstName';

	/**
	 * Groups	 
	 */
	const GROUPS = 'Groups';

	/**
	 * Id	 
	 */
	const ID = 'Id';

	/**
	 * JobTitle	 
	 */
	const JOB_TITLE = 'JobTitle';

	/**
	 * LastName	 
	 */
	const LAST_NAME = 'LastName';

	/**
	 * LastUpdated	 
	 */
	const LAST_UPDATED = 'LastUpdated';

	/**
	 * LastUpdatedBy	 
	 */
	const LAST_UPDATED_BY = 'LastUpdatedBy';

	/**
	 * Leadsource	 
	 */
	const LEADSOURCE = 'Leadsource';

	/**
	 * LeadSourceId	 
	 */
	const LEAD_SOURCE_ID = 'LeadSourceId';

	/**
	 * MiddleName	 
	 */
	const MIDDLE_NAME = 'MiddleName';

	/**
	 * Nickname	 
	 */
	const NICKNAME = 'Nickname';

	/**
	 * OwnerID	 
	 */
	const OWNER_ID = 'OwnerID';

	/**
	 * Password	 
	 */
	const PASSWORD = 'Password';

	/**
	 * Phone1	 
	 */
	const PHONE1 = 'Phone1';

	/**
	 * Phone1Ext	 
	 */
	const PHONE1_EXT = 'Phone1Ext';

	/**
	 * Phone1Type	 
	 */
	const PHONE1_TYPE = 'Phone1Type';

	/**
	 * Phone2	 
	 */
	const PHONE2 = 'Phone2';

	/**
	 * Phone2Ext	 
	 */
	const PHONE2_EXT = 'Phone2Ext';

	/**
	 * Phone2Type	 
	 */
	const PHONE2_TYPE = 'Phone2Type';

	/**
	 * Phone3	 
	 */
	const PHONE3 = 'Phone3';

	/**
	 * Phone3Ext	 
	 */
	const PHONE3_EXT = 'Phone3Ext';

	/**
	 * Phone3Type	 
	 */
	const PHONE3_TYPE = 'Phone3Type';

	/**
	 * Phone4	 
	 */
	const PHONE4 = 'Phone4';

	/**
	 * Phone4Ext	 
	 */
	const PHONE4_EXT = 'Phone4Ext';

	/**
	 * Phone4Type	 
	 */
	const PHONE4_TYPE = 'Phone4Type';

	/**
	 * Phone5	 
	 */
	const PHONE5 = 'Phone5';

	/**
	 * Phone5Ext	 
	 */
	const PHONE5_EXT = 'Phone5Ext';

	/**
	 * Phone5Type	 
	 */
	const PHONE5_TYPE = 'Phone5Type';

	/**
	 * PostalCode	 
	 */
	const POSTAL_CODE = 'PostalCode';

	/**
	 * PostalCode2	 
	 */
	const POSTAL_CODE2 = 'PostalCode2';

	/**
	 * PostalCode3	 
	 */
	const POSTAL_CODE3 = 'PostalCode3';

	/**
	 * ReferralCode	 
	 */
	const REFERRAL_CODE = 'ReferralCode';

	/**
	 * SpouseName	 
	 */
	const SPOUSE_NAME = 'SpouseName';

	/**
	 * State	 
	 */
	const STATE = 'State';

	/**
	 * State2	 
	 */
	const STATE2 = 'State2';

	/**
	 * State3	 
	 */
	const STATE3 = 'State3';

	/**
	 * StreetAddress1	 
	 */
	const STREET_ADDRESS1 = 'StreetAddress1';

	/**
	 * StreetAddress2	 
	 */
	const STREET_ADDRESS2 = 'StreetAddress2';

	/**
	 * Suffix	 
	 */
	const SUFFIX = 'Suffix';

	/**
	 * Title	 
	 */
	const TITLE = 'Title';

	/**
	 * Username	 
	 */
	const USERNAME = 'Username';

	/**
	 * Validated	 
	 */
	const VALIDATED = 'Validated';

	/**
	 * Website	 
	 */
	const WEBSITE = 'Website';

	/**
	 * ZipFour1	 
	 */
	const ZIP_FOUR1 = 'ZipFour1';

	/**
	 * ZipFour2	 
	 */
	const ZIP_FOUR2 = 'ZipFour2';

	/**
	 * ZipFour3	 
	 */
	const ZIP_FOUR3 = 'ZipFour3';
} 
