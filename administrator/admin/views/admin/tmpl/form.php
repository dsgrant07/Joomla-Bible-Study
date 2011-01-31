<?php
/**
 * @version     $Id$
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();

$params = $this->form->getFieldsets();
?>
 
<form action="<?php echo JRoute::_('index.php?option=com_biblestudy&layout=form&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
   <?php echo JHtml::_('tabs.start'); ?>
    <?php echo JHtml::_('tabs.panel', JText::_('JBS_ADM_ADMIN_PARAMS'), 'admin-settings'); ?>
    <div class="width-100">
        <div class="width-60 fltlft">
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_COMPONENT_SETTINGS'); ?></legend>
                <ul>
                    <li>
                        <?php echo $this->form->getLabel('compat_mode', 'params'); ?>
                        <?php echo $this->form->getInput('compat_mode', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('drop_tables', 'params'); ?>
                        <?php echo $this->form->getInput('drop_tables', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('admin_store', 'params'); ?>
                        <?php echo $this->form->getInput('admin_store', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('studylistlimit', 'params'); ?>
                        <?php echo $this->form->getInput('studylistlimit', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('show_location_media', 'params'); ?>
                        <?php echo $this->form->getInput('show_location_media', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('popular_limit', 'params'); ?>
                        <?php echo $this->form->getInput('popular_limit', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('character_filter', 'params'); ?>
                        <?php echo $this->form->getInput('character_filter', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('format_popular', 'params'); ?>
                        <?php echo $this->form->getInput('format_popular', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('socialnetworking', 'params'); ?>
                        <?php echo $this->form->getInput('socialnetworking', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('sharetype', 'params'); ?>
                        <?php echo $this->form->getInput('sharetype', 'params'); ?>
                    </li>
                </ul>
            </fieldset>

        </div>
        <div class="width-40 fltrt">
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_FRONTEND_SUBMISSION'); ?></legend>
                <ul>
                    <li>
                        <?php echo $this->form->getLabel('allow_entry_study', 'params'); ?>
                        <?php echo $this->form->getInput('allow_entry_study', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('entry_access', 'params'); ?>
                        <?php echo $this->form->getInput('entry_access', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('study_publish', 'params'); ?>
                        <?php echo $this->form->getInput('study_publish', 'params'); ?>
                    </li>
                </ul>
            </fieldset>
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_IMAGE_FOLDERS'); ?> </legend>
                <ul>
                    <li>
                        <?php echo $this->form->getLabel('series_imagefolder', 'params'); ?>
                        <?php echo $this->form->getInput('series_imagefolder', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('media_imagefolder', 'params'); ?>
                        <?php echo $this->form->getInput('media_imagefolder', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('teachers_imagefolder', 'params'); ?>
                        <?php echo $this->form->getInput('teachers_imagefolder', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('study_images', 'params'); ?>
                        <?php echo $this->form->getInput('study_images', 'params'); ?>
                    </li>
                </ul>
            </fieldset>
        </div>        
    </div>
    <div class="clr"></div>
    <?php echo JHtml::_('tabs.panel', JText::_('JBS_ADM_SYSTEM_DEFAULTS'), 'admin-system-defaults'); ?>
                        <div class="width-100">
                            <div class="width-60 fltlft">
                                <fieldset class="panelform">
                                    <legend><?php echo JText::_('JBS_CMN_DEFAULT_IMAGES'); ?></legend>
                                    <ul>
                                        <li>
                        <?php echo $this->form->getLabel('default_main_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_main_image', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('default_study_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_study_image', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('default_series_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_series_image', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('default_teacher_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_teacher_image', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('default_download_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_download_image', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('default_showHide_image', 'params'); ?>
                        <?php echo $this->form->getInput('default_showHide_image', 'params'); ?>
                    </li>
                </ul>
            </fieldset>
        </div>
        <div class="width-40 fltrt">
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_AUTO_FILL_STUDY_REC'); ?></legend>
                <ul>
                    <li>
                        <?php echo $this->form->getLabel('location_id', 'params'); ?>
                        <?php echo $this->form->getInput('location_id', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('teacher_id', 'params'); ?>
                        <?php echo $this->form->getInput('teacher_id', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('series_id', 'params'); ?>
                        <?php echo $this->form->getInput('series_id', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('booknumber', 'params'); ?>
                        <?php echo $this->form->getInput('booknumber', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('topic_id', 'params'); ?>
                        <?php echo $this->form->getInput('topic_id', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('messagetype', 'params'); ?>
                        <?php echo $this->form->getInput('messagetype', 'params'); ?>
                    </li>
                </ul>
            </fieldset>
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_AUTO_FILL_MEDIA_REC'); ?></legend>
                <ul>
                    <li>
                        <?php echo $this->form->getLabel('download', 'params'); ?>
                        <?php echo $this->form->getInput('download', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('target', 'params'); ?>
                        <?php echo $this->form->getInput('target', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('server', 'params'); ?>
                        <?php echo $this->form->getInput('server', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('path', 'params'); ?>
                        <?php echo $this->form->getInput('path', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('podcast', 'params'); ?>
                        <?php echo $this->form->getInput('podcast', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('mime', 'params'); ?>
                        <?php echo $this->form->getInput('mime', 'params'); ?>
                    </li>
                </ul>
            </fieldset>
             <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
        </div>
    </div>
    <div class="clr"></div>
    <form action="index.php" method="post" name="adminForm2" id="adminForm2">
    <?php echo JHtml::_('tabs.panel', JText::_('JBS_ADM_PLAYER_SETTINGS'), 'admin-player-settings'); ?>
                        <div class="width-100">
                            <div class="width-50 fltlft">
                                <fieldset class="panelform">
                                    <legend><?php echo JText::_('JBS_CMN_MEDIA_FILES'); ?></legend>
                                    <ul>
                                        <li>
                        <?php echo JText::_('JBS_ADM_MEDIA_PLAYER_STAT'); ?><br/>
                        <?php echo $this->playerstats; ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('from', 'params'); ?>
                        <?php echo $this->form->getInput('from', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('to', 'params'); ?>
                        <?php echo $this->form->getInput('to', 'params'); ?>
                    </li>
                    <li>
                        <input type="submit" value="Submit" />
                    </li>
                </ul>
            </fieldset>
            <input type="hidden" name="option" value="com_biblestudy" />
            <input type="hidden" name="task" value="changePlayers" />
            <input type="hidden" name="controller" value="admin" />
            <?php echo JHtml::_('form.token'); ?>
            </form>
        </div>
        
        <form action="index.php" method="post" name="adminForm3" id="adminForm3">
        <div class="width-50 fltrt">
            <fieldset class="panelform">
                <legend><?php echo JText::_('JBS_ADM_POPUP_OPTIONS'); ?></legend>
                <ul>
                    <li>
                        <?php echo JText::_('JBS_ADM_MEDIA_PLAYER_POPUP_STAT'); ?><br/>
                        <?php echo $this->popups; ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('pFrom', 'params'); ?>
                        <?php echo $this->form->getInput('pFrom', 'params'); ?>
                    </li>
                    <li>
                        <?php echo $this->form->getLabel('pTo', 'params'); ?>
                        <?php echo $this->form->getInput('pTo', 'params'); ?>
                    </li>
                    <li>
                        <input type="submit" value="Submit" />
                    </li>
                </ul>
            </fieldset>
             <input type="hidden" name="option" value="com_biblestudy" />
            <input type="hidden" name="task" value="changePopup" />
            <input type="hidden" name="controller" value="admin" />
            <?php echo JHtml::_('form.token'); ?>
            </form>
        </div>        
    </div>
    <div class="clr"></div>
    <?php echo JHtml::_('tabs.end'); ?>
                       

