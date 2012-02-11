<?php

/**
 * @version $Id: toolbar.php 2025 2011-08-28 04:08:06Z genu $
 * @package BibleStudy
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 **/
//No Direct Access
defined('_JEXEC') or die;
jimport('joomla.html.toolbar');

class biblestudyHelperToolbar extends JObject
{
	function getToolbar() {

		$directory='images';
		$bar = new JToolBar( 'Toolbar' );
		$bar->appendButton( 'Standard', 'new', 'New Record', 'new', false );
		$bar->appendButton( 'Standard', 'delete', 'Delete Record', 'delete', false );
		$bar->appendButton( 'Standard', 'publish', 'Publish Record', 'delete', false );
		$bar->appendButton( 'Standard', 'unpublish', 'Unpublish Record', 'delete', false );
		$toolview = JRequest::getVar('view');
		if ($toolview == 'mediafile')
		{
			$bar->appendButton( 'Popup', 'upload', 'Upload', "index.php?option=com_media&tmpl=component&task=popupUpload&directory=$directory", 600, 400 );
		}

		return $bar->render();

	}

}