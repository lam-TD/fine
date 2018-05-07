
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> VietNamTour </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

@include('CMS.script.header-script')
</head>
    <body>
    <div id="sb-site">
        
        @include('CMS.layout.sidebar_overlay.overlay')
        @include('CMS.layout.sidebar_overlay.scrollable')
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                @include('CMS.layout.topbar.logo')
                @include('CMS.layout.topbar.header-profile-user')
                @include('CMS.layout.topbar.header-nav-right')
            </div>
        </div>
        <div id="page-sidebar">

                @include('CMS.layout.sidebar_overlay.menu-sidebar')
        </div>
        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                    @if(session()->has('message'))
                    <div class=" success row col-lg-12" >
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    </div>
                    @endif
                    <script >
                     $(document).ready(function () {          
                            setTimeout(function() {
                                $('.success').slideUp("slow");
                            }, 10000);
                    });
                    </script>
<!-- Sparklines charts -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
@include('CMS.script.footer-script')

</body>
</html>