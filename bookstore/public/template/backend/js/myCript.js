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
    // $('#checkall:checkbox').change(function () {
    //     if($(this).attr("checked")) $('input:checkbox').attr('checked','checked');
    //     else $('input:checkbox').removeAttr('checked');
    // });

    
});