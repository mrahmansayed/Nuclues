<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="images/fav.png">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/line-icons.cs') }}s">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery.datepicker.min.css') }}">
    <!-- calander -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    @stack('css')

</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="panel-layout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-page">
                        @include('nuclues.sidebar')
                        <!-- side header -->
                          @include('nuclues::backend.layouts.partials.topbar')
                        <div class="main-content">
                           @include('nuclues::backend.layouts.partials.responsive_header')
                            <!-- responsive header -->
                          @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side-panel">
            <h4 class="panel-title">General Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>use night mode</span>
                    <input type="checkbox" id="nightmode1"/> 
                    <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notifications</span>
                    <input type="checkbox" id="switch22" /> 
                    <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notification sound</span>
                    <input type="checkbox" id="switch33" /> 
                    <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>My profile</span>
                    <input type="checkbox" id="switch44" /> 
                    <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show profile</span>
                    <input type="checkbox" id="switch55" /> 
                    <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
            <h4 class="panel-title">Account Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>Sub users</span>
                    <input type="checkbox" id="switch66" /> 
                    <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>personal account</span>
                    <input type="checkbox" id="switch77" /> 
                    <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Business account</span>
                    <input type="checkbox" id="switch88" /> 
                    <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show me online</span>
                    <input type="checkbox" id="switch99" /> 
                    <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Delete history</span>
                    <input type="checkbox" id="switch101" /> 
                    <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Expose author name</span>
                    <input type="checkbox" id="switch111" /> 
                    <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
        </div><!-- side panel -->
    <script src="{{ asset('backend/js/jquery.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom2.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    @stack('js')
    <!-- scripts -->
</body>


</html>