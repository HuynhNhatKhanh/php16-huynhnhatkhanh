<?php
    $data = $this->data;
	$inputUserName = FormBackend::input('text', 'form[username]', 'form[username]', @$data['username'], 'form-control');
	$lblUserName = FormBackend::label('username', 'Tên tài khoản', false, 'required');
	$rowUserName = FormBackend::row($lblUserName, $inputUserName, 'col-md-6');

	$inputFullname = FormBackend::input('text', 'form[fullname]', 'form[fullname]', @$data['fullname'], 'form-control');
	$lblFullname = FormBackend::label('fullname', 'Họ và tên', false, 'required');
	$rowFullname = FormBackend::row($lblFullname, $inputFullname, 'col-md-6');

	$inputEmail = FormBackend::input('email', 'forme[email]', 'form[email]', @$data['email'], 'form-control');
	$lblEmail = FormBackend::label('email', 'Email', false, 'required');
	$rowEmail = FormBackend::row($lblEmail, $inputEmail, 'col-md-6');

	$inputPassword = FormBackend::input('password', 'form[password]', 'form[password]', @$data['password'], 'form-control');
	$lblPassword = FormBackend::label('password', 'Mật khẩu', false, 'required');
	$rowPassword = FormBackend::row($lblPassword, $inputPassword, 'col-md-6');

    
?>

<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2 class="py-2">Đăng ký tài khoản</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        echo '<pre>';
        print_r($this->data);
        echo '</pre>';
      
    ?>
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Đăng ký tài khoản</h3>
                        <div  style="color: red;">
                            <?= @$this->errors?>
                        </div>
                    <div class="theme-card"> 
                        <form action="" method="post" id="admin-form" class="theme-form">
                            <div class="form-row">
							    <?=$rowUserName.$rowFullname.$rowEmail.$rowPassword?>
                                <!-- <div class="col-md-6">
                                    <label for="username" class="required">Tên tài khoản</label>
                                    <input type="text" id="form[username]" name="form[username]" value="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="fullname">Họ và tên</label>
                                    <input type="text" id="form[fullname]" name="form[fullname]" value="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" id="form[email]" name="form[email]" value="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="required">Mật khẩu</label>
                                    <input type="password" id="form[password]" name="form[password]" value="" class="form-control">
                                </div> -->
                            </div>
                            <!-- <input type="hidden" id="form[token]" name="form[token]" value="1599208957"> -->
                            <button type="submit" id="submit" name="submit" value="Tạo tài khoản" class="btn btn-solid">Tạo tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
