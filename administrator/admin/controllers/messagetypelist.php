<?php

/**
 * @version     $Id: locationslist.php 1362 2011-01-12 08:42:00Z genu $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();


//Joomla 1.6 <-> 1.5 Branch
try {
    jimport('joomla.application.component.controlleradmin');

    abstract class controllerClass extends JControllerAdmin {

    }

} catch (Exception $e) {
    jimport('joomla.application.component.controller');

    abstract class controllerClass extends JController {

    }

}

class biblestudyControllerMessagetypeList extends controllerClass {

/**
     * Proxy for getModel
     *
     * @param <String> $name    The name of the model
     * @param <String> $prefix  The prefix for the PHP class name
     * @return JModel
     *
     * @since 7.0
     */
    public function &getModel($name = 'messagetypeedit', $prefix = 'biblestudyModel') {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}
?>