<?php
namespace maxistar\infusionsoft;

class Service {
	protected $owner;
	function __construct(Connection $owner){
		$this->owner = $owner;
	}
}