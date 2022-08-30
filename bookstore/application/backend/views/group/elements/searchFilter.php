<?php

$inputHiddenModule     = FormBackend::input('hidden', 'moduleId', 'module', $params['module']);
$inputHiddenController = FormBackend::input('hidden', 'controllerId', 'controller', $params['controller']);
$inputHiddenAction     = FormBackend::input('hidden', 'actionId', 'action', $params['action']);

$searchValue = isset($params['search']) ?  $params['search'] : '';

$keySelected = 
[
    'default' => '- Select Group ACP -',
    'yes' => 'Yes',
    'no' => 'No',
];
$buttonSelect = HelperBackend::showButtonSelect($keySelected, $params['filter_groupacp']?? 'default');

$filterStatus = [
    'filter_status'   => $params['filter_status'] ?? 'all',
];
// if(isset($params['filter_groupacp'])){
//     $filterStatus = [
//         'filter_status'   => $params['filter_status'] ?? 'all',
//         'filter_groupacp' => $params['filter_groupacp']
//     ];
// }
if(isset($params['filter_groupacp'])){
    $filterStatus['filter_groupacp'] = $params['filter_groupacp'];
}
if(isset($params['search'])){
    $filterStatus['search'] = $params['search'];
}

$flag = $filterStatus;
unset($flag['search']);
$linkIndex                 = URL::createLink($params['module'], $params['controller'], 'index', $flag);
$buttonStatus              = HelperBackend::showFilterStatus($params['module'], $params['controller'], $this->itemsCount, $filterStatus);

$url                       = $inputHiddenModule.$inputHiddenController.$inputHiddenAction;
$urlGroupAcp               = $inputHiddenModule.$inputHiddenController.$inputHiddenAction;
$inputHiddenFilterStatus   = FormBackend::input('hidden', 'filter_status', 'filter_status', @$params['filter_status']);
$inputHiddenFilterGroupAcp = FormBackend::input('hidden', 'filter_groupacp', 'filter_groupacp', @$params['filter_groupacp']);
// $inputHiddenFilterSearch   = FormBackend::input('hidden', 'filter_search', 'filter_search', @$params['filter_search']);
if(isset($params['filter_status']))     {
    $url .= $inputHiddenFilterStatus;
    $urlGroupAcp .= $inputHiddenFilterStatus;
}
if(isset($params['filter_groupacp']))   $url .= $inputHiddenFilterGroupAcp;
// if(isset($params['search']))     {
//     $url .= $inputHiddenFilterSearch;
//     $urlGroupAcp .= $inputHiddenFilterSearch;
// }

// echo '<pre>';
// print_r( $filterStatus);
// echo '</pre>';
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <h6 class="card-title">Search & Filter</h6>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="mb-1">
                <?=$buttonStatus?>
            </div>
            <div class="mb-1">
                <form action="" method="get" id="form-filter-group-acp" name="form-filter-group-acp" >
                    <?=$urlGroupAcp?>
                    <select id="filter_groupacp" name="filter_groupacp" class="custom-select custom-select-sm mr-1" style="width: unset" >
                        <?=$buttonSelect?>
                    </select>
                </form>
            </div>
            <div class="mb-1">
                <form action="" method="get">
                    <div class="input-group">
                        <?=$url?>
                        <input type="text" id="input-search" class="form-control form-control-sm" name="search" value="<?=$searchValue?>" style="min-width: 300px"  >

                        <div class="input-group-append">
                            <a href="<?= $linkIndex ?>" type="submit" class="btn btn-sm btn-danger" id="btn-clear-search">Clear</a>
                            <button type="submit" class="btn btn-sm btn-info" value="" id="btn-search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>