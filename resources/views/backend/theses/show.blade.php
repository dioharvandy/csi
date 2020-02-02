@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Tugas Akhir' => route('students.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {{-- {!! cui_toolbar_btn_delete(route('admin.students.destroy', [$student->id]), $student->id, 'icon-trash', 'Hapus Mahasiswa', 'Anda yakin akan menghapus mahasiswa ini?') !!}
    {!! cui_toolbar_btn(route('admin.students.edit', $student->id), 'icon-pencil', 'Edit Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.students.index'), 'icon-list', 'List Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection

@section('content')
    <div class="row">

        <div class="justify-content-center col-sm-8">  
            <div class="card">
                {{ html()->modelForm($theses) }}
                {{-- CARD HEADER--}}
                <div class="card-header">
                    <i class="fa fa-edit"></i> <strong>Detail Tugas Akhir</strong>
                </div>
                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.theses._detail')
                </div>
                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>
                {{ html()->closeModelForm() }}
            </div>
        </div>

        <div class="justify-content-center col-sm-4">  
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-chalkboard-teacher"></i> <strong>Theses Supervisor</strong>
                </div>
                <div class="card-body">
                    coming soon
                </div>
            </div>

            <br>

            <div class="card">
                    <div class="card-header">
                        <i class="fa fa-book"></i> <strong>Logbook</strong>
                    </div>
                    <div class="card-body">
                            <a class="btn btn-primary" href="{{route('student.ta_logbook.index', [$theses[0]->id])}}">Lihat Logbook</a>
                    </div>
                </div>

            <br>

            <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i> <strong>Seminar Proposal</strong>
                    </div>
                    <div class="card-body">
                            {{-- <a class="btn btn-primary" href="{{route('student.ta_logbook.index', [$theses[0]->id])}}">Lihat Logbook</a> --}}
                    </div>
                </div>
        </div>

    </div>

@endsection
