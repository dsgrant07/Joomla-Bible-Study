<?php
/**
 * Form
 *
 * @package    BibleStudy.Site
 * @copyright  (C) 2007 - 2013 Joomla Bible Study Team All rights reserved
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.JoomlaBibleStudy.org
 * */
// No Direct Access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidation');

// Load the tooltip behavior.
if (BIBLESTUDY_CHECKREL)
{
    JHtml::_('formbehavior.chosen', 'select');
}
else
{
    JHtml::_('behavior.tooltip');
    JHtml::stylesheet('media/com_biblestudy/jui/css/bootstrap.css');
    JHtml::script('media/com_biblestudy/jui/js/jquery.js');
    JHtml::script('media/com_biblestudy/jui/js/jquery-noconflict.js');
    JHtml::script('media/com_biblestudy/jui/js/jquery.ui.core.min.js');
    JHtml::script('media/com_biblestudy/jui/js/bootstrap.js');
    JHTML::stylesheet('media/com_biblestudy/css/biblestudy-j2.5.css');
    JHTML::stylesheet('media/com_biblestudy/jui/css/chosen.css');
}

JHtml::script('media/com_biblestudy/js/noconflict.js');
JHtml::script('media/com_biblestudy/js/biblestudy.js');
?>
<script type="text/javascript">
Joomla.submitbutton = function (task) {
    if (task == 'sermon.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
        Joomla.submitform(task, document.getElementById('item-form'));
    } else {
        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
}
</script>
<?php
$params = $this->form->getFieldsets('params');
$app    = JFactory::getApplication();
$input  = $app->input;
?>

<div class="edit item-page<?php echo $this->pageclass_sfx; ?>">
<form action="<?php echo JRoute::_('index.php?option=com_biblestudy&view=messagelist&a_id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="item-form" class="form-validate form-vertical">
<div class="btn-toolbar">
    <div class="btn-group">
        <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('sermon.save')">
            <i class="icon-ok"></i> <?php echo JText::_('JSAVE') ?>
        </button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn" onclick="Joomla.submitbutton('sermon.cancel')">
            <i class="icon-cancel"></i> <?php echo JText::_('JCANCEL') ?>
        </button>
    </div>
</div>
<fieldset>
<ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab"><?php echo JText::_('JBS_STY_DETAILS'); ?></a></li>
    <li><a href="#publishing" data-toggle="tab"><?php echo JText::_('JBS_CMN_PUBLISHING_OPTIONS'); ?></a></li>
    <li><a href="#scripture" data-toggle="tab"><?php echo JText::_('JBS_CMN_SCRIPTURE'); ?></a></li>
    <li><a href="#info" data-toggle="tab"><?php echo JText::_('JBS_CMN_INFO'); ?></a></li>
    <li><a href="#metadata" data-toggle="tab"><?php echo JText::_('JBS_STY_METADATA'); ?></a></li>
    <li><a href="#media" data-toggle="tab"><?php echo JText::_('JBS_STY_MEDIA_THIS_STUDY'); ?></a></li>
</ul>
<div class="tab-content">
<!-- Begin Tabs -->
<div class="tab-pane active" id="general">
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('studytitle'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('studytitle'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('alias'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('alias'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('studynumber'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('studynumber'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('studyintro'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('studyintro'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('studytext'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('studytext'); ?>
        </div>
    </div>
</div>
<div class="tab-pane" id="scripture">
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('script1'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('script1'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('script2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('script1'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('booknumber'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('booknumber', null, empty($this->item->studytitle) ? $this->params->get('booknumber') : $this->item->booknumber);?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('chapter_begin'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('chapter_begin'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('verse_begin'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('verse_begin'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('chapter_end'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('chapter_end'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('verse_end'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('verse_end'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('booknumber2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('booknumber2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('chapter_begin2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('chapter_begin2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('verse_begin2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('verse_begin2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('chapter_end2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('chapter_end2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('verse_end2'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('verse_end2'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('secondary_reference'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('secondary_reference'); ?>
        </div>
    </div>
</div>

<div class="tab-pane" id="info">
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('media_hours'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('media_hours'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('media_minutes'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('media_minutes'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('media_seconds'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('media_seconds'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('teacher_id'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('teacher_id', null, empty($this->item->studytitle) ? $this->params->get('teacher_id') : $this->item->teacher_id) ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('location_id'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('location_id', null, empty($this->item->studytitle) ? $this->params->get('location_id') : $this->item->location_id) ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('series_id'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('series_id', null, empty($this->item->studytitle) ? $this->params->get('series_id') : $this->item->series_id) ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('topics'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('topics'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('messagetype'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('messagetype', null, empty($this->item->studytitle) ? $this->params->get('messagetype') : $this->item->messagetype) ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('thumbnailm'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('thumbnailm', null, empty($this->item->studytitle) ? $this->params->get('default_study_image') : $this->item->thumbnailm) ?>
        </div>
    </div>
</div>
<div class="tab-pane" id="publishing">
    <div class="control-group">
        <div class="control-label">
			<?php echo JText::_('JBS_STY_HITS'); ?>
        </div>
        <div class="controls">
			<?php echo $this->item->hits; ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('published'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('published'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('studydate'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('studydate'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('comments'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('comments'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('user_id'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('user_id', null, empty($this->item->studytitle) ? $this->admin->user_id : $this->item->user_id)?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('access'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('access'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('language'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('language'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
			<?php echo $this->form->getLabel('id'); ?>
        </div>
        <div class="controls">
			<?php echo $this->form->getInput('id'); ?>
        </div>
    </div>
</div>

<?php if ($this->canDo->get('core.admin')): ?>
<div class="tab-pane" id="permissions">

	<?php echo $this->form->getInput('rules'); ?>

</div>
	<?php endif; ?>


<div class="tab-pane" id="metadata">
	<?php
	foreach ($params as $name => $fieldset):
		if (isset($fieldset->description) && trim($fieldset->description)):
			?>
            <p class="tip">
				<?php echo $this->escape(JText::_($fieldset->description)); ?>
            </p>
			<?php endif; ?>

		<?php foreach ($this->form->getFieldset($name) as $field) : ?>
        <div class="control-group">
            <div class="control-label">
				<?php echo $field->label; ?>
            </div>
            <div class="controls">
				<?php echo $field->input; ?>
            </div>
        </div>

		<?php endforeach; ?>

		<?php endforeach; ?>
</div>
<div class="tab-pane" id="media">
    <table class="table table-striped adminlist">
        <thead>
        <tr>
            <th class="center"><?php echo JText::_('JBS_CMN_EDIT_MEDIA_FILE'); ?></th>
            <th class="center"><?php echo JText::_('JBS_CMN_MEDIA_CREATE_DATE'); ?></th>
        </tr>
        </thead>
        <tbody>
		<?php
		if (count($this->mediafiles) > 0) :
			foreach ($this->mediafiles as $i => $item) :
				?>
            <tr class="row<?php echo $i % 2; ?>">
                <td class="center">
					<?php $link = 'index.php?option=com_biblestudy&amp;task=mediafileform.edit&amp;a_id=' . (int) $item->id . '&amp;tmpl=component&amp;view=mediafileform&amp;layout=modal&amp;return=' . $this->return_page_item; ?>
                    <a class="btn btn-primary"
                       onclick="SqueezeBox.fromElement(this, {handler:'iframe', size: {x: 900, y: 550}, url:'<?php echo $link; ?>'})"
                       title="<?php echo $this->escape($item->filename) ? $this->escape($item->filename) : 'ID: ' . $this->escape($item->id); ?>">
						<?php echo ($this->escape($item->filename) ? $this->escape($item->filename) : 'ID: ' . $this->escape($item->id)); ?>
                    </a>
                </td>
                <td class="center">
					<?php echo JHtml::_('date', $item->createdate, JText::_('DATE_FORMAT_LC4')); ?>
                </td>

            </tr>
				<?php
			endforeach;
		else:
			?>
        <tr>
            <td colspan="4" class="center"><?php echo JText::_('JBS_STY_NO_MEDIAFILES'); ?></td>
        </tr>
			<?php endif; ?>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">
				<?php $link = 'index.php?option=com_biblestudy&amp;task=mediafileform.edit&amp;a_id=0&amp;sid=' . $this->form->getValue('id') . '&amp;tmpl=component&amp;view=mediafileform&amp;layout=modal&amp;return=' . $this->return_page_item; ?>
				<?php
				if (empty($this->item->id))
				{
					?> <a onClick="Joomla.submitbutton('messageform.apply');"
                          href="#"> <?php echo JText::_('JBS_STY_SAVE_FIRST'); ?> </a> <?php
				}
				else
				{
					?>
                    <a class="btn btn-primary"
                       onclick="SqueezeBox.fromElement(this, {handler:'iframe', size: {x: 900, y: 550}, url:'<?php echo $link; ?>'})"
                       title="<?php echo JText::_('JBS_STY_ADD_MEDIA_FILE'); ?>">
						<?php echo JText::_('JBS_STY_ADD_MEDIA_FILE'); ?></a> <?php
				}
				?>
            </td>
        </tr>
        </tfoot>
    </table>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="return" value="<?php echo $this->return_page; ?>"/>
</div>
</div>
<?php echo JHtml::_('form.token'); ?>
<!-- End Sidebar -->
</fieldset>
</form>
</div>
