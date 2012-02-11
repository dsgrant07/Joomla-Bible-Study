<?php

/**
 * @version $Id: date.php 1 $
 * @package BibleStudy
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 **/

//No Direct Access
defined('_JEXEC') or die;

function getstudyDate($params, $studydate) {
switch ($params->get('date_format'))
	{
	 case 0:
		$date	= date('M j, Y', strtotime($studydate));
		break;
	 case 1:
		$date	= date('M j', strtotime($studydate) );
		break;
	 case 2:
		$date	= date('n/j/Y',  strtotime($studydate));
		break;
	 case 3:
		$date	= date('n/j', strtotime($studydate));
		break;
	 case 4:
		$date	= date('l, F j, Y',  strtotime($studydate));
		break;
	 case 5:
		$date	= date('F j, Y',  strtotime($studydate));
		break;
	 case 6:
		$date = date('j F Y', strtotime($studydate));
		break;
	 case 7:
		$date = date('j/n/Y', strtotime($studydate));
		break;
	 case 8:
		$date = JHTML::_('date', $studydate, JText::_('DATE_FORMAT_LC'));
		break;
         case 9:
                $date = date('Y/M/D', strtotime($studydate));
                break;
	 default:
		$date = date('n/j', strtotime($studydate));
		break;
	}

	$customDate = $params->get('custom_date_format');
	if ($customDate != '') {
	    $date = date($customDate, strtotime($studydate));
	}
   return $date;
}