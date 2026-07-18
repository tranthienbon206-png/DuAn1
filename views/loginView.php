<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-4">
                        Login
                    </h2>

                    <form>

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter email">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Enter password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <div>
                                <input type="checkbox">
                                Remember me
                            </div>

                            <a href="#">
                                Forgot password?
                            </a>

                        </div>

                        <button class="btn btn-dark w-100">
                            Login
                        </button>

                    </form>

                    <hr>

                    <p class="text-center">

                        Don't have an account?

                        <a href="register.html">
                            Register
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>