<?php
    $params = $this->params;
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Search & Filter -->
        <?php require_once "elements/searchFilter.php"?>

        <!-- List -->
        <div class="card card-info card-outline">
            <div class="card-header">
                <h4 class="card-title">List</h4>
                <div class="card-tools">
                    <a href="#" class="btn btn-tool"><i class="fas fa-sync"></i></a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!-- Control -->
                <?php require_once "elements/listControl.php"?>
                
                <!-- List Content -->
                <?php require_once "elements/listContent.php"?>
            </div>
            <?php require_once "elements/pagination.php"?>
        </div>
    </div>
</section>
<!-- /.content -->