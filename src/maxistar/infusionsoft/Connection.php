<?php
/**
* Utility class to work with infusionsoft
*
* @author maxim
*
*/
namespace maxistar\infusionsoft;

class Connection {
	protected $app_name;
	protected $key;
	protected $server;
	protected $contact_service = false; //
	protected $invoice_service = false; //
	protected $data_service = false; //
	
	
	const ORDER_LINE_TYPE_UNKNOWN 	= 0;
	const ORDER_LINE_TYPE_SHIPPING 	= 1;
	const ORDER_LINE_TYPE_TAX 		= 2;
	const ORDER_LINE_TYPE_SERVICE_AND_MISC 	= 3;
	const ORDER_LINE_TYPE_PRODUCT 	= 4;
	const ORDER_LINE_TYPE_UPSELL_PRODUCT 	= 5;
	const ORDER_LINE_TYPE_UPSELL_FINANCE_CHARGE = 6;
	const ORDER_LINE_TYPE_SPECIAL = 7;
	const ORDER_LINE_TYPE_PROGRAM = 8;
	const ORDER_LINE_TYPE_SUBSCRIPTION_PLAN = 9;
	const ORDER_LINE_TYPE_SPECIAL_TRIAL_DAYS = 10;
	const ORDER_LINE_TYPE_SPECIAL_ORDER_TOTAL = 11;
	const ORDER_LINE_TYPE_SPECIAL_PRODUCT = 12;
	const ORDER_LINE_TYPE_SPECIAL_CATEGORY = 13;
	const ORDER_LINE_TYPE_SPECIAL_SHIPPING = 14;
	
	
	public function __construct($app_name,$key){
		$this->server = "https://".$app_name.".infusionsoft.com/api/xmlrpc";
		$this->app_name = $app_name;
		$this->key = $key;
	}

	/**
	 * creates new contact or retuns one that already exist
	 * //TODO should we update contact?
	 * @param unknown_type $data
	 */
	function contact($data){
		$res = $this->contactService()->findByEmail($data['Email'],array('Id'));
		if (count($res)>0) { //update contact
			$this->dataService()->update('Contact', (int) $res[0]['Id'], $data);
			return (int) $res[0]['Id'];
		}
		//else add contact
		$contact_id = $this->contactService()->add($data);
		$this->emailService()->optIn($data['Email'], 'First OpIn via API');
		return $contact_id;
	}
	
	/*
	 * creates new credit card or returns existing one
	 */
	function card($card){
		if (!$card['ContactId']) {
			throw new Exception("Card can't be added without a contact");
		}		
		if ($card_id = $this->invoiceService()->locateExistingCard($card['ContactId'],substr($card['CardNumber'],-4))){
			//$this->update($card); //implement card update
			$this->dataService()->update('CreditCard', $card_id, $card);
		}
		else {
			if ($this->invoiceService()->validateCreditCard_2($card)) {
				$card_id = $this->dataService()->add('CreditCard', $card);
			}
			else {
				throw new Exception('Supplied card was invalid');
			}
		}
		return $card_id;
	}
	
	/**
	 * returns contact service
	 * @return \maxistar\infusionsoft\service\Contact
	 */
	function contactService(){
		if ($this->contact_service===false){
			$this->contact_service = new service\Contact($this);
		}
		return $this->contact_service;
	}

	/**
	* returns invoice service
	* @return \maxistar\infusionsoft\service\Invoice
	*/
	function invoiceService(){
		if ($this->invoice_service===false){
			$this->invoice_service = new service\Invoice($this);
		}
		return $this->invoice_service;
	}
	
	/**
	* @return \maxistar\infusionsoft\service\Data
	*/
	function dataService(){
		if ($this->data_service===false){
			$this->data_service = new service\Data($this);
		}
		return $this->data_service;
	}	
	
	/**
	 * first argument - name of function, other arguments for this function
	 * since all function has first argument $app_key - it will be added by default to function call
	 *
	 *
	 */
	function call($function_name){
		$args = func_get_args();
		$function_name = array_shift($args);
		array_unshift($args, $this->key);
		$request = xmlrpc_encode_request($function_name, $args);
		$context = stream_context_create(array('http' => array(
		    'method' => "POST",
		    'header' => "Content-Type: text/xml",
		    'content' => $request
		)));
		$file = file_get_contents($this->server, false, $context);

		$response = xmlrpc_decode($file);
		if (is_array($response) && xmlrpc_is_fault($response)) {
			throw new Exception("xmlrpc: $response[faultString]",$response['faultCode']);
		}
		return $response;
	}
	
	/**
	* returns current time
	* 
	*
	*
	*/	
	function now(){
		return $this->date(time());
	}
	
	/**
	 * return formatted time in format Ymd\TH:i:s 
	 * 
	 * @param unknown_type $time
	 * @return string
	 */
	function date($time){
		return date('Ymd\TH:i:s',$time);
	}
}