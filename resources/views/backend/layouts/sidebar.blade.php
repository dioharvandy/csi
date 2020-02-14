<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="nav-icon icon-home"></i>Home
                </a>
            </li>

            @if ( auth()->user()->type == 2)     
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Mahasiswa
                </a>
                    
                    {{-- Menu Mahasiswa --}}
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.index') }}">
                                <i class="nav-icon"></i> Tugas Akhir
                            </a>
                    </li>
                </ul>
            </li>
            @endif

            @if( auth()->user()->type ==  3 )
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Dosen
                </a>

                {{-- Menu Dosen --}}
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.supervisor.index') }}">
                                <i class="nav-icon"></i> TA Mahasiswa
                            </a>
                    </li>
                </ul>
            </li>
            @endif
                    
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>

</div>
