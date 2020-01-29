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
