<?php
    $params = $this->params;
    $data   = $this->data;
    $linkIndex = URL::createLink($params['module'], $params['controller'], 'index');
    $lblName   = FormBackend::label('name', 'Name', true);
    $inputName = FormBackend::wrap('',FormBackend::input( 'text', 'form[name]', 'form[name]', @$data['name']));
    $rowName   = FormBackend::row($lblName, $inputName);

    $lblStatus   = FormBackend::label('status', 'Status');
    $arrSelected = [
        'default'  => '- Select Status -',
        'active'   => 'Active',
        'inactive' => 'Inactive'
    ];
    $selectStatus = FormBackend::wrap(FormBackend::select('form[status]', 'form[status]', $arrSelected, $data['status'] ?? 'default'));
    $rowStatus    = FormBackend::row($lblStatus, $selectStatus);

    $lblGroupAcp = FormBackend::label('group_acp', 'GroupAcp');
    $arrSelected = [
        'default' => '- Select GroupAcp -',
        'yes'     => 'Yes',
        'no'      => 'No'
    ];
    $selectGroupAcp = FormBackend::wrap(FormBackend::select('form[group_acp]', 'form[group_acp]', $arrSelected, $data['group_acp'] ?? 'default'));
    $rowGroupAcp    = FormBackend::row($lblGroupAcp, $selectGroupAcp);

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
        <div class="card card-info card-outline">
            <form action="" method="post" class="mb-0" id="admin-form">
                <div class="card-body">     
                        <?=$inputId ?>
                        <?=$rowName.$rowStatus.$rowGroupAcp; ?>             
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