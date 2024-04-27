<!DOCTYPE html>
<html lang="en">
<!-- Favicon -->
<link href="img/key.png" rel="icon">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>CipherIT:Sign Up</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Create An Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name">
                            @error('name')
                                <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Date of Birth" name="birthday">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            @error('birthday')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Address" name="address">
                            @error('address')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            @error('gender')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                            @error('email')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                            @error('password')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone" name="phone">
                            @error('phone')
                            <span class="text-error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--pill btn--green" type="submit" style="background-color: rgb(11, 169, 255);">Sign Up</button>
                        </div>
                        <div class="p-t-10">
                            <br>
                            <p style="text-align: left; color: white;"><a href="{{ route('login') }}" style="color: white;">Already have an account?</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
