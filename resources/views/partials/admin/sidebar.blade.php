 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <span>Employee Management</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#SystemManagement"
                    aria-expanded="true" aria-controls="SystemManagement">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>System Management</span>
                </a>
                <div id="SystemManagement" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('country.index') }}">Country</a>
                        <a class="collapse-item" href="register.html">State</a>
                        <a class="collapse-item" href="forgot-password.html">Department</a>
                        <a class="collapse-item" href="register.html">City</a>

                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#UserManagement"
                    aria-expanded="true" aria-controls="UserManagement">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>User Management</span>
                </a>
                <div id="UserManagement" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.index') }}">User</a>
                        <a class="collapse-item" href="register.html">Role</a>
                        <a class="collapse-item" href="forgot-password.html">Permission</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->