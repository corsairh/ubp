<?php
/**
* 
*/

/**
* 
*/
class UBP_Lib_Classloader {
	
	/**
	* Separator char used to get class name components.
	*/
	const SEPERATOR = '_';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $basePath = '';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $instances = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $prefix = '';
	
	/**
	* put your comment there...
	* 
	* @param mixed $class
	*/
	public function _autoLoad($className) {
		$signature = $this->prefix . self::SEPERATOR;
		// Test class name if its laying under our PREFIX!
		if (strpos($className, $signature) !== FALSE) {
			$classFile = $this->getClassFile($className);
			// Import class file.
			include_once $classFile;
		}
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $prefix
	* @return UBPLibClassLoader
	*/
	public function __construct($basePath, $prefix) {
		// Initialize!
		$this->basePath = $basePath;
		$this->prefix = $prefix;
		// Register auto load!
		spl_autoload_register(array($this, '_autoLoad'));
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $type
	* @param mixed $name
	*/
	public function buildClassName($type, $name) {
		// Initialize.
		$classComponents = array();
		// Build class name array.
		$classComponents['prefix'] = $this->prefix;
		// Replace '/' with underscore (/ is not directory separator, its just our choice!)
		$classComponents['type'] = ucfirst(str_replace(array('/'), self::SEPERATOR, $type));
		$classComponents['name'] = ucfirst($name);
		// Build full name with separator.
		$className = implode(self::SEPERATOR, $classComponents);
		return $className;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getBasePath() {
		return $this->basePath;	
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function getClassFile($name) {
		// Parse name components.
		$components = explode(self::SEPERATOR, $name);
		// Remove prefix as it represent the root path to Plugin!
		unset($components[0]);
		// Get class folder relative path.
		$classFolder = implode(DIRECTORY_SEPARATOR, $components);
		// Get full path to class file.
		$fileName = end($components);
		$classFile = $classFolder . DIRECTORY_SEPARATOR . "{$fileName}.php";
		// Absolute path to the file!
		$absPath = $this->basePath . DIRECTORY_SEPARATOR . $classFile;
		return $absPath;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $class
	*/
	public function getClassNamePathComponent($class) {
		// Initialize.
		$rawComponents = array();
		$components = array();
		// Get class name if object provided!
		if (is_object($class)) {
			$class = get_class($class);
		}
		// Parse name components.
		$rawComponents = explode(self::SEPERATOR, $class);
		// Get associative/named component instead of indexed!
		$components['prefix'] = strtolower($rawComponents[0]);
		$components['file'] = strtolower(end($rawComponents));
		$components['path'] = '/'; // Default path, if it has no path!
		// Get Path!
		for ($index = 1; ($index < count($rawComponents) - 1); $index++) {
			$components['path'] .= strtolower($rawComponents[$index]) . DIRECTORY_SEPARATOR;
		}
		return ((object) $components);
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public static function & getInstance($name = null, $basePath = null, $prefix = '') {
		// Check if exists!
		if (isset(self::$instances[$name])) {
			$loader = self::$instances[$name];
		}
		else {
			$loader = new UBP_Lib_Classloader($basePath, $prefix);
			// Store it if created with name!
			self::$instances[$name] = $loader;
		}
		// Get specific loader!
		return $loader;
	}
	
	/**
	* Instantiate a class under specific type and name.
	* 
	* @param string Type of the class -- Almost a folder path!
	* @param string Class name.
	* @param array Parameters to be passed to the class getInstance method.
	* @return mixed 
	*/
	public function getInstanceOf($type, $name, $parameters = null) {
		// Defaults.
		if (!is_array($parameters)) {
			$parameters = array();
		}
		// Build class name.
		$className = $this->buildClassName($type, $name);
		// If has no getInstance static method do normal construction.
		if (method_exists($className, 'getInstance')) {
			// Get instance method implemeted and free to use
			// args list.
			$instance = call_user_func_array(array($className, 'getInstance'), $parameters);	
		}
		else {
			// Regular construction call with force to use single array args!
			$instance = new $className($parameters);
		}
		return $instance;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getPrefix() {
		return $this->prefix;	
	}
	
} // End class.