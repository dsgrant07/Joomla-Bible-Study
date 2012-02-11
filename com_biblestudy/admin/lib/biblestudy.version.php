<?php
/**
 * @version $Id: biblestudy.version.php 2025 2011-08-28 04:08:06Z genu $
 * Bible Study Component
 * @package Bible Study
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 *
 **/

//No Direct Access
defined('_JEXEC') or die;

require_once (JPATH_ADMINISTRATOR  .DIRECTORY_SEPARATOR. 'components' .DIRECTORY_SEPARATOR. 'com_biblestudy' .DIRECTORY_SEPARATOR. 'lib' .DIRECTORY_SEPARATOR. 'biblestudy.defines.php');
require_once (BIBLESTUDY_PATH_ADMIN_LIB .DIRECTORY_SEPARATOR. 'biblestudy.debug.php');

// use default translations if none are available
if (!defined('_BIBLESTUDY_INSTALLED_VERSION')) DEFINE('_BIBLESTUDY_INSTALLED_VERSION', 'Installed version');
if (!defined('_BIBLESTUDY_COPYRIGHT')) DEFINE('_BIBLESTUDY_COPYRIGHT', 'Copyright');
if (!defined('_BIBLESTUDY_LICENSE')) DEFINE('_BIBLESTUDY_LICENSE', 'License');

class CBiblestudyVersion {
	/**
	 * Retrieve Bible Study version from manifest.xml
	 *
	 * @return string version
	 */
	function versionXML()
	{
		if ($data = JApplicationHelper::parseXMLInstallFile(BIBLESTUDY_FILE_INSTALL)) {
			return $data['version'];
		}
		return 'ERROR';
	}

	/**
	 * Retrieve installed Biblestudy version as array.
	 *
	 * @return array Contains fields: version, versiondate, build, versionname
	 */
	function versionArray()
	{
		static $biblestudyversion;
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM #__extensions WHERE element = "com_biblestudy" LIMIT 1';
		$db->setQuery($query);
		$extension = $db->loadObject();
		$manifestvariable = json_decode($extension->manifest_cache);
		$biblestudyversion->version = $manifestvariable->version;
		$biblestudyversion->versiondate = $manifestvariable->creationDate;

		return $biblestudyversion;
	}

	/**
	 * Retrieve installed Bible Study version as string.
	 *
	 * @return string "X.Y.Z | YYYY-MM-DD | BUILDNUMBER [versionname]"
	 */
	function version()
	{
		$version = CBiblestudyVersion::versionArray();
		return '<table><tr><td><strong>'.JText::_('JBS_CMN_JOOMLA_BIBLE_STUDY').'</strong></td></tr><tr><td>'.JText::_('JBS_CPL_CURRENT_VERSION').': '.$version->version.'</td></tr><tr><td>'.JText::_('JBS_CPL_DATE').': '.$version->versiondate.'</td></tr></table>';
	}

	/**
	 * Retrieve MySQL Server version.
	 *
	 * @return string MySQL version
	 */
	function MySQLVersion()
	{
		static $mysqlversion;
		if (!$mysqlversion)
		{
			$biblestudy_db = &JFactory::getDBO();
			$biblestudy_db->setQuery("SELECT VERSION() AS mysql_version");
			$mysqlversion = $biblestudy_db->loadResult();
			if (!$mysqlversion) $mysqlversion = 'unknown';
		}
		return $mysqlversion;
	}

	/**
	 * Retrieve PHP Server version.
	 *
	 * @return string PHP version
	 */
	function PHPVersion()
	{
		return phpversion();
	}
}
?>