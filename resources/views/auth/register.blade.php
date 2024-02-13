<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register - Invoice Management</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    Invoice Management
                                </a>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create an account</p>
                                    </div>

                                    <form id="registrationForm" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="first_name" class="form-label">First Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" required>
                                            <div class="invalid-feedback">Please enter your first name.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">Last Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" required>
                                            <div class="invalid-feedback">Please enter your last name.</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email <span class="text-danger"> *</span></label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                            <div class="invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password <span class="text-danger"> *</span></label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <div class="invalid-feedback">Please enter a password.</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree to the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree to the terms and conditions.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                    </div>
                                </form>
                                


                                </div>
                            </div>
                            

                            <div class="text-center">
                                <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
                            </div>
                            <br/>

                            <div class="credits text-center">
                                Designed by <a href="https://www.linkedin.com/in/asim-pasha-25b222180/">Asim Pasha</a>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{ asset('assets/js/register.js') }}"></script>
</body>

</html>
