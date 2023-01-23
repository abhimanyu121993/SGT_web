$("#country").change(function() {
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        // alert(optionValue);
        // var newurl = {{ route('get-states') }};
        // alert(newurl);
        $.ajax({
            url: newurl,
            method: 'get',
            beforeSend:function(){
                $('#state').html('<option selected hidden>Fetching.......</option>');
            },
            success: function(p) {
                console.log(p);
                if(p.status == 200){
                    $("#state").html(p.states);
                }
            }
        });
    });
}).change();
