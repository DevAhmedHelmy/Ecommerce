function check_all(){
    $('input[class="item_check"]:checkbox').each(function(){
        if($('input[class="check_all"]:checkbox:checked').length == 0)
        {
            $(this).prop('checked', false);
        }else{
            $(this).prop('checked', true);
        }
    })
}


function deleteAll(){

    $(document).on('click', '.del_all', function(){
        $('#form_data').submit();
    });

    $(document).on('click', '.delBtn', function(){
        var item_checked = $('input[class="item_check"]:checkbox').filter(":checked").length;

         if(item_checked > 0)
         {

             $('.not_empty').removeClass('d-none');
             $('.record_count').text(item_checked);
             $('.empty_record').addClass('d-none');
         }else{
            $('.record_count').text('');
            $('.not_empty').addClass('d-none');
            $('.empty_record').removeClass('d-none');
         }
         $('#multiDelete').modal('show');

    });
}

