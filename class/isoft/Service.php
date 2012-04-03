<?php
class isoft_Service {
	protected $owner;
	function __construct(isoft_Connection $owner){
		$this->owner = $owner;
	}
}