<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
                        <li class="dropdown active">
                            <a href="index" onclick="location.href='index';" class="dropdown-toggle" data-toggle="dropdown" >首页 <b class="caret"></b></a>
                            <ul class="dropdown-menu shouye">
                                <li><a href="./list?type=0">国内优惠</a></li>
                                <li class="divider"></li>
                                <li><a href="./list?type=1">海淘优惠</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="./rec">每日精选</a>
                        </li>
                        <li>
                            <a href="./deals">白菜价</a>
                        </li>
                        <li>
                            <a href="./discover">发现</a>
                        </li>
                    </ul>
                    <!--
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">爆料</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">登录<b class="caret"></b></a>
                            <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox"> Remember me</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-block">登录</button>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger btn-block">注册</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                                    <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                                </li>
                            </ul>
                        </li>
                    </ul>
                -->
                    <form class="navbar-form navbar-right navbar-searchform" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
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
    <!-- Page Content -->
