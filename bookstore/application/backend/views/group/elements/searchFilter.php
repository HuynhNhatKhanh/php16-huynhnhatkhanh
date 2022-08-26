<?php

$inputHiddenModule     = FormBackend::input('hidden', 'moduleId', 'module', $params['module']);
$inputHiddenController = FormBackend::input('hidden', 'controllerId', 'controller', $params['controller']);
$inputHiddenAction     = FormBackend::input('hidden', 'actionId', 'action', $params['action']);


$searchValue = isset($this->params['search']) ?  $this->params['search'] : '';

$linkIndex = URL::createLink($params['module'], $params['controller'], 'index');

$keySelected = 
[
    'default' => '- Select Group ACP -',
    'yes' => 'Yes',
    'no' => 'No',
];
$buttonSelect = HelperBackend::showButtonSelect($keySelected, $this->params['filter_groupacp']?? 'default');

$filterStatus = $params['filter_status'] ?? 'all';
$buttonStatus = HelperBackend::showFilterStatus($params['module'], $params['controller'], $this->itemsCount, $filterStatus);

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
                <form action="" method="get" id="form-filter-group-acp">
                    <?=$inputHiddenModule.$inputHiddenController.$inputHiddenAction?>
                    <select onchange="this.form.submit()" id="filter_groupacp" name="filter_groupacp" class="custom-select custom-select-sm mr-1" style="width: unset" >
                        <?=$buttonSelect?>
                    </select>
                </form>
            </div>
            <div class="mb-1">
                <form action="" method="get">
                    <div class="input-group">
                        <?=$inputHiddenModule.$inputHiddenController.$inputHiddenAction?>
                        <input type="text" class="form-control form-control-sm" name="search" value="<?=$searchValue?>" style="min-width: 300px"  >

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