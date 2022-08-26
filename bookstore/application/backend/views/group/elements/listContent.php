<?php
// echo '<pre>';
// print_r($this->items);
// echo '</pre>';
$params = $this->params;
$searchValue = isset($this->params['search']) ?  $this->params['search'] : '';

$xhtml = '';
foreach ($this->items as $key => $item) {
    $id           = $item['id'];
    $status       = HelperBackend::showItemStatus($params['module'], $params['controller'],$id, $item['status']);
    $groupAcp     = HelperBackend::showItemGroupAcp($params['module'], $params['controller'], $id, $item['group_acp']);
    $buttonEdit   = HelperBackend::showAction($params['module'], $params['controller'], $id, 'edit');
    $buttonDelete = HelperBackend::showAction($params['module'], $params['controller'], $id, 'delete');
    $created      = HelperBackend::showItemHistory($item['created_by'], $item['created']);
    $modified     = HelperBackend::showItemHistory($item['modified_by'], $item['modified']);
    $checkbox     = HelperBackend::showCheckbox($id);

    $name     = HelperBackend::highlight($searchValue, $item['name']);
    $linkAdd  = URL::createLink($params['module'], $params['controller'], 'form');
    $linkEdit = URL::createLink($params['module'], $params['controller'], 'form', ['id' => $id]);
    
    $xhtml .= '
        <tr>
        <td class="text-center">'. $checkbox.'</td>
        <td class="text-center">' . $id . '</td>
        <td class="text-center">' . $name . '</td>
        <td class="text-center position-relative">' . $status . '</td>
        <td class="text-center position-relative">' . $groupAcp . '</td>
        <td class="text-center"> ' . $created . '</td>
        <td class="text-center modified-1"> ' . $modified . ' </td>
        <td class="text-center">' . $buttonEdit . $buttonDelete . '</td>
    </tr>';
}

?>

<form action="submit" method="post" class="table-responsive" id="form-table">
    <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
        <thead>
            <tr>
                <th class="text-center">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input check" type="checkbox" id="check-all" >
                        <label for="check-all" class="custom-control-label"></label>
                    </div>
                </th>
                <th class="text-center">ID</a></th>
                <th class="text-center">Name</a></th>
                <th class="text-center">Status</a></th>
                <th class="text-center">Group ACP</a></th>
                <th class="text-center">Created</a></th>
                <th class="text-center">Modified</a></th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody> <?= $xhtml ?> </tbody>
    </table>
    <div>
        <input type="hidden" name="sort_field" value="">
        <input type="hidden" name="sort_order" value="">
    </div>
</form>