@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('/'),
        'Attendance' => url('/attendance'),
        'Index' => '#'
    ]) !!}
@endsection


@section('toolbar')
<strong><i class="fa fa-list"></i> List Mata Kuliah</strong>
    {{-- {!! cui_toolbar_btn(route('students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    {!! Form::open(['method' => 'GET', 'url' => '/attendance', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="form-row align-items-center">
                          <div class="col-auto">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <select name="semester" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                              @foreach($semester as $sems)
                              <option value="{{$sems->id}}">{{$sems->year}} @if($sems->period == 1)Ganjil @else Genap @endif</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Search</button>
                          </div>
                        </div>
                      {!! Form::close() !!}
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">Kode MatKul</th>
                            <th class="text-center">Dosen Pengampu</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($students as $student) --}}
                        @foreach($attendance as $att)
                            <tr>
                                <td class="text-center">
                                    {{ $att->crs_name}}
                                </td>
                                <td class="text-center">
                                    {{ $att->code}}
                                </td>
                                {{-- <td>{{ $student->name }}</td>
                                <td class="text-center">{{ $student->nim }}</td> --}}
                                <td class="text-center">
                                    {{ $att->lecname}}
                                    
                                    {{-- {!! cui_btn_edit(route('admin.students.edit', [$student->id])) !!}
                                    {!! cui_btn_delete(route('admin.students.destroy', [$student->id]), "Anda yakin akan menghapus data mahasiswa ini?") !!} --}}
                                </td>
                                <td class="text-center">
                                    {{ $att->semester}}
                                </td>
                                <td class="text-center">
                                    {!! cui_btn_view(url('/attendance/'. $att->id.'/show')) !!}
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
                                {{-- {{ $students->links() }} --}}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
