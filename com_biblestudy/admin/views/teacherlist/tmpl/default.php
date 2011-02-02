<?php

/**
 * @version     $Id: default.php 1466 2011-01-31 23:13:03Z bcordis $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();
require_once (JPATH_ADMINISTRATOR  .DS. 'components' .DS. 'com_biblestudy' .DS. 'lib' .DS. 'biblestudy.defines.php');
JHtml::_('script', 'system/multiselect.js', false, true);
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
?>
<form action="<?php echo JRoute::_('index.php?option=com_biblestudy&view=templateslist'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-select fltrt">
            <select name="filter_state" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true); ?>
            </select>
        </div>
    </fieldset>
    <div class="clr"></div>
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">
                    <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)"/>
                </th>
                <th width="8%">
                    <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'template.published', $listDirn, $listOrder); ?>
                </th>
                <th align="center" width="10%">
                    <?php
                        echo JHtml::_('grid.sort', 'JGRID_HEADING_ORDERING', 'teacheredit.ordering', $listDirn, $listOrder);
                        echo JHtml::_('grid.order', $this->items, 'filesave.png', 'teacherlist.saveorer');
                    ?>
                </th>
                <th alicn="center">
                    <?php echo JHtml::_('grid.sort', 'JBS_CMN_TEACHER', 'teacher.teachername', $listDirn, $listOrder); ?>
                </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php
                foreach($this->items as $i => $item) :
            ?>
            <tr class="row<?php echo $i % 2; ?>">
                <td class="center">
                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                </td>
                <td class="center">
                    <?php echo JHtml::_('jgrid.published', $item->published, $i, 'teacherlist.', true, 'cb', '', ''); ?>
                </td>
                <td class="center">
                <?php if($listDirn == 'asc') : ?>
                    <span><?php echo $this->pagination->orderUpIcon($i, ($item->studytitle == @$this->items[$i-1]->studytitle), 'teacherlist.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, ($item->teachername == @$this->items[$i-1]->teachername), 'teacherlist.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                <?php elseif ($listDirn == 'desc') : ?>
                    <span><?php echo $this->pagination->orderUpIcon($i, ($item->studytitle == @$this->items[$i-1]->studytitle), 'teacherlist.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, ($item->teachername == @$this->items[$i-1]->teachername), 'teacherlist.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                <?php endif; ?>
                <?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
		<input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
                </td>
                <td class="center">
                    <a href="<?php echo JRoute::_('index.php?option=com_biblestudy&task=teacheredit.edit&id='.(int)$item->id); ?>">
                        <?php echo $this->escape($item->teachername); ?>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?> "/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?> "/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>