<?php
    $arrMenu = [
        ['link' => URL::createLink($this->params['module'], 'group', 'index')   , 'name' => 'Group'     , 'icon' => 'ion ion-ios-people', 'number' => @$this->numberRecordGroup['count']],
        ['link' => URL::createLink($this->params['module'], 'user', 'index')    , 'name' => 'User'      , 'icon' => 'ion ion-ios-person', 'number' => @$this->numberRecordUser['count']],
        ['link' => URL::createLink($this->params['module'], 'category', 'index'), 'name' => 'Category'  , 'icon' => 'ion ion-clipboard', 'number' => @$this->numberRecordGroup['count']],
        ['link' => URL::createLink($this->params['module'], 'book', 'index')    , 'name' => 'Book'      , 'icon' => 'ion ion-ios-book', 'number' => @$this->numberRecordGroup['count']],
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
            <!-- <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>3</h3>
                        <p>Group</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>4</h3>
                        <p>User</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>22</h3>
                        <p>Category</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>55</h3>
                        <p>Book</p>
                    </div>
                    <div class="icon text-white">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- /.content -->