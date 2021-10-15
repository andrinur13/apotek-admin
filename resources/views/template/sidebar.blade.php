<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="img/profile_small.jpg" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">David Williams</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
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
            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">User</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/dashboard/user/role')}}">Role</a></li>
                    <li><a href="{{url('/dashboard/user/users')}}">User</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
