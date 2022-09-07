<?php

    $inputHiddenModule     = FormBackend::input('hidden', 'moduleId', 'module', $params['module']);
    $inputHiddenController = FormBackend::input('hidden', 'controllerId', 'controller', $params['controller']);
    $inputHiddenAction     = FormBackend::input('hidden', 'actionId', 'action', $params['action']);

    $searchValue = isset($params['search']) ?  $params['search'] : '';

   
   
    $itemsGroup = $this->itemsGroup;
    $itemsGroup['default'] = '- Select Group -';
    // echo '<pre>';
    // print_r($this->items);
    // echo '</pre>';
    $buttonSelect = HelperBackend::showButtonSelect($this->itemsGroup, $this->items['group_id'] ?? 'default');
    
    

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
<!-- <div class="card card-info card-outline">
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
                <a href="#" class="mr-1 btn btn-sm btn-info">All <span class="badge badge-pill badge-light">15</span></a>
                <a href="#" class="mr-1 btn btn-sm btn-secondary">Active <span class="badge badge-pill badge-light">7</span></a>
                <a href="#" class="mr-1 btn btn-sm btn-secondary">Inactive <span class="badge badge-pill badge-light">8</span></a>
            </div>
            <div class="mb-1">
                <select id="filter_group" name="filter_group" class="custom-select custom-select-sm mr-1" style="width: unset">
                    <option value="default" selected="">- Select Group -</option>
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">Member</option>
                </select>
            </div>
            <div class="mb-1">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search_value" value="" style="min-width: 300px">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-sm btn-danger" id="btn-clear-search">Clear</button>
                            <button type="button" class="btn btn-sm btn-info" id="btn-search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->