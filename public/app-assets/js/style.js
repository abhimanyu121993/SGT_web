$(document).on('change',"#country",function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        var newurl = jQuery('meta[name="base-url"]').attr('content');
        $.ajax({
            url: newurl+'/general/'+'states-in-country',
            method: 'post',
            type:'post',
            data:{
                'country_id':optionValue
            },
            beforeSend:function(){
                $('#state').html('<option selected hidden>Fetching..State....</option>');
            },
            success: function(p) {
              
                    $("#state").html(p);
            }
        });
    });
}).change();

$(document).on('change',"#state",function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        var newurl = jQuery('meta[name="base-url"]').attr('content');
        $.ajax({
            url: newurl+'/general/'+'cities-in-state',
            method: 'post',
            type:'post',
            data:{
                'state_id':optionValue
            },
            beforeSend:function(){
                $('#city').html('<option selected hidden>Fetching.......</option>');
            },
            success: function(p) {
              
                    $("#city").html(p);
               
            }
        });
    });
}).change();

$(document).on('change',"#property_id",function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        var newurl = jQuery('meta[name="base-url"]').attr('content');
        $.ajax({
            url: newurl+'/customer/route/'+'checkpoint-in-property',
            method: 'post',
            type:'post',
            data:{
                '_token':$('meta[name="csrf_token"]').attr('content'),
                'property_id':optionValue
            },
            beforeSend:function(){
                $('#checkpoint_id').html('<option selected hidden>Fetching..Checkpoint....</option>');
            },
            success: function(p) {
              
                    $("#checkpoint_id").html(p);
               
            }
        });
    });
}).change();

$(document).on('change',"#property_route",function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        var newurl = jQuery('meta[name="base-url"]').attr('content');
        $.ajax({
            url: newurl+'/customer/property/routes-in-property',
            method: 'post',
            data:{
                '_token':$('meta[name="csrf_token"]').attr('content'),
                'property_id':optionValue
            },
            beforeSend:function(){
                $('#route').html('<option selected hidden>Fetching..Route....</option>');
            },
            success: function(p) {
                    $("#route").html(p);
            }
        });
    });
}).change();
