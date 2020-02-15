@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Tugas Akhir' => '#',
    ]) !!}
@endsection

@section('toolbar')
    {{-- {!! cui_toolbar_btn(route('admin.students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection

@section('content')

    <div class='container'>
    {{-- <a class='btn btn-primary' href="{{route('admin.student.create')}}">Tambahkan Permohonan TA</a>     --}}
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Tugas Akhir</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    <h1>Data Tugas Akhir belum dimasukkan</h1>
                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
