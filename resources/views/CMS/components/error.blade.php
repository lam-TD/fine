
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Lỗi </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

@include('CMS.script.header-script')

</head>
    <body>
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <style>
        html,
        body {
            height: 100%;
        }

        .page-box {
            min-height: 200px;
        }

        .page-box .server-message {
            padding: 35px 0;
        }

        </style>
        <style type="text/css">
        body {
            overflow: hidden;
        }

        </style>
        <script type="text/javascript" src="../../assets/widgets/wow/wow.js"></script>
        <script type="text/javascript">
        /* WOW animations */

        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();

        </script>
        <div class="center-vertical">
            <div class="center-content row">
                <div class="col-md-6 wow bounceInDown center-margin">
                    <div class="server-message">
                        <h2>Trang này không tồn tại</h2>
                        <h1>Error 404</h1>
                        <p>Vui lòng kiểm tra lại liên kết.</p>
                        <a href="{{ route('ADMIN_DASHBOARD') }}">Quay lại trang quản trị</a>
                    </div>
                </div>
            </div>
        </div>
    @include('CMS.script.footer-script')


    </body>
</html>