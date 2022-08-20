$(document).ready(function (){
    // Delete Item
    $('.btn-delete').click(function (e) { 
        e.preventDefault();
        let choice = confirm("Xác nhận xoá!");
        if (choice == true) {
            window.location.href = $(this).attr('href');
        }
       
    });
    // Check all, Uncheck all
    $("#check-all").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $("#bulk-apply").click(function () {
        let url = $(this).data('url');
        let slbValue = $('#bulk-action').val();
        if(slbValue != 'default'){
            ckbLength = $('input[name="ckid[]"]:checked').length;
            if(ckbLength > 0){
                url = url.replace("value_new", slbValue);
                $('#form-table').attr('action', url);
                $('#form-table').submit;
            }
            else{
                alert ("Vui long chon it nhat 1 checkbox");
            }
        }else{
            alert ("Vui long chon action");
        }
    });
    
    var form = document.getElementById("admin-form");
    document.getElementById("submit-form").addEventListener("click", function () {
    form.submit();
    });

    
});