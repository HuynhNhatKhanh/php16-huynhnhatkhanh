<?php 
    $linkLogout = URL::createLink('backend', 'index', 'logout');
    $linkFrontend = URL::createLink('default', 'index', 'index');
    $linkProfile = URL::createLink('backend', 'index', 'profile');
    $userInfo	= Session::get('user');
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul> 
    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        
        <a href="<?=$linkFrontend?>" target="blank" title="View page frontend" style="margin:auto; " >
            <i class="far fa-eye " style="font-size: 25px; color:#ABABAB"></i>
        </a>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?=  $this->_pathImg?>default-user.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">Khánh</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-info">
                    <img src="<?= $this->_pathImg?>default-user.jpg" class="img-circle elevation-2" alt="User Image">

                    <p>Khánh <small><?=@$userInfo['info']['username']?></small></p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?=$linkProfile?>" class="btn btn-default btn-flat">Profile</a>
                    <a href="<?=$linkLogout?>" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>