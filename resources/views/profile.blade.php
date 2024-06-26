<!DOCTYPE html>
<html lang="en">
<head>
     
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>CipherIT: Profile</title>
    @include('navbar')
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main2.css" rel="stylesheet" media="all">
    
    <style>
        .text-error {
            color: red;
        }

        .label {
            color: white;
            margin-right: 20px;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input--style-3 {
            flex: 1;
        }
    </style>
    
</head>

<body>
         
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">User Profile</h2>
                    @if (Auth::check())
                    <div class="input-group">
                        <label class="label">Name:</label>
                        <input class="input--style-3" type="text" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="input-group">
                        <label class="label">Email:</label>
                        <input class="input--style-3" type="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="input-group">
                        <label class="label">Birthday:</label>
                        <input class="input--style-3" type="text" value="{{ Auth::user()->birthday }}" disabled>
                    </div>
                    <div class="input-group">
                        <label class="label">Gender:</label>
                        <input class="input--style-3" type="text" value="{{ Auth::user()->gender }}" disabled>
                    </div>
                    <div class="input-group">
                        <label class="label">Phone:</label>
                        <input class="input--style-3" type="text" value="{{ Auth::user()->phone }}" disabled>
                    </div>
                    <div class="input-group">
                        <label class="label">Address:</label>
                        <input class="input--style-3" type="text" value="{{ Auth::user()->address }}" disabled>
                    </div>
                    @else
                    <p>Please sign in to view your profile.</p>
                    @endif
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
