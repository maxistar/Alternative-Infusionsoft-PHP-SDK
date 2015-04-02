<?php
namespace maxistar\infusionsoft;

class Service {
	protected $owner;
	function __construct(isoft_Connection $owner){
		$this->owner = $owner;
	}
}