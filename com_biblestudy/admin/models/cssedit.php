<?php

/**
 * @version $Id: cssedit.php 2025 2011-08-28 04:08:06Z genu $
 * @package BibleStudy
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 * */
//No Direct Access
defined('_JEXEC') or die;

jimport('joomla.application.component.model');

class biblestudyModelcssedit extends JModel {

    function __construct() {
        parent::__construct();
    }

    function &getData() {
        $filename = JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_biblestudy' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'biblestudy.css';
        $csscontents = fopen($filename, "rb");
        $this->_data = new stdClass();
        $this->_data->filecontent = fread($csscontents, filesize($filename));
        fclose($csscontents);
        return $this->_data;
    }

}