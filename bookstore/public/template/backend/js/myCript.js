$(document).ready(function (){
    $('.btn-delete').click(function (e) { 
        e.preventDefault();
        let choice = confirm("Xác nhận xoá!");
        if (choice == true) {
            window.location.href = $(this).attr('href');
        }
       
    });
});