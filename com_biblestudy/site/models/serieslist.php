<?php

/**
 * @version $Id: serieslist.php 1 $
 * @package BibleStudy
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 * */
//No Direct Access
defined('_JEXEC') or die;
$mainframe = JFactory::getApplication();
$option = JRequest::getCmd('option');
jimport('joomla.application.component.model');

$params = JComponentHelper::getParams($option);
$default_order = $params->get('default_order');

class biblestudyModelserieslist extends JModel {

    var $_total = null;
    var $_pagination = null;

    /**
     * @desc From database
     */
    var $_data;
    var $_teachers;
    var $_series;
    var $_messageTypes;
    var $_studyYears;
    var $_locations;
    var $_topics;
    var $_orders;
    var $_select;
    var $_books;
    var $_template;
    var $_admin;

    function __construct() {
        parent::__construct();
        $mainframe = JFactory::getApplication();
        $option = JRequest::getCmd('option');
        $params = $mainframe->getPageParameters();
        $t = JRequest::getInt('t', 'get');
        if (!$t) {
            $t = 1;
        }
        jimport('joomla.html.parameter');
        $template = $this->getTemplate();

        // Convert parameter fields to objects.
        $registry = new JRegistry;
        $registry->loadJSON($template[0]->params);
        $params = $registry;

        $config = JFactory::getConfig();
        $this->setState('limit', $params->get('series_limit'), 'limit', $params->get('series_limit'), 'int');
        $this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

        // In case limit has been changed, adjust limitstart accordingly
        $this->setState('limitstart', ($this->getState('limit') != 0 ? (floor($this->getState('limitstart') / $this->getState('limit')) * $this->getState('limit')) : 0));
        // In case we are on more than page 1 of results and the total changes in one of the drop downs to a selection that has fewer in its total, we change limitstart
        if ($this->getTotal() < $this->getState('limitstart')) {
            $this->setState('limitstart', 0, '', 'int');
        }
    }

    function setSelect($string) {

    }

    /**
     * @desc Returns the query
     * @return string The query to be used to retrieve the rows from the database
     */
    function _buildQuery() {
        $where = $this->_buildContentWhere();
        $orderby = $this->_buildContentOrderBy();
        $query = 'SELECT se.*, t.id AS tid, t.teachername, t.title AS teachertitle, t.thumb, t.thumbh, t.thumbw, t.teacher_thumbnail,'
                . ' CASE WHEN CHAR_LENGTH(se.alias) THEN CONCAT_WS(\':\', se.id, se.alias) ELSE se.id END as slug'
                . ' FROM #__bsms_series AS se'
                . ' LEFT JOIN #__bsms_teachers AS t ON (se.teacher = t.id)'
                . $where
                . $orderby
        ;
        return $query;
    }

    /**
     * @desc Returns teachers
     * @return Array
     */
    function getSeries() {
        if (empty($this->_series)) {
            $query = 'SELECT id AS value, series_text AS text, published'
                    . ' FROM #__bsms_series'
                    . ' WHERE published = 1'
                    . ' ORDER BY series_text ASC';
            $this->_series = $this->_getList($query);
        }
        return $this->_series;
    }

    function getAdmin() {
        if (empty($this->_admin)) {
            $query = 'SELECT *'
                    . ' FROM #__bsms_admin'
                    . ' WHERE id = 1';
            $this->_admin = $this->_getList($query);
        }
        return $this->_admin;
    }

    function getStudyYears() {
        if (empty($this->_StudyYears)) {
            $query = " SELECT DISTINCT date_format(studydate, '%Y') AS value, date_format(studydate, '%Y') AS text "
                    . ' FROM #__bsms_studies '
                    . ' ORDER BY value DESC';
            $this->_StudyYears = $this->_getList($query);
        }
        return $this->_StudyYears;
    }

    function getOrders() {
        if (empty($this->_Orders)) {
            $query = ' SELECT * FROM #__bsms_order '
                    . ' ORDER BY id ';
            $this->_Orders = $this->_getList($query);
        }
        return $this->_Orders;
    }

    function getTemplate() {
        if (empty($this->_template)) {
            $templateid = JRequest::getVar('t', 1, 'get', 'int');
            $query = 'SELECT *'
                    . ' FROM #__bsms_templates'
                    . ' WHERE published = 1 AND id = ' . $templateid;
            $this->_template = $this->_getList($query);
        }
        return $this->_template;
    }

    function getData() {
        $mainframe = JFactory::getApplication();
        // Lets load the data if it doesn't already exist
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }

    /**
     * Method to get the total number of studies items
     *
     * @access public
     * @return integer
     */
    function getTotal() {
        // Lets load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }

        return $this->_total;
    }

    /**
     * Method to get a pagination object for the studies
     *
     * @access public
     * @return integer
     */
    function getPagination() {
        // Lets load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }

    function _buildContentWhere() {
        $mainframe = JFactory::getApplication();
        $option = JRequest::getCmd('option');
        $params = JComponentHelper::getParams($option);
        $default_order = $params->get('default_order');
        $filter_series = $mainframe->getUserStateFromRequest($option . 'filter_series', 'filter_series', 0, 'int');
        $filter_orders = $mainframe->getUserStateFromRequest($option . 'filter_orders', 'filter_orders', 'DESC', 'word');
        $where = array();
        $where[] = ' se.published = 1';

        if ($filter_series > 0) {
            $where[] = ' se.id = ' . (int) $filter_series;
        }



        $where = ( count($where) ? ' WHERE ' . implode(' AND ', $where) : '' );

        $where2 = array();
        $continue = 0;
        if ($params->get('series_id') && !$filter_series) {

            $filters = $params->get('series_id');
            switch ($filters) {
                case is_array($filters) :
                    foreach ($filters AS $filter) {
                        if ($filter == -1) {
                            break;
                        } {
                            $continue = 1;
                            $where2[] = 'se.id = ' . (int) $filter;
                        }
                    }
                    break;

                case -1:
                    break;

                default:
                    $continue = 1;
                    $where2[] = 'se.id = ' . (int) $filters;
                    break;
            }
        }
        $where2 = ( count($where2) ? ' ' . implode(' OR ', $where2) : '' );

        if ($continue > 0) {
            $where = $where . ' AND ( ' . $where2 . ')';
        }
        return $where;
    }

    function _buildContentOrderBy() {
        $mainframe = JFactory::getApplication();
        $option = JRequest::getCmd('option');
        $template = $this->getTemplate();

        // Convert parameter fields to objects.
        $registry = new JRegistry;
        $registry->loadJSON($template[0]->params);
        $params = $registry;

        $filter_orders = $params->get('series_list_order', 'ASC');
        $filter_orders_field = $params->get('series_order_field', 'series_text');

        $orderby = ' ORDER BY ' . $filter_orders_field . ' ' . $filter_orders . ' ';


        return $orderby;
    }

}