<?php
/**
 * sh404SEF support for com_XXXXX component.
 * Author : Nick Fossen
 * Contact : nfossen@gmail
 * Home URL : http://www.newhorizoncf.org
 * {shSourceVersionTag: Version 6.2 - 2010-07-06}
 *
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

// ------------------  standard plugin initialize function - don't change ---------------------------
global $sh_LANG;
$sefConfig = & shRouter::shGetConfig();
$shLangName = '';
$shLangIso = '';
$title = array();
$shItemidString = '';
$dosef = shInitializePlugin( $lang, $shLangName, $shLangIso, $option);
if ($dosef == false) return;
// ------------------  standard plugin initialize function - don't change ---------------------------

// remove common URL from GET vars list, so that they don't show up as query string in the URL
shRemoveFromGETVarsList('option');
shRemoveFromGETVarsList('lang');
if (!empty($Itemid))
shRemoveFromGETVarsList('Itemid');
if (!empty($limit))
shRemoveFromGETVarsList('limit');
if (isset($limitstart))
shRemoveFromGETVarsList('limitstart'); // limitstart can be zero

// All urls will start with Biblestudy.  The "B" need to be uppercase
$title[] = "Biblestudy";

switch ($view) {
	case 'studieslist':
		$title[] = $view;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		break;
	case 'studydetails':  // Need to keep the id because of the number of teachings
		$title[] = $view;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		break;
	case 'serieslist':
		$title[] = $view;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		break;
	case 'seriesdetail':
		$title[] = $view;

		$query_name = 'SELECT series_text FROM #__bsms_series WHERE #__bsms_series.id = ' . $id;
		$database->setQuery($query_name);
		$series = $database->loadResult();
		$title[] = $series;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		shRemoveFromGETVarsList('id');
		break;
	case 'teacherlist':
		$title[] = $view;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		break;
	case 'teacherdisplay':
		$title[] = $view;
			
		$query_name = 'SELECT teachername FROM #__bsms_teachers WHERE #__bsms_teachers.id = ' . $id;
		$database->setQuery($query_name);
		$teacher = $database->loadResult();
		$title[] = $teacher;
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		shRemoveFromGETVarsList('id');
		break;
	case 'landingpage':
		$title[] = $view;

		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		shRemoveFromGETVarsList('id');
		break;
	case 'popup':
		$title[] = $view;

		shRemoveFromGETVarsList('player');
		shRemoveFromGETVarsList('template');
		shRemoveFromGETVarsList('view');
		shRemoveFromGETVarsList('Itemid');
		shRemoveFromGETVarsList('id');
		break;
}

// Change the URL for downloading file
if(isset($task)){
	if($task == 'download')
	{
		$title[] = 'download';
		shRemoveFromGETVarsList('controller');
		shRemoveFromGETVarsList('task');
	}
}

// remove biblestudy URL from GET vars list, so that they don't show up as query string in the URL
shRemoveFromGETVarsList('t');


// ------------------  standard plugin finalize function - don't change ---------------------------
if ($dosef){
	$string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString,
	(isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null),
	(isset($shLangName) ? @$shLangName : null));
}
// ------------------  standard plugin finalize function - don't change ---------------------------