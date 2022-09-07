<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?>
</head>

<body>
    <div class="loader_skeleton">
        <div class="typography_section">
            <div class="typography-box">
                <div class="typo-content loader-typo">
                    <div class="pre-loader"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- header start -->
    <header class="my-header sticky">
        <div class="mobile-fix-option"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.html">
                                    <h2 class="mb-0" style="color: #5fcbc4">BookStore</h2>
                                </a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li><a href="index.html">Trang chủ</a></li>
                                        <li><a href="list.html">Sách</a></li>
                                        <li>
                                            <a href="category.html">Danh mục</a>
                                            <ul>
                                                <li><a href="list.html">Bà mẹ - Em bé</a></li>
                                                <li><a href="list.html">Chính Trị - Pháp Lý</a></li>
                                                <li><a href="list.html">Học Ngoại Ngữ</a></li>
                                                <li><a href="list.html">Công Nghệ Thông Tin</a></li>
                                                <li><a href="list.html">Giáo Khoa - Giáo Trình</a>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="top-header">
                                <ul class="header-dropdown">
                                    <li class="onhover-dropdown mobile-account">
                                        <img src="images/avatar.png" alt="avatar">
                                        <ul class="onhover-show-div">
                                            <li><a href="login.html">Đăng nhập</a></li>
                                            <li><a href="register.html">Đăng ký</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div>
                                                <img src="images/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-search" onclick="openSearch()"></i>
                                            </div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div>
                                                    <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form action="" method="GET">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="search" id="search-input"
                                                                                placeholder="Tìm kiếm sách...">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div>
                                                <a href="cart.html" id="cart" class="position-relative">
                                                    <img src="images/cart.png" class="img-fluid blur-up lazyload"
                                                        alt="cart">
                                                    <i class="ti-shopping-cart"></i>
                                                    <span class="badge badge-warning">0</span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <?php require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';?>


    <!-- <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">
                            Đăng nhập </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Đăng nhập</h3>
                    <div class="theme-card">
                        <form action="" method="post"
                            id="admin-form" class="theme-form">
                            <div class="form-group">
                                <label for="email" class="required">Email</label>
                                <input type="email" id="form[email]" name="form[email]" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="required">Mật khẩu</label>
                                <input type="password" id="form[password]" name="form[password]" value=""
                                    class="form-control">
                            </div>
                            <input type="hidden" id="form[token]" name="form[token]" value="1599208737">
                            <button type="submit" id="submit" name="submit" value="Đăng nhập" class="btn btn-solid">Đăng nhập</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>Khách hàng mới</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Đăng ký tài khoản</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                        <a href="register.html" class="btn btn-solid">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:0905744470" class="pps-btn-img" title="Liên hệ">
            <div class="phonering-alo-ph-img-circle"></div>
        </a>
    </div>

    <footer class="footer-light mt-5">
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>Giới thiệu</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo">
                                <h2 style="color: #5fcbc4">BookStore</h2>
                            </div>
                            <p>Tự hào là website bán sách trực tuyến lớn nhất Việt Nam, cung cấp đầy đủ các thể loại
                                sách, đặc biệt với những đầu sách độc quyền trong nước và quốc tế</p>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Danh mục nổi bật</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="list.html">Bà mẹ - Em bé</a></li>
                                    <li><a href="list.html">Học Ngoại Ngữ</a></li>
                                    <li><a href="list.html">Công Nghệ Thông Tin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Chính sách</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">Điều khoản sử dụng</a></li>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                    <li><a href="#">Hợp tác phát hành</a></li>
                                    <li><a href="#">Phương thức vận chuyển</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>Thông tin</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-phone"></i>Hotline 1: <a href="tel:0905744470">090 5744 470</a>
                                    </li>
                                    <li><i class="fa fa-phone"></i>Hotline 2: <a href="tel:0383308983">0383 308 983</a>
                                    </li>
                                    <li><i class="fa fa-envelope-o"></i>Email: <a href="mailto:training@zend.vn"
                                            class="text-lowercase">training@zend.vn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2020 ZendVN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- footer end -->

    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->

    <?php echo $this->_jsFiles;?> 
    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
            document.getElementById("search-input").focus();
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
</body>

</html>