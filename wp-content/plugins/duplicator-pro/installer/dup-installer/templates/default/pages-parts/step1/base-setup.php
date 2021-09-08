<?php
/**
 *
 * @package templates/default
 *
 */
defined('ABSPATH') || defined('DUPXABSPATH') || exit;

$paramsManager = DUPX_Paramas_Manager::getInstance();

$cpnlCanSel = $paramsManager->getValue(DUPX_Paramas_Manager::PARAM_CPNL_CAN_SELECTED);

$cpnlDisplay  = 'no-display';
$basicDisplay = '';

if ($cpnlCanSel && $paramsManager->getValue(DUPX_Paramas_Manager::PARAM_DB_VIEW_MODE) === 'cpnl') {
    $cpnlDisplay  = '';
    $basicDisplay = 'no-display';
}
?>
<div id="base-setup-area-header" class="hdr-sub1 toggle-hdr close" data-type="toggle" data-target="#base-setup-area">
    <a href="javascript:void(0)"><i class="fa fa-minus-square"></i>Setup</a>
</div>
<div id="base-setup-area" class="hdr-sub1-area dupx-opts" >
    <?php
    if ($cpnlCanSel) {
        $paramsManager->getHtmlFormParam(DUPX_Paramas_Manager::PARAM_DB_VIEW_MODE);
    }
    ?>
    <div class="s2-basic-pane <?php echo $basicDisplay; ?>">
        <?php dupxTplRender('pages-parts/step1/database-tabs/basic-db-connection'); ?>
    </div>

    <?php if ($cpnlCanSel) { ?>
        <div class="s2-cpnl-pane <?php echo $cpnlDisplay; ?>">
            <?php
            dupxTplRender('pages-parts/step1/database-tabs/cpanel-panel');
            dupxTplRender('pages-parts/step1/database-tabs/cpanel-db-connection');
            ?>
        </div>
    <?php } ?>
    <div class="margin-top-2" ></div>
    <?php dupxTplRender('pages-parts/step1/options-tabs/settings'); ?>
</div>