<?php
    $arrMenu = [
        ['link' => URL::createLink($this->params['module'], 'group', 'index')   , 'name' => 'Group'     , 'icon' => 'ion ion-ios-people', 'number' => @$this->numberRecordGroup['count']],
        ['link' => URL::createLink($this->params['module'], 'user', 'index')    , 'name' => 'User'      , 'icon' => 'ion ion-ios-person', 'number' => @$this->numberRecordUser['count']],
        ['link' => URL::createLink($this->params['module'], 'category', 'index'), 'name' => 'Category'  , 'icon' => 'ion ion-clipboard', 'number' => @$this->numberRecordCategory['count']],
        ['link' => URL::createLink($this->params['module'], 'book', 'index')    , 'name' => 'Book'      , 'icon' => 'ion ion-ios-book', 'number' => @$this->numberRecordBook['count']],
    ];
    $xhtml = '';
    foreach ($arrMenu as $key => $value) {
        $xhtml .= '
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>'.$value['number'].'</h3>
                        <p>'.$value['name'].'</p>
                    </div>
                    <div class="icon text-white">
                        <i class="'.$value['icon'].'"></i>
                    </div>
                    <a href="'.$value['link'].'" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        ';
    }
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <?=$xhtml?>
        </div>
    </div>
</section>
<!-- /.content -->