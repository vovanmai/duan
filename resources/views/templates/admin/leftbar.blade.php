 <!-- /. NAV TOP  -->
 <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
       
            <li class="">
                <a href="{{route('admin.index.index')}}" ><i class="fa fa-desktop "></i>Dashboard</a>
            </li>
            <li class="">
                <a href="{{route('admin.brand.index')}}" ><i class="fa fa-delicious "></i>Brands</a>
            </li>
            <li class="">
                <a href="{{route('admin.category.index')}}" ><i class="fa fa-cube "></i>Categories</a>
            </li>
               <li class="">
                <a href="{{route('admin.user.index')}}" ><i class="fa fa-group"></i>Users</a>
            </li>
            <li>
                <a class="collapseproduct" data-toggle="collapseOne" data-parent="#accordion" href="{{ route('admin.product.index')}}"><i class="fa fa-mobile-phone "></i>Products <span class="glyphicon" style="float:right;padding-top:8px;padding-right:10px"></span></a>
                <div id="collapseOne" class="panel-collapse collapse ">
                  <a href="" class=""><span class="glyphicon glyphicon glyphicon-th-list"></span>  All Product</a>
                 
                    <a href="" class="secondlevelnav "><span class="glyphicon glyphicon glyphicon-eye-open">1</span> </a>
                    
                 
                </div>
            </li>
             <li class="">
                <a href="{{route('admin.order.index')}}" ><i class="fa fa-file-o "></i>Orders <span class="badge"></span></a>
            </li>
          
            <li class="">
                <a href="" ><i class="fa fa-credit-card "></i>Payments</a>
            </li>
              <li class="">
                <a href="{{route('admin.themeoption.index')}}" ><i class="fa fa-gear "></i>Theme Option</a>
            </li>
          
            <li class="">
                <a href="{{route('admin.contact.index')}}"><i class="fa fa-envelope"></i>Contacts</a>
            </li>
            <li class="">
                <a href="" ><i class="fa fa-money "></i>Advertisements</a>
            </li>
            
    </ul>
</div>

</nav>
        <!-- /. NAV SIDE  -->