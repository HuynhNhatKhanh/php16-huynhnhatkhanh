<?php
        

        $params = $this->params;
        $data   = $this->data;

        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $linkIndex = URL::createLink($params['module'], 'dashboard', 'index');

        $lblFullname   = FormBackend::label('fullname', 'Fullname', false);
        $inputFullname = FormBackend::wrap('',FormBackend::input( 'text', 'form[fullname]', 'form[fullname]', @$data['fullname']));
        $rowFullname   = FormBackend::row($lblFullname, $inputFullname);

        $lblUsername   = FormBackend::label('username', 'Username');
        $inputUsername = FormBackend::wrap('',FormBackend::input( 'text', 'form[username]', 'form[username]', @$data['username']));
        $rowUsername   = FormBackend::row($lblUsername, $inputUsername);

        // $lblPassword   = FormBackend::label('password', 'Password');
        // $inputPassword = FormBackend::wrap('',FormBackend::input( 'password', 'form[password]', 'form[password]', @$data['password']));
        // $rowPassword   = FormBackend::row($lblPassword, $inputPassword);

        $lblEmail   = FormBackend::label('email', 'Email');
        $inputEmail = FormBackend::wrap('',FormBackend::input( 'email', 'form[email]', 'form[email]', @$data['email']));
        $rowEmail   = FormBackend::row($lblEmail, $inputEmail);
    

    
        $inputId = '';
        if(isset($this->params['id'])){
            $inputId = FormBackend::input('hidden', 'form[id]', 'form[id]', $this->params['id']);
        }
    
        $errors = '';
        if(isset($this->errors)){
            $errors .= '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
                <ul class="list-unstyled mb-0">'.$this->errors.'</ul>
            </div>';
        }
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- <?=$errors ?> -->

        <div class="card card-info card-outline">
            <form action="" method="post" class="mb-0" id="admin-form">
                <div class="card-body">
                    <?=$inputId ?>
                    <?=$rowUsername.$rowEmail.$rowFullname?>

                </div>
                <div class="card-footer">
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <button class="btn btn-sm btn-success mr-1 submit-form" id="submit-form"> Save</button>
                        <a href="<?=$linkIndex?>" class="btn btn-sm btn-danger mr-1"> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->