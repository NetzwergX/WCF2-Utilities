<?php
namespace wcf\system\event\listener;
use wcf\system\event\IEventListener;

/**
* Abstract implementation for default behavior of event listeners.
* Subclasses are to implement on<$eventName>() methods to handle events.
*
* @author     Sebastian Teumert
* @copyright  2012 teumert.net
* @license    MIT License <http://www.opensource.org/licenses/MIT>
* @package    net.teumert.wcf.util
* @subpackage system.event.listener
* @category   Community Framework Utilities
*/
abstract class AbstractEventlistener implements IEventListener {
	
	/**
	 * Restrict usage on specific events
	 */
	protected $allowedEvents = array();
	
	/**
	 * Restrict usage on specific classes
	 */
	protected $allowedClasses = array();

	/**
	* @see wcf\system\event\IEventListener::execute()
	*/
	public function execute($eventObj, $className, $eventName) {
		if((empty($this->allowedClasses) || in_array($className, $this->allowedClasses)) && 
			(empty($this->allowedEvents) || in_array($eventName, $this->allowedEvents))) {
			$method = 'on'.StringUtil::firstCharToUpperCase($eventName);
			$this->$method($eventObj, $className);
		}			
	}
}

