jQuery(function($){
    $("#states").on('change', function(e){
        var sid = $("#states > option:selected").attr('data-id');
        var apiURL = $(this).attr('data-service');
        var _token = $('[name="_token"]').val();
        $.ajax({
            url: apiURL,
            type: 'get',
            dataType: 'json',
            data: { _token: _token, sid: sid },
            success: function(response){
                if(response){
                    $("#cities").removeAttr('disabled');
                    $("#cities > option:not(.no-replace)").remove();
                    $.each(response,function(index,value){
                        $('#cities').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            }
        })
    });
});