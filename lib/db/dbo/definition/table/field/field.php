<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Table_Field extends UBP_Lib_Db_Dbo_Definition_Field {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comment = null;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $table = null;

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table $table
	* @param mixed $name
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table & $table, $name, UBP_Lib_Db_Dbo_Definition_Table_Field_Type & $type) {
		// Set table.
		$this->table = $table;
		// Initialize parent.
		parent::__construct($name, $type);
		// Create properties objects!
		$this->comment = new UBP_Lib_Db_Dbo_Definition_Field_Property_Comment();
	}

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field $src
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field
	* @return void
	*/
	public static function copy($src, $des) {
		// Parent copy!
		parent::copy($src, $des);
		// Copy field type.
		self::callStatic($des->getType(), 'copy', array($src->getType(), $des->getType()));
		/// Copy comment.
		UBP_Lib_Db_Dbo_Definition_Field_Property_Comment::copy($src->getComment(), $des->getComment());
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Dbo_Definition_Field_Property_Comment
	*/
	public function & getComment() {
		return $this->comment;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getTable() {
		return $this->table;	
	}

	/**
	* put your comment there...
	* 
	* @param mixed $comment
	*/
	public function setComment(& $comment) {
		// Set.
		$this->comment = $comment;
		// Chain.
		return $this;
	}

} // End class. 