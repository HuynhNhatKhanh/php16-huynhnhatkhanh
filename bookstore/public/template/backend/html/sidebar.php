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
?>


<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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
                    <a href="<?=$linkDashboard?>" class="nav-link" data-active="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active" data-active="category">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Group<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkGroupList?>" class="nav-link active" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkGroupForm?>" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkUserList?>" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkUserForm?>" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>Category<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkCategoryList?>" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkCategoryForm?>" class="nav-link" data-active="form">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Form</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-active="category">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Book<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=$linkBookList?>" class="nav-link" data-active="index">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=$linkBookForm?>" class="nav-link" data-active="form">
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