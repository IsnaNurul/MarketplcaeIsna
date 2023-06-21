<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commers</title>
    <link rel="stylesheet" href="{{ asset('/asset1/css/bootstrap.min.css') }}" />
    <script src="/asset1/js/bootstrap.bundle.js"></script>
    <style type="text/css">

        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }

        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
        height: 100%;
        }
        }

    </style>
    </head>
    <body id="body" class="bg-primary">
        <div class="container-fluid">
            <section class="vh-100">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-8 col-lg-7 col-xl-4">
                        {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" --}}
                        <img src="https://www.pngarts.com/files/1/E-Commerce-Concept-PNG-Image-Background.png"
                            class="img-fluid" alt="Sample image">
                        </div>
                        <div class="col-md-9 col-lg-7 col-xl-5 offset-xl-1 mt-4">
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="width: 30rem;">
                                {{-- <div class="card-body">
                                    <h1 class="text-center mb-5">Login</h1>
                                    <form method="post" action="/auth">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                                            placeholder="Enter a valid email address" />
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        </div>
                            
                                        <!-- Password input -->
                                        <div class="form-outline mb-3">
                                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                                            placeholder="Enter password" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                        </div>
                            
                                        <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">
                                            Remember me
                                            </label>
                                        </div>
                                        <a href="#!" class="text-body">Forgot password?</a>
                                        </div>
                            
                                        <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0 text-center">Don't have an account? <a href="/regist"
                                            class="link-danger">Register</a></p>
                                        </div>
                                    </form>
                                </div> --}}
                                {{-- <div class="card shadow-lg border-0 rounded-lg mt-5"> --}}
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-2">Login</h3>
                                </div>
                                    <div class="card-body">
                                        <form method="post" action="/auth">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="/#">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/regist">Need an account? Sign up!</a></div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
