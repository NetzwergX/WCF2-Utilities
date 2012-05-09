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
	 * Forwards events to on<$eventName>() method.
	 * 
	 * @see wcf\system\event\IEventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		$method = 'on'.StringUtil::firstCharToUpperCase($eventName);
		//if (method_exists($this, $$method)) 
			$this->$method($eventObj, $className);
	}
}

