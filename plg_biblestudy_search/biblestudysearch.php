<?php
/**
 * @version $Id: biblestudysearch.php 1 $
 * @name Bible Study Search Plugin
 *
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 *
 */

defined('_JEXEC') or die('Restricted access');
jimport('joomla.plugin.plugin');
class plgSearchBiblestudysearch extends JPlugin
{

	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 * based on plg_weblinks
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
		$this->loadLanguage('com_biblestudy',JPATH_ADMINISTRATOR);
	}

	/**
	 * @return array An array of search areas
	 */
	function onContentSearchAreas() {
		static $areas = array(
			'biblestudies' => 'PLG_SEARCH_BIBLESTUDYSEARCH_BIBLESTUDYSEARCH'
		);
		return $areas;
	}

	/**
	 * Biblestudy Search method
	 *
	 * The sql must return the following fields that are used in a common display
	 * routine:
	 * @param string Target search string
	 * @param string mathcing option, exact|any|all
	 * @param string ordering option, newest|oldest|popular|alpha|category
	 * @param mixed An array if the search it to be restricted to areas, null if search all
	 */
	function onContentSearch($text, $phrase='', $ordering='', $areas=null)
	{
		$db		= JFactory::getDbo();
		$app	= JFactory::getApplication();
		$user	= JFactory::getUser();
		$groups	= implode(',', $user->getAuthorisedViewLevels());
		$limit = $this->params->def('search_limit');
		$sContent		= $this->params->get('search_content',		1);
		$sArchived		= $this->params->get('search_archived',		1);

		if (is_array($areas)) {
			if (!array_intersect($areas, array_keys($this->onContentSearchAreas()))) {
				return array();
			}
		}

		$state = array();
		if ($sContent) {
			$state[]=1;
		}
		if ($sArchived) {
			$state[]=2;
		}

		$text = trim($text);
		if ($text == '') {
			return array();
		}
		$section	= JText::_('PLG_SEARCH_BIBLESTUDYSEARCH');

		$wheres	= array();
		switch ($phrase)
		{
			case 'exact':
				$text		= $db->Quote('%'.$db->getEscaped($text, true).'%', false);
				$wheres2	= array();
				$wheres2[]	= 'a.studytext LIKE '.$text;
				$wheres2[]	= 'a.studyintro LIKE '.$text;
				$wheres2[]	= 'a.teachername LIKE '.$text;
				$wheres2[]	= 'a.bookname LIKE '.$text;
				$wheres2[]	= 'a.series_text LIKE '.$text;
				$wheres2[]	= 'a.topic_text LIKE '.$text;
				$where		= '(' . implode(') OR (', $wheres2) . ')';
				break;

			case 'all':
			case 'any':
			default:
				$words	= explode(' ', $text);
				$wheres = array();
				foreach ($words as $word)
				{
					$word		= $db->Quote('%'.$db->getEscaped($word, true).'%', false);
					$wheres2	= array();
					$wheres2[]	= 'a.studytext LIKE '.$word;
					$wheres2[]	= 'a.studyintro LIKE '.$word;
					$wheres2[]	= '#__bsms_teachers.teachername LIKE '.$word;
					$wheres2[]	= '#__bsms_books.bookname LIKE '.$word;
					$wheres2[]	= '#__bsms_series.series_text LIKE '.$word;
					$wheres2[]	= '#__bsms_topics.topic_text LIKE '.$word;
					$wheres[]	= implode(' OR ', $wheres2);
				}
				$where	= '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
				break;
		}

		switch ($ordering) {
			case 'oldest':
				$order = 'a.studydate ASC';
				break;
			case 'alpha':
				$order = 'a.studytitle ASC';
				break;
			case 'newest':
			default:
				$order = 'a.studydate DESC';
				break;
		}
		if (!empty($state)) {
			$query	= $db->getQuery(true);
			$set_title = $this->params->get('set_title');
			$template = JRequest::getInt('t','1','get');
			switch ($set_title)
			{
				case 0 :
						
					if ($this->params->get('show_description') > 0){
						$query->select( "#__bsms_books.bookname AS title, a.chapter_begin, CONCAT(a.studytitle,' - ',a.studyintro) AS text, a.studydate AS created, #__bsms_books.id AS bid, #__bsms_books.bookname, a.id AS sid, a.published AS spub, #__bsms_books.published AS bpub, #__bsms_series.id AS seriesid, #__bsms_series.series_text, #__bsms_topics.id AS tid, #__bsms_topics.topic_text, #__bsms_teachers.id AS tid, #__bsms_teachers.teachername, a.id as id, 'Bible Studies' AS section, CONCAT('index.php?option=com_biblestudy&view=studydetails&id=', a.id,'&t=".$template."') AS href, '2' AS browsernav");
							
					}
					else {
						$query->select( "#__bsms_books.bookname AS title, a.chapter_begin, a.studytitle AS text, a.studydate AS created, #__bsms_books.id AS bid, #__bsms_books.bookname, a.id AS sid, a.published AS spub, #__bsms_books.published AS bpub, #__bsms_series.id AS seriesid, #__bsms_series.series_text, #__bsms_topics.id AS tid, #__bsms_topics.topic_text, #__bsms_teachers.id AS tid, #__bsms_teachers.teachername, 'Bible Studies' AS section, CONCAT('index.php?option=com_biblestudy&view=studydetails&id=', a.id,'&t=".$template."') AS href, '2' AS browsernav");
					}
					break;
				case 1 :

					if ($this->params->get('show_description') > 0){
						$query->select("a.studytitle AS title, a.studyintro, #__bsms_books.bookname AS text, a.chapter_begin, a.studydate AS created, #__bsms_books.id AS bid, #__bsms_books.bookname, a.id AS sid, a.published AS spub, #__bsms_books.published AS bpub, #__bsms_series.id AS seriesid, #__bsms_series.series_text, #__bsms_topics.id AS tid, #__bsms_topics.topic_text, #__bsms_teachers.id AS tid, #__bsms_teachers.teachername, a.id as id, 'Bible Studies' AS section, CONCAT('index.php?option=com_biblestudy&view=studydetails&id=', a.id,'&t=".$template."') AS href, '2' AS browsernav");
					}
					else {
						$query->select("#__bsms_books.bookname AS text, a.chapter_begin, a.studytitle AS title, a.studydate AS created, #__bsms_books.id AS bid, #__bsms_books.bookname, a.id AS sid, a.published AS spub, #__bsms_books.published AS bpub, #__bsms_series.id AS seriesid, #__bsms_series.series_text, #__bsms_topics.id AS tid, #__bsms_topics.topic_text, #__bsms_teachers.id AS tid, #__bsms_teachers.teachername, a.id as id, 'Bible Studies' AS section, CONCAT('index.php?option=com_biblestudy&view=studydetails&id=', a.id,'&t=".$template."') AS href, '2' AS browsernav");
					}
					break;
			}
			$query->from(' #__bsms_studies as a');
			$query->join('LEFT','#__bsms_books ON (#__bsms_books.booknumber = a.booknumber)');
			$query->join('LEFT','#__bsms_series ON (#__bsms_series.id = a.series_id)');
			$query->join('LEFT','#__bsms_topics ON (#__bsms_topics.id = a.topics_id)');
			$query->join('LEFT','#__bsms_teachers ON (#__bsms_teachers.id = a.teacher_id)');
			$query->where('('.$where.')' . ' AND a.published in ('.implode(',',$state).') AND a.access IN ('.$groups.')');
			$query->order($order);

			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList();

			foreach ($rows AS $i => $row)
			{
				switch ($set_title )
				{
					case 0:
						$rows[$i]->title = JText::_($rows[$i]->title).' '.$rows[$i]->chapter_begin;
						break;

					case 1:

						if ($this->params->get('show_description') > 0)
						{
							$rows[$i]->text = JText::_($rows[$i]->text).' '.$rows[$i]->chapter_begin.' | '.$rows[$i]->studyintro;
						}
						else
						{
							$rows[$i]->text = JText::_($rows[$i]->text).' '.$rows[$i]->chapter_begin;
						}
						break;
				}
			}

			return $rows;


		}
	}


} // end of class