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

                <li><a href="appointmentbookings">Appointment Bookings</a></li>
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
                        <li><span href="">Dashboard</span></li>
                    </ul>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
                        <div>
                            <!-- Display No of Clients -->
                            <?php 
                                include 'classes/pdo_db.php';
                                $sql ="SELECT id from client_appointments";
                                $query2 = $conn -> prepare($sql);;
                                $query2->execute();
                                $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                $query=$query2->rowCount();
                            ?>
                            <div class="uk-card uk-card-default uk-card-body">
                                <span class="statistics-text">Appointment Bookings</span><br />
                                <span class="statistics-number">
                                    <?php echo htmlentities($query);?>
                                </span>
                            </div>
                        </div>
                        
                        <div>
                            
                            <!-- Display No of Event Bookings -->
                            <?php 
                                include 'classes/pdo_db.php';
                                $sql1 ="SELECT id from client_eventbookings";
                                $query3 = $conn -> prepare($sql1);;
                                $query3->execute();
                                $results=$query3->fetchAll(PDO::FETCH_OBJ);
                                $query=$query3->rowCount();
                            ?>
                            <div class="uk-card uk-card-default uk-card-body">
                                <span class="statistics-text">Event Bookings</span><br />
                                <span class="statistics-number">
                                    <?php echo htmlentities($query);?>
                                </span>
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

<!--Reload Page after every 5 minutes -->

<script language="javascript">
    setTimeout(function(){
       window.location.reload(1);
    }, 300000);
</script>

<!--Reload Page after every 5 minutes -->


<?php include 'includes/footer.php' ?>