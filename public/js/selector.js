$(document).ready(function() {
    $('#car_make_id').on('change', function() {
        var car_make_id = $(this).val();
        if(car_make_id) {
            $.ajax({
                url: '/getModel/'+car_make_id,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#car_model_id').empty();
                        $('#car_model_id').append('<option hidden>Choose model</option>');
                        $.each(data, function(key, model){
                            key++;
                            $('select[name="car_model_id"]').append('<option value="'+ key +'">' + model.name+ '</option>');
                        });
                    }else{
                        $('#car_model_id').empty();
                    }
                }
            });
        }else{
            $('#car_model_id').empty();
        }
    });
    $('#car_model_id').on('change', function() {
        var car_model_id = $(this).val();
        if(car_model_id) {
            $.ajax({
                url: '/getBody/'+car_model_id,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#car_body_type_id').empty();
                        $('#car_body_type_id').append('<option hidden>Choose body type</option>');
                        $.each(data, function(key, model){
                            key++;
                            $('select[name="car_body_type_id"]').append('<option value="'+ key +'">' + model.name+ '</option>');
                        });
                    }else{
                        $('#car_body_type_id').empty();
                    }
                }
            });
        }else{
            $('#car_body_type_id').empty();
        }
    });
});
