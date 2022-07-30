<?php

    $searchValue = isset($this->params['search']) ?  $this->params['search'] : '';

    $xhtml ='';
    foreach ($this->items as $key => $item) {
        $id = $item['id'];
        $ordering = $item['ordering'];
        $status = Helper::showItemStatus($id, $item['status']);
        $link = Helper::highlight($searchValue, $item['link']);
        $linkEdit = URL::createLink($this->params['module'], $this->params['controller'], 'form', $id);
        $linkdelete= URL::createLink($this->params['module'], $this->params['controller'], 'delete', $id);
     
        $xhtml .= 
        '<tr>
            <td>'.$id.'</td>
            <td>'.$link.'</td>
            <td>'.$status.'</td>
            <td>'.$item['ordering'].'</td>
            <td>
                <a href="'.$linkEdit.'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.$linkdelete.'" class="btn btn-sm btn-danger btn-delete">Delete</a>
            </td>
        </tr>';
    }
    $linkAdd = URL::createLink($this->params['module'], $this->params['controller'], 'form');
    $linkIndex = URL::createLink($this->params['module'], $this->params['controller'], 'index');
   
?>

<div class="card mb-4">
    <div class="card-body d-flex justify-content-between">
        <a href="../index.php" class="btn btn-primary m-0">Back to website</a>
        <a href="logout.php" class="btn btn-info m-0">Logout</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="hidden"  name="module" value="backend">
                <input type="hidden"  name="controller" value="rss">
                <input type="hidden"  name="action" value="index">
                <input type="text" class="form-control" name="search" placeholder="Enter search keyword...."  value="<?= $searchValue?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Search</button>
                    <a href="<?=$linkIndex?>" class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">RSS List</h4>
        <a href="<?=$linkAdd?>" class="btn btn-success m-0">Add</a>
    </div>
    <div class="card-body">
        <table class="table table-striped btn-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ordering</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $xhtml?>
            </tbody>
        </table>
    </div>
</div>