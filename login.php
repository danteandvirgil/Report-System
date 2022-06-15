<?php include_once __DIR__ . "/includes/head-auth.php" ?>


<main class="content">
    <!-- Main Content -->
    <section class="my-form">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-6 col-xs-12 col-sm-12 login_form mx-auto">
                    <img width="300" style="margin-bottom: 40px;" src="img/logo1.jpeg?v1" alt="logo" class="logo-default">
                    <div class="card -p-3">
                        <div class="row pt-3">
                            <div class="three">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <!-- wrong credentials error -->
                        <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'wrong_credentials') { ?>
                            <div class="row">
                                <div class="alert alert-danger text-danger">
                                    <strong>!Error!</strong> Wrong credentials.
                                </div>
                            </div>
                        <?php }
                        unset($_SESSION['error']);
                        ?>
                        <div class="p-3">
                            <form action="api.php" method="POST" class="form-group">
                                <input type="hidden" name="login" value="1">
                                <div class="row">
                                    <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                                </div>
                                <div class="row">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                                </div>

                                <div class="row d-flex justify-content-center pb-2">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <p>Don't have an account? <a href="signup.php">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once __DIR__ . "/includes/footer.php" ?>