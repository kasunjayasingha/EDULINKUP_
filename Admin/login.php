<?php

include 'includes/header.php';
session_start();
include 'includes/connection.php';
?>
 <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form action="submitForm.php" method="post" class="user">
                                <div class="form-group">
                                    <input type="email" name="login_email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                       name="login_pass" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">

                                    </div>
                                </div>
                                <button type="submit" name="loginBtn" class="btn btn-primary btn-user btn-block">Login</button>


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<?php
include 'includes/scripts.php';
?>