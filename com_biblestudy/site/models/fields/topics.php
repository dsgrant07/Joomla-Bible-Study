<?php
/**
 * Part of Joomla BibleStudy Package
 *
 * @package    BibleStudy.Admin
 * @copyright  (C) 2007 - 2013 Joomla Bible Study Team All rights reserved
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.JoomlaBibleStudy.org
 * */
// No Direct Access
defined('_JEXEC') or die;

jimport('joomla.html.html');
jimport('joomla.access.access');
jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package     BibleStudy.Site
 * @subpackage  Form
 * @since       7.0.0
 */
class JFormFieldTopics extends JFormField
{

	/**
	 * Topics
	 *
	 * @var string
	 */
	public $type = 'Topics';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{

		return '
            <input type="hidden" id="topics" name="jform[topics]"/>
            ';
	}

}
