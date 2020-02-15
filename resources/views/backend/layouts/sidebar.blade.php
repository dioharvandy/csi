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

            {{-- Menu Mahasiswa --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ta.index') }}">
                    <i class="nav-icon"></i> Mahasiswa
                </a>
            </li>
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
                {{-- Menu Tugas Akhir --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.theses.index') }}">
                        <i class="nav-icon"></i> Tugas Akhir
                    </a>
                </li>

            @endif

        </ul>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logbook.index') }}">
                <i class="nav-icon icon-speedometer"></i>Log Tugas Akhir
            </a>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-people"></i> Pengelolaan Kehadiran</a>
            <ul class="nav-dropdown-items">

                {{-- Menu Kehadiran--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.attendance.index') }}">
                        <i class="nav-icon"></i>Kelas
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/thesis_seminar') }}">
                <i class="nav-icon fas fa-laptop"></i> Pengelolaan Semhas</a>
        </li>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>

</div>
