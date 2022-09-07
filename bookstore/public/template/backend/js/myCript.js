$(document).ready(function (){
    // Delete Item
    $('.btn-delete').click(function (e) { 
        e.preventDefault();
        let choice = confirm("Xác nhận xoá!");
        if (choice == true) {
            //window.location.href = $(this).attr('href');
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Xoá dữ liệu thành công',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = $(this).attr('href');
            });
            
        }
       
    });
    // Check all, Uncheck all
    $("#check-all").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $('#filter_groupacp').on('change', function() {
        $('#form-filter-group-acp').submit();
        // $('#input-search').submit();
    });
    $('#select-group').on('change', function() {
        $('#group-acp').submit();
    });

    
    $("#bulk-apply").click(function () {
        let url = $(this).data('url');
        let slbValue = $('#bulk-action').val();
        if(slbValue != 'default'){
            ckbLength = $('input[name="ckid[]"]:checked').length;
            if(ckbLength > 0){
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Thay đổi trạng thái thành công',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    url = url.replace("value_new", slbValue);
                    $('#form-table').attr('action', url);
                    $('#form-table').submit();
                });
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Vui lòng chọn ít nhất 1 checkbox',
                  })
                //alert ("Vui long chon it nhat 1 checkbox");
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Vui lòng chọn action',
              })
              //alert ("Vui long chon action");
        }
    });

    $(document).on('click', '.btn-ajax-status', function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let td = $(this).parent();
        $.ajax({
            type: "GET",
            url: url,
            success: function(response){
                td.html(response);
                td.find('a.btn-ajax-status').notify("Success", {className: 'success', position: 'top-center'})
            }
        })
    });

    $(document).on('click', '.btn-ajax-group-acp', function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let td = $(this).parent();
        $.ajax({
            type: "GET",
            url: url,
            success: function(response){
                td.html(response);
                td.find('a.btn-ajax-group-acp').notify("Success", {className: 'success', position: 'top-center'})
            }
        })
    });
    
});