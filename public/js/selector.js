$(document).ready(function() {
    $('#car_model_id').append('<option value="" hidden>Choose make first</option>');
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
                        $('#car_model_id').append('<option value="" hidden>Select model</option>');
                        $.each(data, function(key, model){
                            key++;
                            $('select[name="car_model_id"]').append('<option value="'+ model.id +'">' + model.name+ '</option>');
                        });
                    }else{
                        $('#car_model_id').empty();
                    }
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }else{
            $('#car_model_id').empty();
            $('#car_model_id').append('<option value="" hidden>Choose make first</option>');
        }
    }).change();
});
