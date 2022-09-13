<?php
    $linkHome = URL::createLink($this->params['module'], $this->params['controller'], 'index');
    $messageH1	= '';
    $messageH2	= '';
    $title = '';
	switch ($this->params['type']){
		case 'register-success':
			$messageH2	= 'Tài khoản của bạn đã được tạo thành công!';
            $title = 'Tạo tài khoản';
			break;
	}
?>

<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <!-- <h2 class="py-2">Không tìm thấy trang yêu cầu</h2> -->
                        <h2 class="py-2"><?=$title?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        <!-- <h1>404</h1>
                        <h2>Đường dẫn không hợp lệ</h2> -->
                        <h1><?=$messageH1?></h1>
                        <h2><?=$messageH2?></h2>
                        <a href="<?=$linkHome?>" class="btn btn-solid">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>