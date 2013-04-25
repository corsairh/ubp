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
	* @param mixed $issue
	*/
	public function logAction($issues) {
		// Initialize.
		$model =& $this->getModel();
		// Log Plugins issues!
		$model->log($issues);
	}
	
} // End class.