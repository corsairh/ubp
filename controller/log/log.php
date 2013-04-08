<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Controller_Log extends UBP_Lib_Mvc_Controller {
	
	/**
	* put your comment there...
	* 
	*/
	public function logAction() {
		// Initialize.
		$issue = $this->getRequest()->get('issue', 'internal');
		// Log error.
		
	}
	
} // End class.