@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Tugas Akhir' => '#',
    ]) !!}
@endsection

@section('toolbar')
    {{-- {!! cui_toolbar_btn(route('home'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list "></i> List Pengajuan Tugas Akhir</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{-- {{ $students->links() }} --}}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                {{--  <th class="text-center">Posisi yang diajukan</th>  --}}
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">NIM Mahasiswa</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisors as $supervisor)
                            <tr>
                                {{--  <td class="text-center">{{$supervisor->position}}</td>  --}}
                                <td class="text-center">{{$supervisor->student_name}}</td>
                                <td class="text-center">{{$supervisor->student_nim}}</td>
                                <td class="text-center">{{$supervisor->title}}</td>
                                <td class="text-center">
                                    @foreach ($t_statuses as $key => $val)                                           
                                        @if ($key == $supervisor->thesis_status)
                                            {{ $val }}
                                        @endif
                                    @endforeach    
                                </td>                              
                                <td class="text-center">
                                    <a href="{{route('students.theses.show', [$supervisor->thesis_id] )}}" class="btn btn-primary">Detail</a>
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                        {!! Form::open(['model' => 'POST', 'route' => ['admin.supervisor.accepted', $supervisor->thesis_id] ]) !!}
                                            <button type="submit" onclick="confirmed()"  class="btn btn-sm btn-outline-info" >
                                                    <i class="fa fa-thumbs-up"></i>
                                            </button>
                                        {!! Form::close() !!}   

                                        {!! Form::open(['model' => 'POST', 'route' => ['admin.supervisor.rejected', $supervisor->thesis_id] ]) !!}
                                            <button type="submit" onclick="confirmed()"  class="btn btn-sm btn-outline-danger" >
                                                    <i class="fa fa-thumbs-down"></i>
                                            </button>
                                        {!! Form::close() !!}   
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $supervisors->links() }}
                            </div>
                        </div>
                    </div>
                    
                </div><!--card-body-->
            </div><!--card-->

            <div class="card">
                {{-- CARD HEADER --}}
                <div class="card-header">
                        <strong><i class="fa fa-list "></i> List Tugas Akhir yang Diterima</strong>
                </div><!--card-header-->

                {{-- CARD BODY --}}
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                {{--  <th class="text-center">Posisi yang diajukan</th>  --}}
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">NIM Mahasiswa</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accepts as $accept)
                            <tr>
                                {{--  <td class="text-center">{{$accept->position}}</td>  --}}
                                <td class="text-center">{{$accept->student_name}}</td>
                                <td class="text-center">{{$accept->student_nim}}</td>
                                <td class="text-center">{{$accept->title}}</td>
                                <td class="text-center">
                                    @foreach ($t_statuses as $key => $val)                                           
                                        @if ($key == $accept->thesis_status)
                                            {{ $val }}
                                        @endif
                                    @endforeach
                                </td>                              
                                <td class="text-center">
                                    <a href="{{route('admin.supervisor.theses.show', [$accept->thesis_id] )}}" class="btn btn-primary">Detail</a>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $accepts->links() }}
                            </div>
                        </div>
                    </div>
                </div><!--card-body-->

            </div><!--card-->

        </div><!--col-->
    </div><!--row-->
@endsection

@section('javascript')
    <script type="text/javascript">

        function confirmed() {
            if(confirm("Apakah Anda Yakin ?")==true){
                return true;
            }else{
                event.preventDefault();
            }
        }

    </script>
@endsection
