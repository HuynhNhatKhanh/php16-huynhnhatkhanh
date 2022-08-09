<!DOCTYPE html>
<html>

<head>
    <!-- <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once 'html/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once 'html/sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
            ?>
        </div>
        <?php require_once 'html/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- script -->

    <!-- <?php echo $this->_jsFiles;?> -->
</body>

</html>