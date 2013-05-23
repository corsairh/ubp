<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command extends UBP_Lib_Db_Dbo {
	
	/**
	* put your comment there...
	* 
	*/
	public abstract function exec();

} // End class.