$(document).ready(function() {
    $("#listForm").validate({
        rules: {
            car_make_id: {
                required:true,
                min: 1
            },
            car_model_id: {
                required:true,
                min: 1
            },
            car_body_type_id: {
                required:true,
                min: 1
            },
            description: {
                required:false,
            },
            fuel_type_id: {
                required:true,
                min: 1
            },
            cubic_capacity: {
                min: 100
            },
            battery_capacity: {
                min: 1
            },
            year: {
                required:true,
                min: 1
            },
            mileage: {
                required:true,
                number: true
            },
            vin: {
                symbols:17
            },
            price: {
                required:true,
                number: true
            },
            phone_number: {
                required:true,
                number: true
            },
            email: {
                email: true,
                maxlength: 50
            },
            'images[]': {
                required:true,
            },

        },
        messages: {
            email: {
                required: "Enter your email",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            car_make_id: {
                required: "Please select a car make",
                min: "Please select a car make"
            },
            car_model_id: {
                required:"Please select a model",
                min: "Please select a model",
            },
            car_body_type_id: {
                required:"Please select a body type",
                min: "Please select a body type"
            },
            fuel_type_id: {
                required:"Please select a fuel type",
                min: "Please select a fuel type"
            },
            cubic_capacity: {
                min: "Please enter a number larger or equal to 100"
            },
            battery_capacity: {
                min: "Please enter a number larger or equal to 1"
            },
            description: {
                required:false,
            },
            year: {
                required:"Please select a year",
                min: "Please select a year"
            },
            price: {
                required:"Please state the price",
                number: "The price must be a number"
            },
            phone_number: {
                required:"Please provide your phone number",
                number: "The phone number must only contain numbers"
            },
            'images[]': {
                required:"You must upload an image"
            },
        }
    });
    $("#listEditForm").validate({
        rules: {
            car_body_type_id: {
                required:true,
                min: 1
            },
            fuel_type_id: {
                required:true,
                min: 1
            },
            cubic_capacity: {
                min: 100
            },
            battery_capacity: {
                min: 1
            },
            description: {
                required:false,
            },
            year: {
                required:true,
                min: 1
            },
            price: {
                required:true,
                number: true
            },
            mileage: {
                required:true,
                number: true
            },
            vin: {
                symbols:17
            },
            phone_number: {
                required:true,
                number: true
            },
            email: {
                email: true,
                maxlength: 50
            }
        },
        messages: {
            email: {
                required: "Enter your email",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            car_make_id: {
                required: "Please select a car make",
                min: "Please select a car make"
            },
            car_model_id: {
                required:"Please select a model",
                min: "Please select a model",
            },
            car_body_type_id: {
                required:"Please select a body type",
                min: "Please select a body type"
            },
            description: {
                required:false,
            },
            fuel_type_id: {
                required:"Please select a fuel type",
                min: "Please select a fuel type"
            },
            cubic_capacity: {
                min: "Please enter a number larger or equal to 100"
            },
            battery_capacity: {
                min: "Please enter a number larger or equal to 1"
            },
            year: {
                required:"Please select a year",
                min: "Please select a year"
            },
            price: {
                required:"Please state the price",
                number: "The price must be a number"
            },
            phone_number: {
                required:"Please provide your phone number",
                number: "The phone number must only contain numbers"
            },
            'images[]': {
                required:"You must upload an image"
            },
        }
    });
});
