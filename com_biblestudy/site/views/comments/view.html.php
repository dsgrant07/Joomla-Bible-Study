<?php

/**
 * View html
 * @package BibleStudy
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 * */
//No Direct Access
defined('_JEXEC') or die;
require_once(JPATH_ADMINISTRATOR.'/components/com_biblestudy/helpers/biblestudy.php');

/**
 * View class for Comments
 * @package BibleStudy.Admin
 * @since 7.0.0
 */
class BiblestudyViewComments extends JViewLegacy {

    /**
     * Items
     * @var array
     */
    protected $items;

    /**
     * Pagination
     * @var array
     */
    protected $pagination;

    /**
     * State
     * @var array
     */
    protected $state;

    /**
     * Execute and display a template script.
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  mixed  A string if successful, otherwise a JError object.
     *
     * @see     fetch()
     * @since   11.1
     */
    public function display($tpl = null) {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');

        //Check for errors
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        //Add the admin css
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::base().'administrator/templates/isis/css/template.css');
        //JHtml::stylesheet(JPATH_ADMINISTRATOR.'/templates/isis/css/template.css');
         // Levels filter.
        $options = array();
        $options[] = JHtml::_('select.option', '1', JText::_('J1'));
        $options[] = JHtml::_('select.option', '2', JText::_('J2'));
        $options[] = JHtml::_('select.option', '3', JText::_('J3'));
        $options[] = JHtml::_('select.option', '4', JText::_('J4'));
        $options[] = JHtml::_('select.option', '5', JText::_('J5'));
        $options[] = JHtml::_('select.option', '6', JText::_('J6'));
        $options[] = JHtml::_('select.option', '7', JText::_('J7'));
        $options[] = JHtml::_('select.option', '8', JText::_('J8'));
        $options[] = JHtml::_('select.option', '9', JText::_('J9'));
        $options[] = JHtml::_('select.option', '10', JText::_('J10'));

        $this->f_levels = $options;

        // We don't need toolbar in the modal window.
        if ($this->getLayout() !== 'modal') {
            $this->addToolbar();
            if (BIBLESTUDY_CHECKREL)
                $this->sidebar = JHtmlSidebar::render();
        }

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    /**
     * Add the page title and toolbar
     *
     * @since 7.0
     */
    protected function addToolbar() {
        $user = JFactory::getUser();
        // Get the toolbar object instance
        $bar = JToolBar::getInstance('toolbar');
        $canDo = JBSMHelper::getActions('', 'comment');
        JToolBarHelper::title(JText::_('JBS_CMN_COMMENTS'), 'comments.png');
        if ($canDo->get('core.create')) {
            JToolBarHelper::addNew('comment.add');
        }
        if ($canDo->get('core.edit')) {
            JToolBarHelper::editList('comment.edit');
        }
        if ($canDo->get('core.edit.state')) {
            JToolBarHelper::divider();
            JToolBarHelper::publishList('comments.publish');
            JToolBarHelper::unpublishList('comments.unpublish');
        }
        if ($canDo->get('core.delete')) {
            JToolBarHelper::trash('comments.trash');
        }
        if ($this->state->get('filter.published') == -2 && $canDo->get('core.delete')) {
            JToolBarHelper::deleteList('', 'comments.delete', 'JTOOLBAR_EMPTY_TRASH');
        }
        // Add a batch button
        if ($user->authorise('core.edit')) {
            if (BIBLESTUDY_CHECKREL)
                JHtml::_('bootstrap.modal', 'collapseModal');
            $title = JText::_('JTOOLBAR_BATCH');
            $dhtml = "<button data-toggle=\"modal\" data-target=\"#collapseModal\" class=\"btn btn-small\">
						<i class=\"icon-checkbox-partial\" title=\"$title\"></i>
						$title</button>";
            $bar->appendButton('Custom', $dhtml, 'batch');
        }
    }

    /**
     * Add the page title to browser.
     *
     * @since	7.1.0
     */
    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('JBS_TITLE_COMMENTS'));
    }

	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	protected function getSortFields() {
		return array(
			'comment.full_name' => JText::_('JBS_CMT_FULL_NAME'),
			'comment.published' => JText::_('JSTATUS'),
			'study.studytitle' => JText::_('JBS_CMN_TITLE'),
			'comment.language' => JText::_('JGRID_HEADING_LANGUAGE'),
            'access_level' => JText::_('JGRID_HEADING_ACCESS'),
			'comment.id' => JText::_('JGRID_HEADING_ID')
		);
	}

}