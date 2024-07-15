<?php include 'inc/header.php'; ?>
<?php include 'inc/default_navbar.php'; ?>

<div class="container-fluid">
    <div class="row" style="padding:5px;">


        <div class="col-md-6">
            <div id="organization_data" style="max-width:800px;margin-left:auto;margin-right:auto;">
                <h3 class="card_heading">Name of the Online Event</h3>
                <hr class="heading_underline">
                    <p class="card_paragraph">
                        Organization Name, welcomes you, our esteemed client,<br> to a one of a kind online Event,<br>
                        <b style="text-align:center;color:green;">happening on Date Details Go Here.</b> 
                    </p> 
          
            </div>
        </div>


        <div class="col-md-6" style="margin-top:10px;">
            <div id="organization_data" style="max-width:800px;margin-left:auto;margin-right:auto;">
            <p class="card_paragraph">
                <h4 style="text-align:center;color:purple;">Book yourself a slot here.</h4>
            </p>
            <p class="card_paragraph"> 
                <small style="text-align:center;color:green;">Please provide the following information;</small>
            </p>
                
            <form id="booking_form" method="post">
                            <div class="form-group">
                                <div class="col-sm-10">

                                <label for="name" id="form_label" >Your Name</label>
                                    <input type="text" class="form-control" name="name" id="name" oninput="validate_eventname();" placeholder="Eg.John Mwangi" required>

                                    <!-- Error Message -->
                                    <small class="error_msg" id="name_event_error"></small>
                                </div>
                            </div>
                   
                            <div class="form-group">
                                <div class="col-sm-10">

                                <label for="phonenumber" id="form_label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" oninput="validate_eventphone();" placeholder="E.g 0712345678" required>
                                   
                                    <!-- Error Message -->
                                    <small class="error_msg" id="phone_event_error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                    <input type="hidden" class="form-control" name="status" id="status" value="Pending" readonly>

                                    <button type="submit" class="btn btn-sm" style="background-color:purple;color:white;outline:none;margin-top:10px;" name="event_booker" id="event_booker">Confirm Attendance</button>
                               
                            </div>
            </form>
              
            </div>
        </div>



    </div>
</div>

<script>
    // Validate Appointment Details


    // Validate Client's Name
    function validate_eventname() {
            var client_name = document.getElementById("name").value;

            if(client_name != ""){
                var regex = /^[a-zA-Z\s]+$/;
                if(regex.test(client_name) === false) {
                    document.getElementById("name_event_error").innerHTML = "Your name is wrongly spelt!!";
                    document.getElementById("event_booker").disabled = true;
                    }
                    else{
                        document.getElementById("name_event_error").innerHTML = " ";
                        document.getElementById("event_booker").disabled = false;
                    }
            }
            
        }

    // Validate Client's Phone
        function validate_eventphone() {
            var client_phone = document.getElementById("phone").value;

            if(client_phone != ""){
                var regex = /^\d{10}$/;
                if(regex.test(client_phone) === false) {
                    document.getElementById("phone_event_error").innerHTML = "This Phone Number is not Valid!!";
                    document.getElementById("event_booker").disabled = true;
                    }
                    else{
                        document.getElementById("phone_event_error").innerHTML = " ";
                        document.getElementById("event_booker").disabled = false;
                    }
            }
            
        }


    //Validate Appointment Details

</script>

<?php include 'inc/footer.php';?>
