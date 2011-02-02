<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
require_once (JPATH_ROOT  .DS. 'components' .DS. 'com_biblestudy' .DS. 'lib' .DS. 'biblestudy.images.class.php');
class biblestudyViewserieslist extends JView {
	
	/**
	 * studieslist view display method
	 * @return void
	 **/
	function display($tpl = null) {
		$mainframe =& JFactory::getApplication(); $option = JRequest::getCmd('option');
		$path1 = JPATH_SITE.DS.'components'.DS.'com_biblestudy'.DS.'helpers'.DS;
		include_once($path1.'image.php');
		
		$document =& JFactory::getDocument();
		$model =& $this->getModel();
		 //Load the Admin settings and params from the template
        $this->addHelperPath(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers');
        $this->loadHelper('params');
        $this->admin = BsmHelper::getAdmin(true);
       // $this->admin_params = $this->admin;
        
        $t = JRequest::getInt('t','get',1);
        if (!$t) {
            $t = 1;
        }
        JRequest::setVar('t', $t, 'get');
        $template = $this->get('template');
        $params = new JParameter($template[0]->params);
        $a_params = $this->get('Admin');
        $this->admin_params = new JParameter($a_params[0]->params);
		$document =& JFactory::getDocument();
		$document->addScript(JURI::base().'components/com_biblestudy/tooltip.js');
	
		$document->addStyleSheet(JURI::base().'components/com_biblestudy/assets/css/biblestudy.css');
		
		//Import Scripts
		$document->addScript(JURI::base().'administrator/components/com_biblestudy/js/jquery.js');
		$document->addScript(JURI::base().'administrator/components/com_biblestudy/js/biblestudy.js');
		$document->addScript(JURI::base().'components/com_biblestudy/tooltip.js');
		$document->addScript('http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
		//Import Stylesheets
		$document->addStylesheet(JURI::base().'administrator/components/com_biblestudy/css/general.css');
		
		$url = $params->get('stylesheet');
		if ($url) {$document->addStyleSheet($url);}
		
		$uri				=& JFactory::getURI();
		$filter_series		= $mainframe->getUserStateFromRequest( $option.'filter_series',	'filter_series',0,'int' );
		$filter_year		= $mainframe->getUserStateFromRequest( $option.'filter_year','filter_year',0,'int' );
		$filter_orders		= $mainframe->getUserStateFromRequest( $option.'filter_orders','filter_orders','DESC','word' );
	

		$items = $this->get('Data');
      //  dump ($items, 'items: ');
		$total = $this->get('Total');
		//dump ($items, 'items: ');
		$pagination = $this->get('Pagination');
		//$teachers = $this->get('Teachers');
		$series = $this->get('Series');
		$orders = $this->get('Orders');
		
        //This is the helper for scripture formatting
        $scripture_call = Jview::loadHelper('scripture');
		//end scripture helper
		$this->assignRef('template', $template);
		$this->assignRef('pagination',	$pagination);
		$this->assignRef('order', $orders);
		
		$menu =& JSite::getMenu();
		$item =& $menu->getActive();
//dump ($admin[0]->main, 'main: ');
		//Get the main study list image
		$images = new jbsImages();
		$main = $images->mainStudyImage();

	  	$this->assignRef('main', $main);
	  	
		//Build Series List for drop down menu
		$types3[] 		= JHTML::_('select.option',  '0', '- '. JText::_( 'JBS_CMN_SELECT_SERIES' ) .' -' );
		$types3 			= array_merge( $types3, $series );
		$lists['seriesid']	= JHTML::_('select.genericlist',   $types3, 'filter_series', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_series" );

		//build orders
		$ord[] 		= JHTML::_('select.option',  '0', '- '. JText::_( 'JBS_CMN_SELECT_ORDER' ) .' -' );
		$orders 			= array_merge( $ord, $orders );
		$lists['sorting']	= JHTML::_('select.genericlist',   $orders, 'filter_orders', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_orders" );


		//Build order
		$ord[]		= JHTML::_('select.option', '0', '- '. JTEXT::_('JBS_CMN_SELECT_ORDER') . ' -');
		$ord		= array_merge($ord, $orders);
		$lists['orders'] = JHTML::_('select.genericlist', $ord, 'filter_orders', 'class="inputbox" size="1" oncchange="this.form.submit()"', 'value', 'text', "filter_orders");
		
		//$lists['search']= $search;
		
		$this->assignRef('lists',		$lists);
		$this->assignRef('items',		$items);

		$this->assignRef('request_url',	$uri->toString());
		$this->assignRef('params', $params);
		parent::display($tpl);
	}
}
?>