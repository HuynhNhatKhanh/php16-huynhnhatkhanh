<?php
        $params = $this->params;
        $data   = $this->data;
        $linkIndex = URL::createLink($params['module'], $params['controller'], 'index');

        $lblFullname   = FormBackend::label('fullname', 'Fullname', false);
        $inputFullname = FormBackend::wrap('',FormBackend::input( 'text', 'form[fullname]', 'form[fullname]', @$data['fullname']));
        $rowFullname   = FormBackend::row($lblFullname, $inputFullname);

        $lblUsername   = FormBackend::label('username', 'Username');
        $inputUsername = FormBackend::wrap('',FormBackend::input( 'text', 'form[username]', 'form[username]', @$data['username']));
        $rowUsername   = FormBackend::row($lblUsername, $inputUsername);

        $lblPassword   = FormBackend::label('password', 'Password');
        $inputPassword = FormBackend::wrap('',FormBackend::input( 'password', 'form[password]', 'form[password]', @$data['password']));
        $rowPassword   = FormBackend::row($lblPassword, $inputPassword);

        $lblEmail   = FormBackend::label('email', 'Email');
        $inputEmail = FormBackend::wrap('',FormBackend::input( 'email', 'form[email]', 'form[email]', @$data['email']));
        $rowEmail   = FormBackend::row($lblEmail, $inputEmail);
    
        $lblStatus   = FormBackend::label('status', 'Status');
        $arrSelected = [
            'default'  => '- Select Status -',
            'active'   => 'Active',
            'inactive' => 'Inactive'
        ];
        $selectStatus = FormBackend::wrap(FormBackend::select('form[status]', 'form[status]', $arrSelected, $data['status'] ?? 'default'));
        $rowStatus    = FormBackend::row($lblStatus, $selectStatus);
    
        $lblGroupId = FormBackend::label('group_id', 'Group');
        $selectGroupId = FormBackend::wrap(FormBackend::select('form[group_id]', 'form[group_id]', $this->itemsGroup, $data['group_id'] ?? 'default'));
        $rowGroupId    = FormBackend::row($lblGroupId, $selectGroupId);
    
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

        <?=$errors ?>
        <!-- <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
            <ul class="list-unstyled mb-0">
                <li class="text-white"><b>Username:</b> Giá trị này không được rỗng!</li>
                <li class="text-white"><b>Email:</b> Email không hợp lệ!</li>
                <li class="text-white"><b>Group id:</b> Vui lòng chọn giá trị!</li>
                <li class="text-white"><b>Password:</b> Giá trị này không được rỗng!</li>
            </ul>
        </div> -->
        <div class="card card-info card-outline">
            <form action="" method="post" class="mb-0" id="admin-form">
                <div class="card-body">
                    <?=$inputId ?>
                    <?=$rowUsername.$rowPassword.$rowEmail.$rowFullname.$rowStatus.$rowGroupId?>
                    <!-- <div class="form-group row">
                        <label for="form[username]" class="col-sm-2 col-form-label text-sm-right required">Username</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" id="form[username]" name="form[username]" value="" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form[password]" class="col-sm-2 col-form-label text-sm-right required">Password</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" id="form[password]" name="form[password]" value="" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form[email]" class="col-sm-2 col-form-label text-sm-right required">Email</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" id="form[email]" name="form[email]" value="" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="form[fullname]" class="col-sm-2 col-form-label text-sm-right">Fullname</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" id="form[fullname]" name="form[fullname]" value="" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label text-sm-right required">Status</label>
                        <div class="col-xs-12 col-sm-8">
                            <select id="form[status]" name="form[status]" class="custom-select custom-select-sm">
                                <option value="default" selected=""> - Select Status - </option>
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="group_id" class="col-sm-2 col-form-label text-sm-right required">Group</label>
                        <div class="col-xs-12 col-sm-8">
                            <select id="form[group_id]" name="form[group_id]" class="custom-select custom-select-sm">
                                <option value="default">- Select Group -</option>
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Member</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="form[token]" name="form[token]" value="1597568129"> -->

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