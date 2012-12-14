<?php

/**
 * Core BibleStudy Site File
 * @package BibleStudy.Site
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 * */
//No Direct Access
defined('_JEXEC') or die;

// Include dependancies
require_once JPATH_COMPONENT.'/helpers/route.php';

/**
 * Bible Study Core Difines
 */
require_once(JPATH_ADMINISTRATOR . '/components/com_biblestudy/lib/biblestudy.defines.php');
jimport('joomla.version');
$version = new JVersion;

if ($version->RELEASE == '3.0')
{
	$versionName = true;
}
else
{
	$versionName = false;
}
define('BIBLESTUDY_CHECKREL', $versionName);
$controller = JControllerLegacy::getInstance('Biblestudy');
$controller->execute(JFactory::getApplication()->input->get('task','','cmd'));
$controller->redirect();