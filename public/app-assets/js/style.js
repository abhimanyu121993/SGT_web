$(document).on('change',"#country",function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        var newurl = jQuery('meta[name="base-url"]').attr('content');
        $.ajax({
            url: newurl+'/general/'+'states-in-country',
            method: 'post',
            data:{
                'country_id':optionValue
            },
            beforeSend:function(){
                $('#state').html('<option selected hidden>Fetching.......</option>');
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