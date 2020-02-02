<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="nav-icon icon-home"></i>Home
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Pengelolaan Sivitas</a>
                <ul class="nav-dropdown-items">

                    {{-- Menu Dosen--}}
                    <li class="nav-item">
                        @if( auth()->user()->type ==  3 )
                            <a class="nav-link" href="{{ route('admin.supervisor.index') }}">
                                <i class="nav-icon"></i> Dosen
                            </a>
                        @endif
                    </li>

                    {{-- Menu Mahasiswa --}}
                    <li class="nav-item">
                        @if ( auth()->user()->type == 2)     
                            <a class="nav-link" href="{{ route('students.index') }}">
                                <i class="nav-icon"></i> Mahasiswa
                            </a>
                        @endif
                    </li>

                    {{-- Menu Tendik --}}
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('admin.staffs.index') }}"> --}}
                            <i class="nav-icon"></i> Tendik
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>

</div>
