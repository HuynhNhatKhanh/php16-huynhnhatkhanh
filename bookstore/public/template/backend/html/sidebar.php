<?php
    $linkDashboard = URL::createLink('backend','dashboard', 'index');

    $linkGroupList = URL::createLink('backend','group', 'index');
    $linkGroupForm = URL::createLink('backend','group', 'form');

    $linkUserList = URL::createLink('backend','user', 'index');
    $linkUserForm = URL::createLink('backend','user', 'form'); 
    
    $linkCategoryList = URL::createLink('backend','category', 'index');
    $linkCategoryForm = URL::createLink('backend','category', 'form');

    $linkBookList = URL::createLink('backend','book', 'index');
    $linkBookForm = URL::createLink('backend','book', 'form');

    switch ($this->params['controller']) {
        case 'dashboard':
            $classDashboard = 'has-treeview menu-open';
            $activeDashboardController = 'active';
           
            break;
        case 'group':
            $classGroup = 'has-treeview menu-open';
            $activeGroupController = 'active';
            if($this->params['action'] == 'index'){
                $activeGroupIndex = 'active';
            }
            if($this->params['action'] == 'form'){
                $activeGroupForm = 'active';
            }
            break;
        case 'user':
            $classUser = 'has-treeview menu-open';
            $activeUserController = 'active';
            if($this->params['action'] == 'index'){
                $activeUserIndex = 'active';
            }
            if($this->params['action'] == 'form'){
                $activeUserForm = 'active';
            }
            break;
        case 'category':
            $classCategory = 'has-treeview menu-open';
            $activeCategoryController = 'active';
            if($this->params['action'] == 'index'){
                $activeCategoryIndex = 'active';
            }
            if($this->params['action'] == 'form'){
                $activeCategoryForm = 'active';
            }
            break;
        case 'book':
            $classBook = 'has-treeview menu-open';
            $activeBookController = 'active';
            if($this->params['action'] == 'index'){
                $activeBookIndex = 'active';
            }
            if($this->params['action'] == 'form'){
                $activeBookForm = 'active';
            }
            break;
    }
?>


<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= $this->_pathImg?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ZendVN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $this->_pathImg?>default-user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin ZendVN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=$linkDashboard?>" class="nav-link <?=$activeDashboardController?>" data-active="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?=$classGroup?>">
                    <a href="#" class="nav-link <?=$activeGroupController?>" data-active="category">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Group<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkGroupList?>" class="nav-link <?=$activeGroupIndex?>" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkGroupForm?>" class="nav-link <?=$activeGroupForm?>" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?=$classUser?>">
                    <a href="#" class="nav-link <?=$activeUserController?>" data-active="category">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkUserList?>" class="nav-link <?=$activeUserIndex?>" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkUserForm?>" class="nav-link <?=$activeUserForm?>" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?=$classCategory?>">
                    <a href="#" class="nav-link <?=$activeCategoryController?>" data-active="category">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>Category<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkCategoryList?>" class="nav-link <?=$activeCategoryIndex?>" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkCategoryForm?>" class="nav-link <?=$activeCategoryForm?>" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?=$classBook?>">
                    <a href="#" class="nav-link <?=$activeBookController?>" data-active="category">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Book<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkBookList?>" class="nav-link <?=$activeBookIndex?>" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkBookForm?>" class="nav-link <?=$activeBookForm?>" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>