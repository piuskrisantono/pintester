<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            #header{
                height: 50px;
                background-color: lightgrey;
                display: block;

            }
            #logo{
                margin:10px;
                width: 30px;
                height: 30px;
                display: inline-block;
                float: left;
            }
            .search-all{
                padding: 15px;
                float: left;
                display: inline-block;
            }
            .search-bar{
                height:20px;
                width: 500px;
                border: none;
                float: left;
            }
            .profile{
                float: right;
                padding: 10px 10px 10px 0px;
                display: inline-block;
                color: grey
            }
            .menu{
                float: right;
                padding: 15px;
                display: inline-block;
                color: grey
            }
            .menu a{
                text-decoration: none;
                color: dimgrey;
                margin: 10px;
            }
            #profile-picture{
                float: left;
                width: 30px;
                height: 30px;
                display: inline-block;
                margin-right: 10px;
            }
            .profile p{
                float: left;
                display: inline-block;
                margin: 5px;
            }
        </style>
    </head>
    <body style="margin: 0px; padding: 0px;font-family: Arial; font-color: dimgrey;">
        <div id="header">

            <img id="logo" src="{{url('img/logo.png')}}" alt="">
            <div class="search-all">
                <input class="search-bar" type="text" >
                <input class="submit" type="submit" value="search">
            </div>
            <div class="profile">
                <img id="profile-picture" src="{{url('img/logo.png')}}" alt="">
                <p>Pius</p>
            </div>
            <div class="menu" style="">
                <a href="">Manage</a>
                <a href="" >View</a>
                <a href="">Cart</a>
                <a href="">My Post</a>

            </div>
        </div>

        @yield('content')
AWKWAK <br><br>
        <div class="footer" style="background-color: lightgrey; height: 35px;">
            <p style="text-align: center;margin: auto;">Copyright &copy 2018</p>
        </div>
    </body>
</html>
