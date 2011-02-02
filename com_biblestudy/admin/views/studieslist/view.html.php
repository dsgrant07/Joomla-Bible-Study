<?php

/**
 * @version     $Id: view.html.php 1466 2011-01-31 23:13:03Z bcordis $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();
require_once (JPATH_ADMINISTRATOR  .DS. 'components' .DS. 'com_biblestudy' .DS. 'lib' .DS. 'biblestudy.defines.php');
jimport('joomla.application.component.view');

class biblestudyViewstudieslist extends JView {
    protected $items;
    protected $pagination;
    protected $state;

    function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->books = $this->get('Books');
        $this->teachers = $this->get('Teachers');
        $this->series = $this->get('Series');
        $this->messageTypes = $this->get('MessageTypes');
        $this->years = $this->get('Years');
        $this->topics = $this->get('Topics');
        $this->addToolbar();
        
       
        parent::display($tpl);

    }

    protected function addToolbar() {
        JToolBarHelper::title(JText::_('JBS_STY_STUDIES_MANAGER'), 'studies.png');
        JToolBarHelper::addNew('studiesedit.add');
        JToolBarHelper::editList('studiesedit.edit');
        JToolBarHelper::divider();
        JToolBarHelper::publishList('studieslist.publish');
        JToolBarHelper::unpublishList('studieslist.unpublish');
        JToolBarHelper::divider();
        if($this->state->get('filter.state') == -2)
            JToolBarHelper::deleteList('', 'artistudieslist.delete','JTOOLBAR_EMPTY_TRASH');
        else
            JToolBarHelper::trash('studieslist.trash');
    }

}

?>