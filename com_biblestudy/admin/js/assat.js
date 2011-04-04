/**
 * Install Assets Joomla 1.6 
 *
 * @return	bool	
 * @since	0.4.
 */
function assetinstall(event){

  var mySlideInstall = new Fx.Slide('assetinstall');
  mySlideInstall.hide();
  $('assetinstall').setStyle('display', 'block');
  mySlideInstall.toggle();

	var pb3 = new dwProgressBar({
		container: $('pb3'),
		startPercentage: 2,
		speed: 1000,
		boxID: 'pb3-box',
		percentageID: 'pb3-perc',
		displayID: 'text',
		displayText: false
	});

  var d = new Ajax( 'components/com_biblestudy/install/biblestudy.assets.php', {
    method: 'get',
		noCache: true,
    onComplete: function( response ) {
	
		$db = JFactory::getDBO();
		$query = 'SELECT asset_id FROM #__bsms_templates WHERE id = 1';
        $db->setQuery($query);
        $db->query();
        if (!$db->loadResult())
        {
            require_once (JPATH_ADMINISTRATOR .DS. 'components/com_biblestudy/install/biblestudy.assets.php');
            $assetfix = new fixJBSAssets();
			pb3.set(100);
			pb3.finish();
			done();
    }
  }).request();

};

/**
 * Show done message
 *
 * @return	bool
 * @since	0.4.
 */
function done(event){

  var d = new Ajax( 'components/com_biblestudy/install/done.php', {
    method: 'get',
    onComplete: function( response ) {
			var mySlideDone = new Fx.Slide('done');
			mySlideDone.hide();
			$('done').setStyle('display', 'block');
			mySlideDone.toggle();
			echo '<p>'.JText::_('JBS_INS_16_ASSET_IN_PROCESS').'</p>';
    }
  }).request();

};