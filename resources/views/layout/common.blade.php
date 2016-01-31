<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type='text/x-icon' href="images/favicon.ico">
    <title>超狗惠生活</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index"><img src="images/logo.png"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav main-nav">
                        <li class="dropdown {{ Request::is('/') ? 'active' : '' }}">
                            <a href="index" onclick="location.href='index';" class="dropdown-toggle" data-toggle="dropdown" >首页
                            <!--<b class="caret"></b>-->
                            </a>
                           <!-- <ul class="dropdown-menu shouye">
                                <li><a href="./list?type=0">国内优惠</a></li>
                                <li class="divider"></li>
                                <li><a href="./list?type=1">海淘优惠</a></li>
                            </ul>-->
                        </li>
                        <li class = "{{ Request::is('rec') ? 'active' : '' }}">
                            <a href="./rec">每日精选</a>
                        </li>
                        <li class = "{{ Request::is('deals') ? 'active' : '' }}">
                            <a href="./deals">白菜价</a>
                        </li>
                        <li class = "{{ Request::is('discover') ? 'active' : '' }}">
                            <a href="./discover">发现</a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right navbar-searchform" role="search" action="search" method="post">
                        <div class="input-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control home-search" id="keyword" name="keyword" placeholder="搜索全网折扣">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>

    <!-- Begin page content -->
    <div class="container">
        @yield('content')
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.upvote.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        // CSRF token setup for jQuery
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxPrefilter(function(options, originalOptions, jqXHR){
            switch (options['type'].toLowerCase()) {
                case "post":
                case "delete":
                case "put":
                    // add leading ampersand if `data` is non-empty
                    if (options.data != '') {
                        options.data += '&';
                    }
                    // add _token entry
                    options.data += "_token=" + csrf_token;
                    break;
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.worth-btn').upvote();

        $('.worth').on('click', function (e) {
            e.preventDefault();
            var $button = $(this);
            var postId = $button.data('post-id');
            var value = $button.data('value');
            value ++;
            $(this).find('span').text(value);
            $.get('worth', {postId:postId, value:value}, function(data) {
                // success here
            }).fail(function() {
                alert("Something went wrong...");
            }, 'json');
        });
    </script>
    @yield('scripts')

    </body>
    </html>
