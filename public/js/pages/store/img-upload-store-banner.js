jQuery(function($){
    $('#upload_photo').on('shown.bs.modal', function (e) {
        var button = e.relatedTarget;
        var item_id = button.getAttribute('data-number');
        sessionStorage.setItem('image_id',item_id);
    });
    $('#upload_photo').on('hide.bs.modal', function (e) {
        sessionStorage.removeItem('image_id');
        $("#btn-change").trigger('click');
    });
    var image_crop = $("#cropper-image").croppie({
        enableExif: true,
        viewport:{
            width: 760, height: 152, type: 'square'
        },
        boundary: {
            width: 760, height: 210
        }
    });
    
    $("#image-selector").on('change', function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            image_crop.croppie('bind',{
                url: e.target.result
            }).then(function(){
                console.log("jQuery bind complete");
            })
        }
        reader.readAsDataURL(this.files[0]);
        $(".image-selection").addClass('d-none');
        $(".image-cropper").removeClass('d-none');
    });
    $("#btn-change").on('click',function(e){
        $(".image-selection").removeClass('d-none');
        $(".image-cropper").addClass('d-none');
    });
    $("#btn-done").on('click',function(e){
        $(this).addClass('loading');
        $(this).attr('disabled','true');
        var uploadUrl = $('input[name=upload]').val();
        var urlToken = $('input[name=_token]').val();

        image_crop.croppie('result',{
            type: 'canvas', 
            size: { width: 1500, height: 300 }
        }).then(function(response){
            $.ajax({
            url: uploadUrl,
            method: 'post',
            data: { _token: urlToken, file: response },
            success: function(data){
                    $("#btn-done").removeClass('loading').removeAttr('disabled');
                    if('id' in data && 'file' in data){
                        var imageNumber = 1;
                        $("#thumbnail-card-" + imageNumber).addClass('has-image');
                        $("#thumbnail-card-" + imageNumber + ' .img-container').html('<a class="btn btn-link btn-sm delete-image"><i class="fal fa-times fa-inverse"></i></a><img src="'+data.file_full+'" class="product-thumbnail" /><input type="hidden" name="images[]" value="'+data.id+'" />');
                        $("#btn-close-modal").trigger('click');
                        updateBanner(data.id);
                    }else{
                        alert('Error was ocurred, please try later');
                    }
            } 
            });
        })
    });
    
    $(document).on('click', 'a.delete-image',function(e){
        var imageContainer = $(this).parent();
        var card = imageContainer.parent();
        imageContainer.html('');
        card.removeClass('has-image');
    });
});
function updateBanner(bannerID){
    var urlToken = $('input[name=_token]').val();
    var bannerUpdateUrl = $('input[name=save_banner_url]').val();
    $.ajax({
        url: bannerUpdateUrl,
        method: 'post',
        dataType: 'json',
        data: { _token: urlToken, banner_id: bannerID },
        success: function(response){
            console.log(response);
            if(response){
                alert(response.msg);
            }
        } 
        });
}