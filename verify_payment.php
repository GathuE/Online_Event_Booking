<?php include 'inc/header.php'; ?>
<?php include 'inc/default_navbar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div id="organization_data" style="max-width:600px;margin-left:auto;margin-right:auto;">
                <h3 class="card_heading">Verify Payment</h3>
                <hr class="heading_underline">
                    <p class="card_paragraph" style="color:green;">
                            Would you like to verify if we received your payment?
                    </p>
                    <p class="card_paragraph" style="color:purple;text-align:center;">
                       NB: Payment Confirmation from our end may take upto 2hrs after Payment has been received.
                    </p>

                    <form id="payment_verification" method="post">
                            <div class="form-group">
                                <div class="col-sm-10">
                                <label for="phonenumber" id="form_label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" oninput="validate_userphone();" placeholder="E.g 0712345678" required>
                                    <!-- Error Message -->
                                    <small class="error_msg" id="phone_event_error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-sm" style="background-color:purple;color:white;outline:none;margin-top:10px;margin-left:auto;margin-right:auto;" name="verify_booking" id="verify_booking">Verify Payment</button>
                            </div>
                    </form>

            </div>
        </div>
    </div>
</div>

<script>

    // Validate Client's Phone
    function validate_userphone() {
            var client_phone = document.getElementById("phone").value;

            if(client_phone != ""){
                var regex = /^\d{10}$/;
                if(regex.test(client_phone) === false) {
                    document.getElementById("phone_event_error").innerHTML = "This Phone Number is not Valid!!";
                    document.getElementById("verify_booking").disabled = true;
                    }
                    else{
                        document.getElementById("phone_event_error").innerHTML = " ";
                        document.getElementById("verify_booking").disabled = false;
                    }
            }
            
        }

    // Validate Client's Phone
</script>


<?php include 'inc/footer.php';?>