<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Thank You!</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/pages/coming-soon/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
</head>
<body class="coming-soon">    

    <div class="coming-soon-container">
        <div class="coming-soon-cont">
            <div class="coming-soon-wrap">
                <div class="coming-soon-container">
                    <div class="coming-soon-content">

                        <h4 class="">Thank you for taking the time to complete this form submission.</h4>

                        <p class="terms-conditions">&copy; {{date('Y')}} All Rights Reserved.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="coming-soon-image">
            <div class="l-image">
                <div class="img-content">
                    <img src="{{asset('storage/img/mindset.svg')}}" alt="coming_soon">
                </div>
            </div>
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/pages/coming-soon/coming-soon.js')}}"></script>

</body>
</html>