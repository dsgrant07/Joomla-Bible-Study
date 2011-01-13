<?php
/**
 * @version     $Id$
 * @package     com_biblestudy
 * @license     GNU/GPL
 */

//No Direct Access
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );


class biblestudyViewpodcastlist extends JView
{

	function display($tpl = null)
	{
		$mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');
		//$user =& JFactory::getUser();
		//$document =& JFactory::getDocument();
		//$document->addStyleSheet('http://www.calvarychapelnewberg.net/j15/administrator/components/com_biblestudy/css/general.css');
 		$params = &JComponentHelper::getParams($option);
 		JHTML::_('stylesheet', 'icons.css', JURI::base().'components/com_biblestudy/css/');
		JToolBarHelper::title(   JText::_( 'JBS_PDC_PODCAST_MANAGER' ), 'podcast.png' );
		//Checks to see if the admin allows rows to be deleted
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
	//	JToolBarHelper::addNewX();
        JToolBarHelper::addNew();
		JToolBarHelper::custom( 'writeXMLFile', 'xml.png', 'Write XML Files', 'JBS_PDC_WRITE_XML_FILES', false, false );
		//JToolBarHelper::custom('task', 'icon', '', 'Alt', false);
		//JToolBarHelper::customX('writeXML','save.png','writeXML','Write XML');
		//JToolBarHelper::preferences('com_biblestudy', '550');
		jimport( 'joomla.i18n.help' );
		JToolBarHelper::help( 'biblestudy', true );
		$db=& JFactory::getDBO();
		$uri	=& JFactory::getURI();

	// Get data from the model
	$items		= & $this->get( 'Data');
	$total		= & $this->get( 'Total');
	$pagination = & $this->get( 'Pagination' );

	$javascript 	= 'onchange="document.adminForm.submit();"';

	$this->assignRef('items',		$items);
	$this->assignRef('pagination',	$pagination);
	$this->assignRef('request_url',	$uri->toString());

		parent::display($tpl);
	}
}
?>