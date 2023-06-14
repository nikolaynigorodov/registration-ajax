<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
            crossorigin="anonymous"></script>
    <title>Registration</title>
</head>
<body>
<h1 class="d-flex justify-content-center h1-registration">Registration</h1>

<div class="container">
    <div class="alert alert-success notify-registration d-none" role="alert">
        <b class="d-flex justify-content-center">You have successfully registered.</b>
        <br>
        <a class="btn btn-primary d-flex justify-content-center" href="/" role="button">Back to the New Registration</a>
    </div>
    <form id="registrationForm">
        <h6 class="text-center text-danger error-validation"></h6>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input name="first_name" type="text" class="form-control" id="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input name="last_name" type="text" class="form-control" id="lastName">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirm">Password Confirm</label>
            <input name="password_confirm" type="password" class="form-control" id="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary btn-register mt-3">Submit</button>
    </form>
</div>


<script src="/assets/js/registration.js"></script>
</body>
</html>