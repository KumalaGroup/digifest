<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Panel - Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
    <script src="{{asset('admin/js/jquery.min.js')}}"> </script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"> </script>
    <style>
        html {
            zoom: 90%;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1><a href="javascript:void(0)">Admin</a></h1>
        <div class="login-bottom">
            <h2>Masuk</h2>
            <form>
                <div class=" col-md-12 login-do">
                    <div class="login-mail" style="margin-bottom: 15px;">
                        <input type="text" placeholder="Email" required="">
                        <i class="fa  fa-fw fa-envelope"></i>
                    </div>
                    <div class="login-mail">
                        <input type="password" placeholder="Password" required="">
                        <i class="fa fa-fw fa-lock"></i>
                    </div>
                    <label class="hvr-shutter-in-horizontal login-sub">
                        <input type="submit" value="Masuk">
                    </label>
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
    <!---->
    <div class="copy-right">
        <p>&copy;<script>
                document.write(new Date().getFullYear())
            </script> Kumala Group. All Rights Reserved | Develop by IT Kumala Group</p>
    </div>
    <!---->
    <!--scrolling js-->
    <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <!--//scrolling js-->
</body>

</html>