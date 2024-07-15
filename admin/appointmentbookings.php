<?php 
//Deny all overcoming errors
error_reporting (E_ALL ^ E_NOTICE);
?>
<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<?php include 'includes/header.php' ?>
<div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar>
                    <div class="uk-navbar-left">
                        <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon ></a>
                        <a href="dashboard" class="uk-navbar-item uk-logo">
                            DyTa Nutritionists
                        </a>
                    </div>
                    <div class="uk-navbar-right uk-light">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active">
                                <a href="#"><?php echo $_SESSION['name']; ?> &nbsp;<span class="ion-ios-arrow-down"></span></a>
                                <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                                   <ul class="uk-nav uk-navbar-dropdown-nav">
                                      <!-- 
                                        <li class="uk-nav-header">Options</li>
                                       <li><a href="#">Edit Profile</a></li>
                                       <li class="uk-nav-header">Actions</li>
                                       <li><a href="#">Lock</a></li>
                                        -->
                                       <li><a href="./classes/logout_user.php">Logout</a></li>
                                   </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="sidebar" class="tm-sidebar-left uk-background-default">
            <center>
                <div class="user">
                    <img id="avatar" width="100" class="uk-border-circle" src="images/avatar.jpg" />
                    <div class="uk-margin-top"></div>
                    <div id="name" class="uk-text-truncate"><?php echo $_SESSION['name']; ?></div>
                    <span id="status" data-enabled="true" data-online-text="Online" data-away-text="Away" data-interval="10000" class="uk-margin-top uk-label uk-label-success"></span>
                </div>
                <br />
            </center>
            <ul class="uk-nav uk-nav-default">

                <li class="uk-nav-header">
                    Client Bookings
                </li>

                
                <li><a href="eventbookings">Event Bookings</a></li>
                <li><a href="#">Approved Bookings</a></li>
                <li><a href="#">Cancelled Bookings</a></li>
                
                
                <li class="uk-nav-header">
                    Payments
                </li>
                <li><a href="#">Online Payments</a></li>
                <li><a href="#">Inhouse Payments</a></li>
                

                
            </ul>
        </div>
        <div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> Dashboard</h1>
                    <p>
                        Welcome back, <?php echo $_SESSION['name']; ?>
                    </p>
                    <ul class="uk-breadcrumb">
                        <li><a href="dashboard">Home</a></li>
                        <li><span href="">Appointment Bookings</span></li>
                    </ul>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                        <div uk-section-large>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    Appointment Bookings<br>
                                    <button class="uk-margin-top uk-label uk-label-success"><a href="appointmentbookings" style="color:white;border:none;">Refresh Data</a></button>
                                    <form method="post">
                                        <input type="text" class="form-control-lg" style="float:right;" name="phonenumber" placeholder="Search Client Phone..." required><br>
                                        <input type="submit" class="btn btn-outline-primary take-btn" style="float: right;" value="Search" name="submit">
                                    </form>
                                </div>
                                <div class="uk-card-body">
                                    <table class="uk-table uk-table-striped">
                                        <thead>
                                            <tr>
                                                <th>No:</th>
                                                <th>Client Name</th>
                                                <th>Client Phone</th>
                                                <th>Appointment Day</th>
                                                <th>Appointment Session</th>
                                                <!-- <th>Action</th>  -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                            // add this at the start of the script
                                            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


                                                    include 'classes/db_conn.php';
                                                    if(!isset($_POST['submit'])){
                                                        $query = "SELECT * FROM client_appointments";
                                                            $data = mysqli_query($conn, $query) or die('error');
                                                            if(mysqli_num_rows($data) > 0){
                                                                $cnt=1;
                                                                while($row = mysqli_fetch_assoc($data)){
                                                                    
                                                                    $clientname = $row['client_name'];
                                                                    $phone = $row['client_phone'];
                                                                    $appointmentday = $row['appointment_day'];
                                                                    $appointmenttime = $row['appointment_time'];
                                                ?>
                                                <tr>
                                                        <td><?php echo htmlentities($cnt);?></td>
                                                        <td><?php echo htmlentities($clientname);?></td>
                                                        <td><?php echo htmlentities($phone);?></td>
                                                        <td><?php echo htmlentities($appointmentday);?></td>
                                                        <td><?php echo htmlentities($appointmenttime);?></td>
                                                    <!--    
                                                        <td>
                                                            <a href="update_clients?id=<?php echo htmlentities($phone);?>" style="font-size:11px;color:#fff;" class="btn btn-primary" >Update</a> 
                                                            
                                                        </td>
                                                    -->
                                                </tr>
                                                <?php
                                                                $cnt++;}
                                                            }
                                                            else{
                                                    ?>
                                                    <tr>
                                                                    
                                                                    <td colspan="6" style="text-align: center;"> No Clients Yet!!</td>
                                                                    
                                                    </tr>

                                                <?php
                                                                }
                                                        
                                                    }
                                                else{
                                                    $phone = $_POST['phonenumber'];

                                                        if($phone != ""){
                                                            $query = "SELECT * FROM client_appointments WHERE client_phone='$phone'";
                                                            $data = mysqli_query($conn, $query) or die('error');
                                                            if(mysqli_num_rows($data) > 0){
                                                                $cnt=1;
                                                                while($row = mysqli_fetch_assoc($data)){

                                                                    $clientname = $row['client_name'];
                                                                    $phone = $row['client_phone'];
                                                                    $appointmentday = $row['appointment_day'];
                                                                    $appointmenttime = $row['appointment_time'];
                                                ?>
                                                <tr>
                                                        <td><?php echo htmlentities($cnt);?></td>
                                                        <td><?php echo htmlentities($clientname);?></td>
                                                        <td><?php echo htmlentities($phone);?></td>
                                                        <td><?php echo htmlentities($appointmentday);?></td>
                                                        <td><?php echo htmlentities($appointmenttime);?></td>

                                                        <!--
                                                            <td>
                                                                <a href="update_clients?id=<?php echo htmlentities($phone);?>" style="font-size:11px;color:#fff;" class="" >Update</a> 
                                                                
                                                            </td>
                                                        -->
                                                </tr>
                                                <?php
                                                                $cnt++;}
                                                            }
                                                            else{
                                                    ?>
                                                    <tr>
                                                                    
                                                                    <td colspan="6" style="text-align: center;"> Client not Found !!</td>
                                                                    
                                                    </tr>

                                                <?php
                                                                }
                                                        }

                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>
</div>

<?php 
}else{
     header("Location: index");
     exit();
}
?>

<?php include 'includes/footer.php' ?>