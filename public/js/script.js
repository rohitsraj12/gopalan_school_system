$(document).ready(function() {
    $('.other-table').DataTable();

    // attendance 

    $(".attend").click(function(e){
        e.preventDefault();
        var btn = $(this).attr("data-attendance");
        // console.log(btn);
        $(this).parents('td').find('input').attr("value", btn);

        var inputVal = $(this).parents('td').find('input').val();
        
        // alert (inputVal);
        if(inputVal == "absent"){
            // $(this).toggleClass('btn-danger');
            $(this).parents('tr').removeClass('alert-info');
            $(this).parents('tr').addClass('text-danger');
            $(this).parents('tr').find(".status").addClass('alert-danger');
            $(this).parents('tr').find(".status").text('Absent');
            // alert('red');
        }else if(inputVal == "present"){
            $(this).parents('tr').removeClass('text-danger');
            $(this).parents('tr').addClass('text-dark');
            $(this).parents('tr').find(".status").removeClass('alert-danger');
            $(this).parents('tr').find(".status").text('Present');
        }
    });

});