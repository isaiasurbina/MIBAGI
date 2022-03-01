jQuery(function($){
    getBrands();
    getCategories();
    getVariations();
    $( ".categories-autocomplete-helper, .variations-autocomplete-helper").on('click', function(e){
        $(this).autocomplete('search', '');
    });
    $( ".brands-autocomplete-helper, .variations-autocomplete-helper").on('click', function(e){
        $(this).autocomplete('search', '');
    });
    $( ".btn-next").on('click', function(e){
        var target = $(this).attr('data-target');
        $("#" + target).trigger('click');
    });
    $(document).on('click', ".btn-add-new-option", function(e){
        var target = $(this).attr('data-target');
        var ElementTarget = $('.clone_me.' + target + ':last-child');
        var parent = ElementTarget.parent();
        var vtype = ElementTarget.attr('data-type');
        var newElement = $(ElementTarget).clone().appendTo(parent);
        var optionsCounter = $(".clone_me.variation_option").length;
        

        newElement.find('input.control-option-tag').attr('name','variation['+vtype+']['+optionsCounter+'][tag]');
        newElement.find('input.control-option-price').attr('name','variation['+vtype+']['+optionsCounter+'][price]');
        newElement.find('input').val('');
    });
    $(document).on('click', ".btn-remove-option", function(e){
        var target = $(this).attr('data-target');
        var ElementTarget = $('.clone_me.' + target + ':last-child');
        if(!ElementTarget.is(':first-child')){
            $(ElementTarget).remove();
        }
    });
    $(document).on('click', ".btn-remove-variation", function(e){
        var target = $(this).parents('.block-variation')[0];
        target.remove();
    });
    
    $( ".btn-add-variation").on('click', function(e){
        var vtype = $("#variations").val();
        /* var vtype = toKebabCase(vtypeText); */
        var optionIndex = ($(".clone_me.variation_option").length > 0) ? $(".clone_me.variation_option").length + 1:1;
        if(vtype != ''){
            var VariationBlock = '<div class="col-md-8 my-3 block-variation"><table class="table table-striped table-sm">';
            
            VariationBlock += '<thead class="thead-dark"><tr><th class="bg-primary">' + vtype + '</th><th class="bg-primary"><a href="javascript:void(0)" data-target="' + vtype + '" title="Agregar opción" class="text-white btn-add-new-option float-right"><i class="fal fa-plus-circle"></i></a><a href="javascript:void(0)" data-target="' + vtype + '" title="Quitar opción" class="text-white btn-remove-option float-right mx-2"><i class="fal fa-minus-circle"></i></a></th></tr>';
            VariationBlock += '<tr><th class="bg-primary">Etiqueta</th><th class="bg-primary">Precio</th></tr></thead>';
            VariationBlock += '<tr class="clone_me variation_option ' + vtype + '" data-type="'+vtype+'"><td><input type="text" class="form-control control-option-tag" name="variation['+vtype+']['+optionIndex+'][tag]" /></td>';
            VariationBlock += '<td><input type="number" class="form-control control-option-price" name="variation['+vtype+']['+optionIndex+'][price]" step="0.01" placeholder="0.00" /></td></tr>';
            VariationBlock += '<thead><tr><td colspan="2"><a href="javascript:void(0)" class="btn-remove-variation">Quitar</a></td></tr></thead>';
            VariationBlock += '</table></div>';
            $('#variations-container').append(VariationBlock);
            $("#variations").val('')
        }
    });

    
    function getCategories(){
        var categoriesURL = $('#categoriesURL').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            type:'post',
            url: categoriesURL,
            dataType: 'JSON',
            data: {'_token': token },
            success:function(data) {
                
                $( ".categories-autocomplete-helper" ).autocomplete({
                    source: data,
                    minLength: 0,
                    delay: 0,
                    select: function( event, ui ) {
                        tagID = ui.item.id;
                        tagName = ui.item.value;
                        var itemExists = $('.categories-container').find('button[data-id='+tagID+']');
                        ;
                        if(itemExists.length == 0){
                            $('.categories-container').append('<button data-id="'+tagID+'" type="button" class="btn btn-sm btn-outline-info tag-item">'+tagName+'<i class="fal fa-times"></i><input type="hidden" name="cats[]" value="'+tagID+'" /></button>');
                            $(this).val(''); return false;
                        }
                    },
                    response: function( event, ui ) {
                        var numResults = Object.keys(ui.content).length;
                        
                    }
                });
                $(document).on('click','button.btn.tag-item',function(e){
                    $(this).remove();
                });
            }
        });
    }
    function getBrands(){
        var categoriesURL = $('#brandsURL').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            type:'post',
            url: categoriesURL,
            dataType: 'JSON',
            data: {'_token': token },
            success:function(data) {
                
                $( ".brands-autocomplete-helper" ).autocomplete({
                    source: data,
                    minLength: 0,
                    delay: 0,
                    select: function( event, ui ) {
                        tagID = ui.item.id;
                        tagName = ui.item.value;
                        var itemExists = $('.brands-container').find('button[data-id='+tagID+']');
                        ;
                        if(itemExists.length == 0){
                            $('.brands-container').append('<button data-id="'+tagID+'" type="button" class="btn btn-sm btn-outline-info tag-item">'+tagName+'<i class="fal fa-times"></i><input type="hidden" name="brands[]" value="'+tagID+'" /></button>');
                            $(this).val(''); return false;
                        }
                    },
                    response: function( event, ui ) {
                        var numResults = Object.keys(ui.content).length;
                        
                    }
                });
                $(document).on('click','button.btn.tag-item',function(e){
                    $(this).remove();
                });
            }
        });
    }
    function getVariations(){
        var variationsURL = $('#variations_source').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            type:'post',
            url: variationsURL,
            dataType: 'JSON',
            data: {'_token': token },
            success:function(data) {
                
                $( ".variations-autocomplete-helper" ).autocomplete({
                    source: data,
                    minLength: 0,
                    delay: 0
                });
                
            }
        });
    }

    
    
});