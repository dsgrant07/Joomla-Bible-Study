<?php
/**
 * @version     $Id: form_16.php 1396 2011-01-17 23:12:12Z genu $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();
JHtml::_('behavior.formvalidation');

?>
<div class="edit">
<form action="<?php echo JRoute::_('index.php?option=com_biblestudy&layout=form&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
	<div class="formelm-buttons">
			<button type="button" onclick="Joomla.submitbutton('studiesedit.save')">
				<?php echo JText::_('JSAVE') ?>
			</button>
			<button type="button" onclick="Joomla.submitbutton('studiesedit.cancel')">
				<?php echo JText::_('JCANCEL') ?>
			</button>
			</div>
   
        <fieldset class="panelform">
            <legend><?php echo JText::_('JBS_STY_DETAILS'); ?></legend>
            <div class="formelm">
                    <?php echo $this->form->getLabel('studytitle'); ?>
                    <?php echo $this->form->getInput('studytitle'); ?>
            </div>
            <div class="formelm">
                    <?php echo $this->form->getLabel('studynumber'); ?>
                    <?php echo $this->form->getInput('studynumber'); ?>
             </div>
             <div class="formelm">
                    <?php echo $this->form->getLabel('studyintro'); ?>
                    <?php echo $this->form->getInput('studyintro'); ?>
               </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('script1'); ?>
                    <?php echo $this->form->getInput('script1'); ?>
               </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('script2'); ?>
                    <?php echo $this->form->getInput('script1'); ?>
               </div>
  
   </fieldset>
   <fieldset class="panelform">
               <div class="inlineFields">
               <legend><?php echo JText::_('JBS_CMN_SCRIPTURE'); ?></legend>
                    
              <strong> <label><?php echo JText::_('JBS_CMN_SCRIPTURE1'); ?></label></strong>
                        <div>
                            <?php echo $this->form->getLabel('booknumber'); ?>
                            <?php echo $this->form->getInput('booknumber'); ?>
                        
                            <?php echo $this->form->getLabel('chapter_begin'); ?>
                            <?php echo $this->form->getInput('chapter_begin'); ?>
                        
                            <?php echo $this->form->getLabel('verse_begin'); ?>
                            <?php echo $this->form->getInput('verse_begin'); ?>
                        
                            <?php echo $this->form->getLabel('chapter_end'); ?>
                            <?php echo $this->form->getInput('chapter_end'); ?>
                       
                            <?php echo $this->form->getLabel('verse_end'); ?>
                            <?php echo $this->form->getInput('verse_end'); ?>
                        </div>
                  <br />
               
                  <strong>  <label><?php echo JText::_('JBS_CMN_SCRIPTURE2'); ?></label></strong>
                    <div class="inlineFields">
                        <div>
                            <?php echo $this->form->getLabel('booknumber2'); ?>
                            <?php echo $this->form->getInput('booknumber2'); ?>
                        
                            <?php echo $this->form->getLabel('chapter_begin2'); ?>
                            <?php echo $this->form->getInput('chapter_begin2'); ?>
                        
                            <?php echo $this->form->getLabel('verse_begin2'); ?>
                            <?php echo $this->form->getInput('verse_begin2'); ?>
                        
                            <?php echo $this->form->getLabel('chapter_end2'); ?>
                            <?php echo $this->form->getInput('chapter_end2'); ?>
                        
                            <?php echo $this->form->getLabel('verse_end2'); ?>
                            <?php echo $this->form->getInput('verse_end2'); ?>
                        </div>
                    </div>
               <div class="formelm">
               <br />
                    <?php echo $this->form->getLabel('secondary_reference'); ?>
                    <?php echo $this->form->getInput('secondary_reference'); ?>
                        </div>
   </fieldset>
   
   <fieldset class="panelform">
              
               <legend><?php echo JText::_('JBS_CMN_DETAILS'); ?></legend>
                     <div class="inlineFields">
              <strong> <label><?php echo JText::_('JBS_CMN_DURATION'); ?></label></strong><br />
              
                 
                    
                                        <?php echo $this->form->getLabel('media_hours'); ?>
                                        <?php echo $this->form->getInput('media_hours'); ?>
                                   
                                        <?php echo $this->form->getLabel('media_minutes'); ?>
                                        <?php echo $this->form->getInput('media_minutes'); ?>
                                    
                                        <?php echo $this->form->getLabel('media_seconds'); ?>
                                        <?php echo $this->form->getInput('media_seconds'); ?>

                  
               </div>
               <br />
               <div class="formelm">
                    <?php echo $this->form->getLabel('teacher_id'); ?>
                    <?php echo $this->form->getInput('teacher_id', null, $this->admin->params['teacher_id']); ?>
                      </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('location_id'); ?>
                    <?php echo $this->form->getInput('location_id', null, $this->admin->params['location_id']); ?>
                        </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('series_id'); ?>
                    <?php echo $this->form->getInput('series_id', null, $this->admin->params['series_id']); ?>
                       </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('topics_id'); ?>
                    <?php echo $this->form->getInput('topics_id', null, $this->admin->params['topic_id']); ?>
                        </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('messagetype'); ?>
                    <?php echo $this->form->getInput('messagetype', null, $this->admin->params['messagetype']); ?>
                        </div>
               <div class="formelm">
                    <?php echo $this->form->getLabel('thumbnailm'); ?>
                    <?php echo $this->form->getInput('thumbnailm', null, $this->admin->params['default_study_image']); ?>
                   </div>
</fieldset>
<fieldset class="panelform">
        <div class="formelm">
                 <strong>   <?php echo $this->form->getLabel('studytext'); ?></strong>
        </div>
        <div class="formelm">
            <?php echo $this->form->getInput('studytext'); ?>
        </div>
</fieldset>
                    
<fieldset class="panelform">
        
            <legend><?php echo JText::_('JBS_CMN_PUBLISHING_OPTIONS'); ?></legend>
                           
               <div class="formelm-area">
                    <?php echo $this->form->getLabel('published'); ?>
                    <?php echo $this->form->getInput('published'); ?>
                </div>
                <div class="formelm-area">    
                    <?php echo $this->form->getLabel('studydate'); ?>
                    <?php echo $this->form->getInput('studydate'); ?>
               </div>
               <div class="formelm-area">
                    <?php echo $this->form->getLabel('comments'); ?>
                    <?php echo $this->form->getInput('comments'); ?>
               <div class="formelm-area">     
                    <?php echo $this->form->getLabel('user_id'); ?>
                    <?php echo $this->form->getInput('user_id', null, $this->admin->user_id); ?>
               </div>
               <div class="formelm-area">      
              
                    <?php echo $this->form->getLabel('show_level'); ?>
                    <?php echo $this->form->getInput('show_level'); ?>
               </div>     
              
        
</fieldset>
<fieldset class="panelform">
          
            <div >
                
                    <legend><?php echo JText::_('JBS_STY_MEDIA_THIS_STUDY'); ?></legend>
                    <table class="adminlist" width="100%">
                        <thead>
                            <tr>
                                <th align="center"><?php echo JText::_('JBS_CMN_EDIT_MEDIA_FILE'); ?></th>
                                <th align="center"><?php echo JText::_('JBS_CMN_MEDIA_CREATE_DATE'); ?></th>
                                <th align="center"><?php echo JText::_('JBS_CMN_SCRIPTURE'); ?></th>
                                <th align="center"><?php echo JText::_('JBS_CMN_TEACHER'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                            if (count($this->mediafiles) > 0) :
                                foreach ($this->mediafiles as $i => $item) :
                    ?>
                                    <tr class="row<?php echo $i % 2; ?>">
                                        <td align="center">
                                            <a href="<?php echo JRoute::_("index.php?option=com_biblestudy&task=mediafilesedit.edit&id=".(int)$item->id); ?>">
                                                <?php echo $this->escape($item->filename); ?>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <?php echo JHtml::_('date', $item->createdate, JText::_('DATE_FORMAT_LC4')); ?>
                                        </td>
                                        <td>???</td>
                                        <td>???</td>
                                    </tr>
                    <?php
                                    endforeach;
                                else:
                    ?>
                                    <tr>
                                        <td colspan="4" align="center"><?php echo JText::_('JBS_STY_NO_MEDIAFILES'); ?></td>
                                    </tr>
                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><a href="<?php echo JRoute::_('index.php?option=com_biblestudy&view=mediafileslist').'>'.JText::_('JBS_STY_VIEW_ALL_MEDIAFILES'); ?>"</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </fieldset>
                        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
</div>