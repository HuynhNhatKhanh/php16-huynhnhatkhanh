<?php
    

    
    // echo '<pre>';
    // print_r($this->itemsCount);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($this->params);
    // echo '</pre>';

    $filterPage = [];
    $numberOfStatus = 0;
    if(isset($params['filter_status'])){
        $filterPage['filter_status'] = $params['filter_status'];
        if($params['filter_status'] == 'all'){
            $numberOfStatus = $this->itemsCount['all'];
        }
        if($params['filter_status'] == 'active' ){
            if( @$this->itemsCount['inactive'] != $this->itemsCount['all']) $numberOfStatus = $this->itemsCount['active'];
        }
        if($params['filter_status'] == 'inactive'){
            if( @$this->itemsCount['active'] != $this->itemsCount['all'])  $numberOfStatus = $this->itemsCount['inactive'];
        }
    }
    if(isset($params['filter_groupacp'])){
        $filterPage['filter_groupacp'] = $params['filter_groupacp'];
    }
    if(isset($params['search'])){
        $filterPage['search'] = $params['search'];
    }


    // echo '<pre>';
    // print_r($filterPage);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($numberOfStatus);
    // echo '</pre>';

    $paginationHTML	= $this->pagination->showPagination(URL::createLink($params['module'], $params['controller'], 'index',$filterPage), $this->params['pagination'], $numberOfStatus);
?>

<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        <?=$paginationHTML?>

        <!-- <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>
        <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-left"></i></a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li> -->
    </ul>
</div>