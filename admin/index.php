<?php include 'includes/header.php' ?>

        <div uk-sticky="media: 960" class="uk-navbar-container tm-navbar-container uk-sticky uk-active" style="position: fixed; top: 0px; width: 1903px;">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar>
                    <div class="uk-navbar-left">
                        <a href="#" class="uk-navbar-item uk-logo">
                            DyTa Nutritionists
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-background">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <center>
                                        <h2>Admin Login</h2><br />
                                    </center>
                                    <?php if (isset($_GET['success'])) { ?>
                                        <p class="success"><?php echo $_GET['success']; ?></p>
                                    <?php } ?>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p class="error"><?php echo $_GET['error']; ?></p>
                                    <?php } ?>
                                    <form action="classes/login_user.php" method="post">
                                        <fieldset class="uk-fieldset">

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-android-person"></span>
                                                    <input name="uname" class="uk-input" type="email" placeholder="Enter Username">
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-locked"></span>
                                                    <input name="password" class="uk-input" type="password" placeholder="Enter Password">
                                                </div>
                                            </div>
                                            <!--
                                                <div class="uk-margin">
                                                    <a href="#">Forgot your password?</a>
                                                </div>
                                            -->

                                            <div class="uk-margin">
                                                <button type="submit" class="uk-button uk-button-primary">
                                                    <span class="ion-forward"></span>&nbsp; Login
                                                </button>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'includes/footer.php' ?>