@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('/'),
        'Attendance' => url('/attendance'),
        'Index' => '#'
    ]) !!}
@endsection


@section('toolbar')
<strong><i class="fa fa-list"></i> List Kehadiran</strong>
    {{-- {!! cui_toolbar_btn(route('students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-12 justify-content-end">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birthplace">Mata Kuliah:</label>
                                        {{ html()->text('mataKuliah', $attendance[0]->crs_name)->class('form-control-plaintext') }}
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birthday">Kode MatKul:</label>
                                        {{ html()->text('kodeMatKul', $attendance[0]->code)->class('form-control-plaintext') }}
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birthday">Dosen Pengampu:</label>
                                        {{ html()->text('dosenPengampu', $attendance[0]->lecname)->class('form-control-plaintext') }}
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birthday">Semester:</label>
                                        {{ html()->text('semester', $attendance[0]->semester)->class('form-control-plaintext') }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pertemuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::open(['method' => 'PATCH','url' => '/attendance/student', 
                                                                    'class' => 'form-horizontal', 'files' => true]) !!}
                                                    {{ Form::hidden('class_lecturer_id', $attendance[0]->clectr_id) }}
                                                    @include ('backend.attendance.create')
                            
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Edit
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Pertemuan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                              <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Tanggal</th>
                                                                <th scope="col">Edit</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php $a = 1; @endphp
                                                                @foreach($attendance as $att)
                                                              <tr>
                                                                <th scope="row">{{$a}}</th>
                                                                <td>{{$att->date}}</td>
                                                                <td>{!! cui_btn_edit(url('/attendance/edit/'. $att->id)) !!}</td>
                                                              </tr>
                                                              @php $a++; @endphp
                                                              @endforeach
                                                            </tbody>
                                                          </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ayam --}}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">NIM</th>
                                    @foreach($kolom as $att)
                                    <th class="text-center">{{$att}}</th>
                                    @endforeach 
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ayam as $a)
                                        <tr>
                                            <td class="text-center">{{$a['name']}}</td>
                                            <td class="text-center">{{$a['nim']}}</td>
                                            @foreach ($a['desc'] as $key => $item)
                                                @foreach ($a['desc'] as $i)
                                                    @if ($kolom[$key] == $i['date'])
                                                        <td class="text-center">{{config('central.attendance_student')[$item['status']]}}</td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                </div>
                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{-- {{ $students->links() }} --}}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
