<?php
    $data = $this->data;


    $lblLink = Form::label('Link');
    $inputLink = Form::input('text', 'form[link]', $data['link'] ?? '');
    $rowLink =  Form::row($lblLink, $inputLink);

    $lblOrdering = Form::label('Ordering');
    $inputOrdering = Form::input('number', 'form[ordering]', $data['ordering'] ?? '');
    $rowOrdering =  Form::row($lblOrdering, $inputOrdering);

    $lblStatus = Form::label('Status');
    $arrSelected = [
        'default' => 'Select status',
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    $slbStatus = Form::select('form[status]', $arrSelected, $data['status'] ?? 'default');
    $rowStatus =  Form::row($lblStatus, $slbStatus);

    $inputId = '';
    if(isset($this->params['id'])){
        $inputId = Form::input('hidden', 'form[id]', $this->params['id']);
    }

?>

<form action="" method="post">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">ADD RSS</h4>
        </div>
        <div class="card-body">
            <?php echo @$this->errors ?>
            <?php echo $inputId ?>
            <?php echo $rowLink ?>
            <?php echo $rowStatus ?>
            <?php echo $rowOrdering ?>
        </div>
        <div class="card-footer">
            <input class="form-control" type="hidden" name="token" value="1611025715"> <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?module=backend&controller=rss&action=index" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>