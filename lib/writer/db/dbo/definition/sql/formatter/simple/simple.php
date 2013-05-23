<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Formatter_Simple extends UBP_Lib_Object {
	
	/**
	* 
	*/
	const CHAR_CASE_LOWER = 'lower';

	/**
	* 
	*/
	const CHAR_CASE_UPPER = 'upper';
		
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $keywordSeparatorChar = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $charCase = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $newLineChar = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $chrCase
	* @param mixed $attrSepChr
	* @param mixed $fldSepChr
	* @return UBP_Lib_Writer_Db_Dbo_Definition_Sql_Fromatter_Simple
	*/
	public function __construct($chrCase = null, $keywordSepChar = null, $newLineChar = null)	{
		// Initialize.
		$this->setCharCase($chrCase);
		$this->setKeywordSeparatorChar($keywordSepChar);
		$this->setNewLineChar($newLineChar);
	}

	/**
	* put your comment there...
	* 
	* @param mixed $attribute
	*/
	public function casesfize($keyword) {
		// Get PHP character case transofmraiton function name.
		$caseFunction = 'strto' . $this->getCharCase();
		// Dynamically call the case function.
		$keyword = $caseFunction($keyword);
		return $keyword;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function getCharCase() {
		return $this->charCase;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getKeywordSeparatorChar() {
		return $this->keywordSeparatorChar;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function getNewLineChar() {
		// Set user value or default.
		return $this->newLineChar;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $syntax
	* @return 
	*/
	public function linalize($syntax) {
		// Add new line character.
		$syntax = "{$syntax}{$this->newLineChar}";
		// Chaining.
		return $syntax;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $keyword
	*/
	public function prepare($keyword) {
		// Transform to the specified characters case.
		$keyword = $this->casesfize($keyword);
		// Add keyword space at the begning.
		$keyword = $this->spacefize($keyword);
		// Return prepared keyword.
		return $keyword;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setCharCase($value = null) {
		// Set user value or default.
		$this->charCase = (!$value) ? self::CHAR_CASE_UPPER : $value;
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setKeywordSeparatorChar($value = null) {
		// Set user value or default.
		$this->keywordSeparatorChar = (!$value) ? ' ' : $value;
		// Chaining.
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setNewLineChar($value = null) {
		// Set user value or default.
		$this->newLineChar = (!$value) ? "\n" : $value;
		// Chaining.
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $keyword
	*/
	public function spacefize($keyword) {
		// Add keyword separator char right before the keyword.
		$keyword = "{$this->keywordSeparatorChar}{$keyword}";
		return $keyword;
	}

} // End class.