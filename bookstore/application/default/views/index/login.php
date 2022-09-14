<?php
    $linkRegister = URL::createLink('default', 'user', 'register');

    $lblEmail = FormBackend::label('email', 'Email', false, 'required');
    $inputEmail = FormBackend::input('email', 'form[email]', 'form[email]', null, 'form-control',);
    $rowEmail = FormBackend::row($lblEmail, $inputEmail, 'form-group');

    $lblPassword = FormBackend::label('password', 'Password', false, 'required');
    $inputPassword = FormBackend::input('password', 'form[password]', 'form[password]', null, 'form-control');
    $rowPassword = FormBackend::row($lblPassword, $inputPassword, 'form-group');

?>

<div class="breadcrumb-section">
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
</div>

<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Đăng nhập</h3>
                <?=@$this->errors?>
                <div class="theme-card">
                    <form action="" method="post" id="admin-form" class="theme-form">
                        <?=$rowEmail.$rowPassword?>
                        <!-- <div class="form-group">
                            <label for="email" class="required">Email</label>
                            <input type="email" id="form[email]" name="form[email]" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="required">Mật khẩu</label>
                            <input type="password" id="form[password]" name="form[password]" value="" class="form-control">
                        </div> -->
                        <input type="hidden" id="form[token]" name="form[token]" value="<?=time()?>">
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
                    <a href="<?=$linkRegister?>" class="btn btn-solid">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</section>