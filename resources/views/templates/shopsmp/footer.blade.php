
    <!--brand-->
    <div class="brand">
       
        <div class="col-md-4 branditem">
            <a href="">
                <img src="{{url('storage/app/imagefiles/aaa.PNG')}}" class="img-responsive" alt="">
            </a>
        </div>
        
       
        <div class="clearfix"></div>
    </div>
    <!--//brand-->
</div>

</div>
<!--//content-->
<!--//footer-->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <a href="" class="ajaxcartmessage"></a>
            <div class="col-md-3 footer-middle-in">
                <a href="{{route('shopsmp.index.index')}}"><img style="width:50px;margin-right:-10px" src="{{ url('resources/assets/templates/shopsmp/images/favicon.png')}}" alt=""><img src="{{url('resources/assets/templates/shopsmp/images/log.png')}}" alt=""></a>
                <p>Best phone! Unbelievable!</br>
                    Sounds the best!</br> Unbelievable!</br>
                    Fast data transfer!</br>
                    All right!</p>
                </div>

                <div class="col-md-3 footer-middle-in">
                    <h6>Information</h6>
                    <ul class=" in">
                        <li><a href="{{route('shopsmp.index.about')}}">About</a></li>
                        <li><a href="{{route('shopsmp.index.contact')}}">Contact Us</a></li>
                        <li><a href="">Search</a></li>
                    </ul>
                    <ul class="in in1">
                        <li><a href="">Your Cart</a></li>
                     
                        <li><a href="{{route('auth.register')}}">Register</a></li>
                        <li><a href="{{route('auth.login')}}">Login</a></li>
                     
                        <li><a href="">Profile</a></li>
                       
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <div class="loading"><img src="{{url('resources/assets/templates/shopsmp/images/loading.gif')}}" alt="loading"></div>
                  <!--   <h6>Tags</h6>
                    <ul class="tag-in">
                      
                            <li><a href=""></a></li>
                      
                    </ul> -->
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Newsletter</h6>
                    <span>Sign up for News Letter</span>
                    <form>
                        <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                        <input type="submit" value="Subscribe"> 
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <ul class="footer-bottom-top social" style="color:#fff">
                    &copy; 2017 Smartphone LV Shop.
                </ul>
                <p class="footer-class">eCommerce Website Project - Coded by <a href="http://facebook.com/levienthuong" target="_blank">Võ Văn Mải</a></p>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{-- <script src="{{url('resources/assets/templates/shopsmp/js/simpleCart.min.js')}}"> </script> --}}
    <!-- slide -->
    <script src="{{url('resources/assets/templates/shopsmp/js/bootstrap.min.js')}}"></script>
    <!--light-box-files -->
    <script src="{{url('resources/assets/templates/shopsmp/js/jquery.chocolat.js')}}"></script>
    <link rel="stylesheet" href="{{url('resources/assets/templates/shopsmp/css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('a.picture').Chocolat();
        });
    </script>
    <script type="text/javascript" src="{{url('resources/assets/templates/shopsmp/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/assets/templates/shopsmp/js/number_format.js')}}"></script>
    <script src="{{url('resources/assets/templates/shopsmp/js/script.js')}}"></script>

</body>

</html>