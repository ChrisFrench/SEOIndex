<?php
/**
 * @copyright	Copyright (C) 2012 Ammonite Networks. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.ammonitenetworks.com
 * @author 		Chris French chris@ammonitenetworks.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import library dependencies
jimport('joomla.event.plugin');

class plgSystemSeoIndex extends JPlugin {

	// Constructor
	function plgSystemSeoIndex(&$subject, $params) {
		parent::__construct($subject, $params);
	}

	function onAfterDispatch() {
		global $mainframe;
		$app = &JFactory::getApplication();
		if ($app -> isAdmin())
			return;

		$doc = &JFactory::getDocument();

		//check if is a menu item

		$menu = &JSite::getMenu();
		$active = $menu -> getActive();

		//hide from google, if not a menu item
		if (empty($active)) {
			$doc -> setMetaData('robots', 'noindex,follow');
		}

	}

}
