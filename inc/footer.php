<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/sweetalert.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>






<script>
    $(document).ready(function(){
        //$("#IntroductionModal").modal('show');

        setTimeout(function() {
            //$("#IntroductionModal").modal('show');
        }, 2000);
    });


    $('.input-group.date').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true,
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        startDate: new Date(),
        endDate: "12-12-2022",
    }); 
    
// Validate Client's Name
    function validate_name() {
        var client_name = document.getElementById("client_name").value;

        if(client_name != ""){
            var regex = /^[a-zA-Z\s]+$/;
            if(regex.test(client_name) === false) {
                 document.getElementById("name_error").innerHTML = "Name seems wrongly spelt!!";
                 document.getElementById("book_appointment").disabled = true;
                }
                else{
                    document.getElementById("name_error").innerHTML = " ";
                    document.getElementById("book_appointment").disabled = false;
                }
        }
        
    }

// Validate Client's Phone
    function validate_phone() {
        var client_phone = document.getElementById("client_phone").value;

        if(client_phone != ""){
            var regex = /^\d{10}$/;
            if(regex.test(client_phone) === false) {
                 document.getElementById("phone_error").innerHTML = "Ensure Phone Number is Valid!!";
                 document.getElementById("book_appointment").disabled = true;
                }
                else{
                    document.getElementById("phone_error").innerHTML = " ";
                    document.getElementById("book_appointment").disabled = false;
                }
        }
        
    }

// Validate Client's Appointment Day
    function validate_day() {
    var appointment_day = document.getElementById("appointment_day").value;

    if (appointment_day == "") {

        document.getElementById("day_error").innerHTML = "You have not selected an Appointment Day!!";
        document.getElementById("book_appointment").disabled = true;
    }
    else{
        document.getElementById("day_error").innerHTML = " ";
        document.getElementById("book_appointment").disabled = false;
    }

}


// Validate Client's Appointment Time
function validate_time() {
    var appointment_time = document.getElementById("appointment_time").value;

    if (appointment_time == "") {

        document.getElementById("time_error").innerHTML = "You have not selected an Appointment Time!!";
        document.getElementById("book_appointment").disabled = true;
    }
    else{
        document.getElementById("time_error").innerHTML = " ";
        document.getElementById("book_appointment").disabled = false;
    }

}

// Save Booking for Event

    $(document).ready(function() {
            $('#event_booker').click(function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var phone = $('#phone').val();
                var status = $('#status').val();
               
                
                if (name.length == 0 || phone.length == 0) {

                    swal({

                        text: "Ooops! You Left Out Something!!",
                        icon: "warning",
                        width: '200px',
                        timer: 3500
                    });
                    return false;

                } else {
                    $.ajax({
                        type: "POST",
                        url: "event_booker.php",
                        data: {
                            "name": name,
                            "phone": phone,
                            "status": status
                            
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);

                            if (dataResult.statusCode == 200) {
                                $('#booking_form')[0].reset();
                                
                               
                           
                            //window.location = "//localhost/dyta/make_payment";
                            

                                swal({
                                    text: "Event Ticket Successfully Booked !!",
                                    icon: "success",
                                    width: '200px',
                                    timer: 3000
                                });
                                
                                
                                window.setTimeout(function() {
                                        window.location = "//www.dytanutritionists.co.ke/make_payment";
                                    }, 5000);
                                
                                
                            } else if (dataResult.statusCode == 201) {
                                //$('#booking_form')[0].reset();
                            //window.location = "//localhost/dyta/verify_payment";
                                swal({
                                    text: "Event Ticket Already Booked!!",
                                    icon: "warning",
                                    width: '200px',
                                    timer: 3000
                                });
                                
                                window.setTimeout(function() {
                                        window.location = "//www.dytanutritionists.co.ke/verify_payment";
                                    }, 5000);
                                    
                                
                            } else if (dataResult.statusCode == 202) {
                                $('#booking_form')[0].reset();

                                swal({
                                    text: "Oops!!.Tickets already Sold Out!!",
                                    icon: "warning",
                                    width: '200px',
                                    timer: 3000
                                });
                                
                                window.setTimeout(function() {
                                        window.location = "//www.dytanutritionists.co.ke/index";
                                    }, 5000);

                            }

                        }
                    });
                }

            });
        });


// Save Booking for Event

// Verify Booking Payment for Event

    $(document).ready(function() {
            $('#verify_booking').click(function(e) {
                e.preventDefault();

                var phone = $('#phone').val();
                
                if (phone.length == 0) {

                    swal({
                        text: "Please Enter Your Mobile Number!!",
                        icon: "warning",
                        width: '200px',
                        timer: 3500
                    });
                    return false;

                } else {
                    $.ajax({
                        type: "POST",
                        url: "check_payment.php",
                        data: {
                            "phone": phone
                           
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);

                            if (dataResult.statusCode == 200) {
                                $('#payment_verification')[0].reset();
                            
                            //window.location = "//localhost/dyta/payment_success";
                            

                                swal({
                                    text: "Payment Successfully Verified !!",
                                    icon: "success",
                                    width: '200px',
                                    timer: 3000
                                });
                                
                                window.setTimeout(function() {
                                        window.location = "//www.dytanutritionists.co.ke/payment_success";
                                    }, 5000);

                                
                                
                            } else if (dataResult.statusCode == 201) {
                                //$('#payment_verification')[0].reset();
                    
                            //window.location = "//localhost/dyta/make_payment";
                                swal({
                                    text: "Kindly Ensure you have made a Payment!!",
                                    icon: "warning",
                                    width: '200px',
                                    timer: 3500
                                });
                                
                                 window.setTimeout(function() {
                                        window.location = "//www.dytanutritionists.co.ke/make_payment";
                                    }, 5000);
                                
                                

                            } 

                        }
                    });
                }

            });
        });


// Verify Booking Payment for Event



    

</script>




</body>
</html>