<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('theme/img/profile_small.jpg')}}" />
                    <div class="mt-4">
                        <span class="text-white block m-t-xs font-bold"> {{Auth::user()->name}} </span>
                    </div>
                </div>
                <div class="logo-element">
                    <i class="fa fa-bars"></i>
                </div>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Product</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/product')}}">Product</a></li>
                    <li><a href="{{url('/dashboard/productcategory')}}">Product Category</a></li>
                    <li><a href="{{url('/dashboard/productstock')}}">Product Stock</a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Menu Member</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/product')}}">Product</a></li>
                    <li><a href="{{url('/dashboard/productcategory')}}">Product Category</a></li>
                    <li><a href="{{url('/dashboard/productstock')}}">Product Stock</a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Pemesanan</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/invoice')}}">Invoice</a></li>
                    <li><a href="{{url('/dashboard/productcategory')}}">Product Category</a></li>
                    <li><a href="{{url('/dashboard/productstock')}}">Product Stock</a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Presensi</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/product')}}">Product</a></li>
                    <li><a href="{{url('/dashboard/productcategory')}}">Product Category</a></li>
                    <li><a href="{{url('/dashboard/productstock')}}">Product Stock</a></li>
                </ul>
            </li>
            @role('superadmin')
            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">User</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/user/role')}}">Role</a></li>
                    <li><a href="{{url('/dashboard/user/users')}}">User</a></li>
                </ul>
            </li>
            @endrole
        </ul>

    </div>
</nav>
