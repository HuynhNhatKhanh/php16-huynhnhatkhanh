<?php
// echo '<pre>';
// print_r($this->items);
// echo '</pre>';
$params = $this->params;
$searchValue = isset($this->params['search']) ?  $this->params['search'] : '';

$xhtml = '';
foreach ($this->items as $key => $item) {
    $id = $item['id'];
    $status = HelperBackend::showItemStatus($params['module'], $params['controller'],$id, $item['status']);
    $groupAcp = HelperBackend::showItemGroupAcp($params['module'], $params['controller'], $id, $item['group_acp']);
    $buttonEdit = HelperBackend::showAction($params['module'], $params['controller'], $id, 'edit');
    $buttonDelete = HelperBackend::showAction($params['module'], $params['controller'], $id, 'delete');
    $created = HelperBackend::showItemHistory($item['created_by'], $item['created']);
    $modified = HelperBackend::showItemHistory($item['modified_by'], $item['modified']);
    $checkbox = HelperBackend::showCheckbox($id);

    $name = HelperBackend::highlight($searchValue, $item['name']);
    $linkAdd = URL::createLink($params['module'], $params['controller'], 'form');
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
        <tbody>
            <?= $xhtml ?>
            <!-- <tr>
                                 <td class="text-center">
                                     <div class="custom-control custom-checkbox">
                                         <input class="custom-control-input" type="checkbox" id="checkbox-1" name="checkbox[]" value="1">
                                         <label for="checkbox-1" class="custom-control-label"></label>
                                     </div>
                                 </td>
                                 <td class="text-center">1</td>
                                 <td class="text-center">Admin</td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                 <td class="text-center">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i></p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i></p>
                                 </td>
                                 <td class="text-center modified-1">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i></p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i></p>
                                 </td>
                                 <td class="text-center">
                                     <a href="" class="rounded-circle btn btn-sm btn-info" title="Edit">
                                         <i class="fas fa-pencil-alt"></i>
                                     </a>

                                     <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                                         <i class="fas fa-trash-alt"></i>
                                     </a>
                                 </td>
                             </tr>

                             <tr>
                                 <td class="text-center">
                                     <div class="custom-control custom-checkbox">
                                         <input class="custom-control-input" type="checkbox" id="checkbox-2" name="checkbox[]" value="2">
                                         <label for="checkbox-2" class="custom-control-label"></label>
                                     </div>
                                 </td>
                                 <td class="text-center">2</td>
                                 <td class="text-center">Manager</td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                 <td class="text-center">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:15:43</p>
                                 </td>
                                 <td class="text-center modified-2">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 03:01:45</p>
                                 </td>
                                 <td class="text-center">
                                     <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                                         <i class="fas fa-pencil-alt"></i>
                                     </a>

                                     <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                                         <i class="fas fa-trash-alt"></i>
                                     </a>
                                 </td>
                             </tr>

                             <tr>
                                 <td class="text-center">
                                     <div class="custom-control custom-checkbox">
                                         <input class="custom-control-input" type="checkbox" id="checkbox-3" name="checkbox[]" value="3">
                                         <label for="checkbox-3" class="custom-control-label"></label>
                                     </div>
                                 </td>
                                 <td class="text-center">3</td>
                                 <td class="text-center">Member</td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
                                 <td class="text-center">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:16:02</p>
                                 </td>
                                 <td class="text-center modified-3">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> manager01</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 15:18:44</p>
                                 </td>
                                 <td class="text-center">
                                     <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                                         <i class="fas fa-pencil-alt"></i>
                                     </a>

                                     <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                                         <i class="fas fa-trash-alt"></i>
                                     </a>
                                 </td>
                             </tr>

                             <tr>
                                 <td class="text-center">
                                     <div class="custom-control custom-checkbox">
                                         <input class="custom-control-input" type="checkbox" id="checkbox-4" name="checkbox[]" value="4">
                                         <label for="checkbox-4" class="custom-control-label"></label>
                                     </div>
                                 </td>
                                 <td class="text-center">4</td>
                                 <td class="text-center">Register</td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
                                 <td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
                                 <td class="text-center">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:16:24</p>
                                 </td>
                                 <td class="text-center modified-4">
                                     <p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
                                     <p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 17:25:02</p>
                                 </td>
                                 <td class="text-center">
                                     <a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
                                         <i class="fas fa-pencil-alt"></i>
                                     </a>

                                     <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                                         <i class="fas fa-trash-alt"></i>
                                     </a>
                                 </td>
                             </tr> -->
        </tbody>
    </table>
    <div>
        <input type="hidden" name="sort_field" value="">
        <input type="hidden" name="sort_order" value="">
    </div>
</form>