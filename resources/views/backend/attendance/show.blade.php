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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Pertemuan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student) 
                                    <tr>
                                        <td class="text-center">
                                            {{ $student->std_name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $student->nim }}
                                        </td>
                                        <td class="text-center">    
                                            {{ $student->status }}           
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".absen">Absen</button>
                                            <div class="modal fade absen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <strong>{{Carbon\Carbon::now()->translatedformat('l, d-F-Y H:i')}}/{{$student->std_name}}</strong>
                                                    {!! Form::open(['method' => 'GET', 'url' => '/attendance/'.$student->id, 'class' => '', 'role' => 'submit'])  !!}
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Hadir</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Alfa</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline3">Sakit</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline4">Izin</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline5" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline5">Tanpa Keterangan</label>
                                                      </div>
                                                      <button type="submit" class="btn btn-primary btn-sm mb-1">Submit</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".edit">Edit</button>
                                            <div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <strong class="text-left"> Nama Mahasiswa : {{$student->std_name}}</strong>
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Aksi</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            {!! Form::open(['method' => 'GET', 'url' => '/attendance/'.$student->id, 'class' => '', 'role' => 'submit'])  !!}
                                                          <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{Carbon\Carbon::now()->translatedformat('l, d-F-Y H:i')}}</td>
                                                            <td><select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                    <option value="">Hadir</option>
                                                                    <option value="">Alfa</option>
                                                                    <option value="">Sakit</option>
                                                                    <option value="">Izin</option>
                                                                    <option value="">Tanpa Keterangan</option>
                                                                </select>
                                                            </td>
                                                            <td><button type="submit" class="btn btn-primary btn-sm mb-1">Submit</button></td>
                                                          </tr>
                                                          {!! Form::close() !!}
                                                          {!! Form::open(['method' => 'GET', 'url' => '/attendance/'.$student->id, 'class' => '', 'role' => 'submit'])  !!}
                                                          <tr>
                                                            <th scope="row">2</th>
                                                            <td>{{Carbon\Carbon::now()->translatedformat('l, d-F-Y H:i')}}</td>
                                                            <td><select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                    <option value="">Hadir</option>
                                                                    <option value="">Alfa</option>
                                                                    <option value="">Sakit</option>
                                                                    <option value="">Izin</option>
                                                                    <option value="">Tanpa Keterangan</option>
                                                                </select>
                                                            </td>
                                                            <td><button type="submit" class="btn btn-primary btn-sm mb-1">Submit</button></td>
                                                          </tr>
                                                          <tr>
                                                            {!! Form::open(['method' => 'GET', 'url' => '/attendance/'.$student->id, 'class' => '', 'role' => 'submit'])  !!}
                                                            {!! Form::close() !!}
                                                            <th scope="row">3</th>
                                                            <td>{{Carbon\Carbon::now()->translatedformat('l, d-F-Y H:i')}}</td>
                                                            <td><select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                    <option value="">Hadir</option>
                                                                    <option value="">Alfa</option>
                                                                    <option value="">Sakit</option>
                                                                    <option value="">Izin</option>
                                                                    <option value="">Tanpa Keterangan</option>
                                                                </select>
                                                        </td>
                                                            <td><button type="submit" class="btn btn-primary btn-sm mb-1">Submit</button></td>
                                                          </tr>
                                                          {!! Form::close() !!}
                                                        </tbody>
                                                      </table>
                                                </div>
                                            </div>
                                            </div>
                                            {{-- {!! cui_btn_edit(route('admin.students.edit', [$student->id])) !!}
                                            {!! cui_btn_delete(route('admin.students.destroy', [$student->id]), "Anda yakin akan menghapus data mahasiswa ini?") !!} --}}
                                        </td>
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
