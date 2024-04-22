<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('profile') }}" class="brand-link">
        <span class="brand-text font-weight-light">Profile</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
                    <a href="{{ route('for-main') }}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->nama}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                        <a href="{{ route('mat-index') }}" class="nav-link">
                        <p>
                            Matkul
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    @if(Auth::user()->role === 'Prodi')
                        <a href="{{ route('pol-index') }}" class="nav-link">
                            <p>
                                Polling
                            </p>
                        </a>
                    @elseif(Auth::user()->role === 'Admin')
                        <a href="{{ route('admin-index') }}" class="nav-link"> <!-- Redirect to Admin index -->
                            <p>
                                Polling
                            </p>
                        </a>
                    @elseif(Auth::user()->role === 'Student')
                        <a href="{{ route('for-index') }}" class="nav-link"> <!-- Redirect to Student index -->
                            <p>
                                Polling
                            </p>
                        </a>
                    @endif
                </li>
                @if(Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('admin-index') }}" class="nav-link">
                            <p>
                                Akun
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">
                        <p>Logout</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
