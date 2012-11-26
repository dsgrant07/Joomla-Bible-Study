<?php
/**
 * Default
 * @package BibleStudy.Admin
 * @Copyright (C) 2007 - 2011 Joomla Bible Study Team All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.JoomlaBibleStudy.org
 * */
//No Direct Access
defined('_JEXEC') or die;

if (BIBLESTUDY_CHECKREL) {
    JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
    JHtml::_('bootstrap.tooltip');
    JHtml::_('dropdown.init');
    JHtml::_('formbehavior.chosen', 'select');
} else {
    JHtml::_('behavior.tooltip');
}
JHtml::_('behavior.multiselect');

$app = JFactory::getApplication();
$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$archived = $this->state->get('filter.published') == 2 ? true : false;
$trashed = $this->state->get('filter.published') == -2 ? true : false;
$saveOrder = $listOrder == 'ordering';
$sortFields = $this->getSortFields();
?>
<script type="text/javascript">
    Joomla.orderTable = function() {
        table = document.getElementById("sortTable");
        direction = document.getElementById("directionTable");
        order = table.options[table.selectedIndex].value;
        if (order != '<?php echo $listOrder; ?>') {
            dirn = 'asc';
        } else {
            dirn = direction.options[direction.selectedIndex].value;
        }
        Joomla.tableOrdering(order, dirn, '');
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_biblestudy&view=mediafiles'); ?>" method="post" name="adminForm" id="adminForm">
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
        <div id="j-main-container" class="span10">
        <?php else : ?>
            <div id="j-main-container">
            <?php endif; ?>
    <div id="filter-bar" class="btn-toolbar">
        <div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('JBS_CMN_FILTER_SEARCH_DESC'); ?></label>
            <input type="text" name="filter_search" placeholder="<?php echo JText::_('JBS_CMN_FILTER_SEARCH_DESC'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JBS_CMN_FILTER_SEARCH_DESC'); ?>" />
        </div>
        <div class="btn-group pull-left hidden-phone">
            <button class="btn tip hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
            <button class="btn tip hasTooltip" type="button" onclick="document.id('filter_search').value='';this.form.submit();" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><i class="icon-remove"></i></button>
        </div>
        <div class="btn-group pull-right hidden-phone">
            <label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC'); ?></label>
            <?php echo $this->pagination->getLimitBox(); ?>
        </div>
        <div class="btn-group pull-right hidden-phone">
            <label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC'); ?></label>
            <select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla.orderTable()">
                <option value=""><?php echo JText::_('JFIELD_ORDERING_DESC'); ?></option>
                <option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING'); ?></option>
                <option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING'); ?></option>
            </select>
        </div>
        <div class="btn-group pull-right">
            <label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY'); ?></label>
            <select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
                <option value=""><?php echo JText::_('JGLOBAL_SORT_BY'); ?></option>
                <?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $listOrder); ?>
            </select>
        </div>
	    <?php if (!BIBLESTUDY_CHECKREL): ?>
        <div class="btn-group pull-right">
            <label for="filter_published" id="filter_published"
                   class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY'); ?></label>
            <select name="filter_published" class="input-medium" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
			    <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true); ?>
            </select>
        </div>

	    <?php endif; ?>
    </div>
    <div class="clearfix"> </div>

    <table class="table table-striped" id="locations">
        <thead>
        <tr>
            <th width="1%" class="nowrap center hidden-phone">
                <?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'mediafile.ordering', $listDirn, $listOrder, null, 'desc', 'JGRID_HEADING_ORDERING');
                if (!BIBLESTUDY_CHECKREL) echo JHtml::_('grid.order', $this->items, 'filesave.png', 'mediafile.saveorder');?>
            </th>
            <th width="1%"><input type="checkbox" name="checkall-toggle"
                                  value="" onclick="checkAll(this)" />
            </th>
            <th width="5%">
                <?php echo JHtml::_('grid.sort', 'JBS_CMN_PUBLISHED', 'mediafile.published', $listDirn, $listOrder); ?>
            </th>

            <th width="20%">
                <?php echo JHtml::_('grid.sort', 'JBS_MED_FILENAME', 'mediafile.filename', $listDirn, $listOrder); ?>
            </th>
            <th width="20%">
                <?php echo JHtml::_('grid.sort', 'JBS_CMN_STUDY_TITLE', 'study.studytitle', $listDirn, $listOrder); ?>
            </th>
            <th width="10%">
                <?php echo JHtml::_('grid.sort', 'JBS_MED_MEDIA_TYPE', 'mediatype.media_text', $listDirn, $listOrder); ?>
            </th>
            <th >
                <?php echo JHtml::_('grid.sort', 'JBS_MED_PLAYERLABEL', 'mediafile.player', $listDirn, $listOrder); ?>
            </th>
            <th >
                <?php echo JHtml::_('grid.sort', 'JBS_MED_POPUPLABEL', 'mediafile.popup', $listDirn, $listOrder); ?>
            </th>
            <th width="15%">
                <?php echo JHtml::_('grid.sort', 'JBS_CMN_MEDIA_CREATE_DATE', 'mediafile.createdate', $listDirn, $listOrder); ?>
            </th>
            <th>
                <?php echo JHtml::_('grid.sort', 'JBS_MED_DOWNLOAD', 'mediafile.link_type', $listDirn, $listOrder); ?>
            </th>
            <th width="10%" class="nowrap hidden-phone">
                <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ACCESS', 'series.access', $listDirn, $listOrder); ?>
            </th>
            <th width="5%">
                <?php echo JHtml::_('grid.sort', 'JBS_CMN_PLAYS', 'mediafile.plays', $listDirn, $listOrder); ?>
            </th>
            <th width="5%">
                <?php echo JHtml::_('grid.sort', 'JBS_MED_DOWNLOADS', 'mediafile.downloads', $listDirn, $listOrder); ?>
            </th>
            <th width="1%" class="nowrap">
                <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'mediafile.id', $listDirn, $listOrder); ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($this->items as $i => $item) :
            $item->max_ordering = 0; //??
            $canCreate = $user->authorise('core.create');
            $canEdit = $user->authorise('core.edit', 'com_biblestudy.mediafile.' . $item->id);
            $canEditOwn = $user->authorise('core.edit.own', 'com_biblestudy.mediafile.' . $item->id);
            $canChange = $user->authorise('core.edit.state', 'com_biblestudy.mediafile.' . $item->id);
            ?>
        <tr class="row<?php echo $i % 2; ?>" sortable-group-id="<?php echo '1' ?>">
            <td class="order nowrap center hidden-phone">
                <?php
                if ($canChange) :
                    $disableClassName = '';
                    $disabledLabel = '';

                    if (!$saveOrder) :
                        $disabledLabel = JText::_('JORDERINGDISABLED');
                        $disableClassName = 'inactive tip-top';
                    endif;
                    ?>
                    <span class="sortable-handler hasTooltip <?php echo $disableClassName ?>"
                          title="<?php echo $disabledLabel ?>">
                                            <i class="icon-menu"></i>
                                        </span>
                    <input type="text" style="<?php if (BIBLESTUDY_CHECKREL): ?>display:none<?php endif; ?>"
                           name="order[]"
                           size="5" value="<?php echo $item->ordering; ?>" class="width-10 text-area-order "/>
                    <?php else : ?>
                    <span class="sortable-handler inactive">
                                            <i class="icon-menu"></i>
                                        </span>
                    <?php endif; ?>
            </td>
            <td class="center hidden-phone">
                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
            </td>
            <td class="center">
                <div class="btn-group">
                    <?php echo JHtml::_('jgrid.published', $item->published, $i, 'mediafiles.', $canChange, 'cb', '', ''); ?>
                </div>
            </td>

            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php if ($canEdit || $canEditOwn) : ?>
                    <a href="<?php echo JRoute::_('index.php?option=com_biblestudy&task=mediafile.edit&id=' . (int) $item->id); ?>">
                        <?php echo ($this->escape($item->filename) ? $this->escape($item->filename) : 'ID: ' . $this->escape($item->id)); ?>
                    </a>
                    <?php else : ?>
                    <?php echo ($this->escape($item->filename) ? $this->escape($item->filename) : 'ID: ' . $this->escape($item->id)); ?>
                    <?php endif; ?>
                </div>
                <div class="pull-left">
                    <?php
                    if (BIBLESTUDY_CHECKREL) {
                        // Create dropdown items
                        JHtml::_('dropdown.edit', $item->id, 'article.');
                        JHtml::_('dropdown.divider');
                        if ($item->published) :
                            JHtml::_('dropdown.unpublish', 'cb' . $i, 'articles.');
                        else :
                            JHtml::_('dropdown.publish', 'cb' . $i, 'articles.');
                        endif;

                        JHtml::_('dropdown.divider');

                        if ($archived) :
                            JHtml::_('dropdown.unarchive', 'cb' . $i, 'articles.');
                        else :
                            JHtml::_('dropdown.archive', 'cb' . $i, 'articles.');
                        endif;

                        if ($trashed) :
                            JHtml::_('dropdown.untrash', 'cb' . $i, 'articles.');
                        else :
                            JHtml::_('dropdown.trash', 'cb' . $i, 'articles.');
                        endif;

                        // Render dropdown list
                        echo JHtml::_('dropdown.render');
                    }
                    ?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php echo $this->escape($item->studytitle); ?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php
                    //echo $this->directory;
                    $path = JURI::base() . '../';
                    if ($item->path2) {
                        if (!substr_count($item->path2, '/')) {
                            $image = '/media/com_biblestudy/images/' . $item->path2;
                        } else {
                            $image = $item->path2;
                        }
                    } else {
                        $image = $item->media_image_path;
                        $path = '../';
                    }
                    ?>
                    <img src=" <?php echo $path . $image; ?>" alt="<?php echo $item->mediaType; ?>" title="<?php echo $item->mediaType; ?>"/>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php switch ($this->escape($item->player))
                            {
                                case 100:
                                    echo JText::_('JBS_MED_GLOBAL');
                                    break;
                                case 0:
                                    echo JText::_('JBS_MED_DIRECT_LINK');
                                    break;
                                case 1:
                                    echo JText::_('JBS_MED_INTERNAL_PLAYER');
                                    break;
                                case 3:
                                    echo JText::_('JBS_MED_AV');
                                    break;
                                case 7:
                                    echo JText::_('JBS_MED_LEGACY_PLAYER');
                                    break;
                                case 8:
                                    echo JText::_('JBS_MED_EMBED_CODE');
                                    break;
                            } ?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php switch ($this->escape($item->popup))
                    {
                    case 3:
                        echo JText::_('JBS_MED_GLOBAL');
                        break;
                    case 1:
                        echo JText::_('JBS_MED_POPUPLABEL');
                        break;
                    case 2:
                        echo JText::_('JBS_MED_INLINELABEL');
                        break;
                    }?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php echo JHtml::_('date', $item->createdate, JText::_('DATE_FORMAT_LC4')); ?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php switch ($this->escape($item->link_type))
                            {
                            case 0:
                                echo JText::_('JNO');
                                break;
                            case 1:
                                echo JText::_('JYES');
                                break;
                            case 2:
                                echo JText::_('JBS_CMN_ONLY');
                                break;
                            }?>
                </div>
            </td>
            <td class="small hidden-phone">
                <?php echo $this->escape($item->access_level); ?>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php echo $this->escape($item->plays); ?>
                </div>
            </td>
            <td class="nowrap has-context">
                <div class="pull-left">
                    <?php echo $this->escape($item->downloads); ?>
                </div>
            </td>


            <td class="center hidden-phone">
                <?php echo (int) $item->id; ?>
            </td>
        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->pagination->getListFooter(); ?>
    <?php //Load the batch processing form. ?>
    <?php echo $this->loadTemplate('batch'); ?>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</div>
</form>