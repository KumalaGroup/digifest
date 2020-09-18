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

        .error {
            color: #d95459;
            font-weight: 300;
            padding-top: 5px;
            padding-left: 5px;
            margin: 0;
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1><a href="javascript:void(0)">Admin</a></h1>
        <div class="login-bottom">
            <h2>Masuk</h2>
            <form id="form">
                @csrf
                <div class=" col-md-12 login-do">
                    <div class="login-mail" style="margin-bottom: 15px;">
                        <i class="fa  fa-fw fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="login-mail">
                        <i class="fa fa-fw fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <label class="hvr-shutter-in-horizontal login-sub">
                        <input id="submit" type="submit" value="Masuk">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script>
        $('#submit').click(function(e) {
            e.preventDefault();
            var form = $('#form');
            var data = form.serialize();
            if ($('#form').valid())
                $.post(location, data,
                    function(data, textStatus, jqXHR) {
                        if (data.status == "success") location.reload();
                        else alert(data.msg);
                    }, "json");
        });
    </script>
</body>

</html>