<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title?>- Buying Online was so easy</title>
    

    <link href="{{ url('resources/assets/templates/shopsmp/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ url('resources/assets/templates/shopsmp/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />  
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('resources/assets/templates/shopsmp/images/favicon.png')}}">

    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="{{ url('resources/assets/templates/shopsmp/css/style4.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/templates/shopsmp/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/templates/shopsmp/css/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/templates/shopsmp/css/form.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/templates/shopsmp/css/bootstrapsocial.css')}}"/>
    <link rel="stylesheet" href="{{ url('resources/assets/templates/shopsmp/css/flexslider.css')}}" type="text/css" media="screen" />
    <!--//theme-style-->
    <script src="{{ url('resources/assets/templates/shopsmp/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('resources/assets/templates/shopsmp/js/smoke.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/templates/shopsmp/css/smoke.css')}}"/>
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class=" logo">
                    <a href="{{route('shopsmp.index.index')}}"><img src="{{ url('resources/assets/templates/shopsmp/images/m.png')}}" alt=""></a> 
                </div>
            </div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="col-sm-5 col-md-offset-2  header-login">
                    <ul >
                        @if(Auth::user()==null)
                        <li><a href="{{route('auth.login')}}">Login</a></li>
                        <li><a href="{{route('auth.register')}}">Register</a></li>
                        @endif
                        @if(Auth::user()!=null)
                        <li><a>Hi,</a></li>
                        <img src="{{url('storage/app/avatar/'.Auth::user()->avatar)}}" style="width:6%;height: 27px" alt="">
                        <li><a href="">{{Auth::user()->name}}</a></li>
                        <li style=""><a href="{{route('auth.publiclogout')}}">Logout</a></li>

                        @endif
                    </ul>
                </div>
                
                <div class="col-sm-5 header-social">        
                    <ul >
                        <li><a href="#"><i></i></a></li>
                        <li><a href="https://www.facebook.com/mai.vo.773124"><i class="ic1"></i></a></li>
                        <li><a href=""><i class="ic2"></i></a></li>
                        <li><a href="#"><i class="ic3"></i></a></li>
                        <li><a href="#"><i class="ic4"></i></a></li>
                    </ul>   
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="head-top">
                <div class="col-sm-9 col-md-9 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">

                        <!-- Brand and toggle get grouped for better mobile display -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li class="<?php if(Request::is('/')){echo 'active';}?>"><a class="color" href="{{route('shopsmp.index.index')}}">Home</a></li>
                                <li class="dropdown mega-dropdown 
                                @if(isset($slug2))
                                    @if(Request::is($slug2.'*'))
                                        {{'active'}}
                                    @endif
                                @endif
                           

                                ">

                                    <a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>               
                                    <div class="dropdown-menu mega-dropdown-menu">
                                        <div class="menu-top">
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Categories</h4>
                                                    <ul>
                                                        @foreach($arCats as $item)
                                                        <?php
                                                        $id=$item->id;
                                                        $slug_cat=str_slug($item->cat_name);
                                                        $url=route('shopsmp.product.cat',['slug_cat'=>$slug_cat,'id'=>$id]);
                                                        ?>
                                                        <li><a href="{{$url}}">{{ $item->cat_name }}</a></li>
                                                        @endforeach
                                                    </ul>   
                                                </div>                          
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Brands</h4>
                                                    <ul>
                                                         @foreach($arBrands as $item)
                                                        <?php
                                                        $id=$item->id;
                                                        $slug_brand=str_slug($item->brand_name);
                                                        $url=route('shopsmp.product.cat',['slug_brand'=>$slug_brand,'id'=>$id]);
                                                        ?>
                                                        <li><a href="{{$url}}">{{ $item->brand_name }}</a></li>
                                                         @endforeach
                                                    </ul>   
                                                </div>                          
                                            </div>
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <h4>Find a device?</h4>

                                                    <ul>
                                                        <li><a href="">Custom Search</a></li>
                                                    </ul>   

                                                </div>                          
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>                  
                                    </div>              
                                </li>
                                <li class="<?php if(Request::is('about.html')){echo 'active';}?>"" ><a class="color4" href="{{route('shopsmp.index.about')}}">About</a></li>
                                <li class="<?php if(Request::is('contact.html')){echo 'active';}?>"><a class="color6" href="{{route('shopsmp.index.contact')}}">Contact</a></li>
                             
                               
                           
                            </ul>
                            <div>
                                <form class="navbar-form"  role="search" method="GET" action="{{route('shopsmp.index.search')}}">
                                    {{ csrf_field() }}
                                    <div class="input-group searchgroup">
                                        <input type="text" class="form-control" id="searchkeyword" placeholder="Search" name="search" maxlength="20" autocomplete="off" value="">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                        <div class="ajaxsuggestsearch"></div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                </div>
              <!--   <div>
                    <h1 class="theh1" ></h1>
                </div> -->
                <div class="col-sm-1 col-md-1 search-right">
                    <div class="cart box_1">
                        <a href="{{route('shopsmp.order.indexcart')}}">
                            <h3> <div class="total">
                                <!-- <span class="simpleCart_total"></span> --></div>
                                <img src="{{url('resources/assets/templates/shopsmp/images/ca.png')}}" alt="" width="45px"/></h3>
                                <span id="cart_count" class="qty">{{Cart::count()}}</span>
                            </a>
                        </div>
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <div class="iconwrapper"><span class="dropdownicon glyphicon glyphicon-chevron-down togglenavon"></span>
                                </div>
                            </button>

                        </div> 
                        <div class="clearfix"> </div>   
                    </div>
                    <div class="clearfix"></div>
                </div>  
            </div>  
        </div>