@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('/home'),
        'Thesis Seminar' => url('/thesis_seminar'),
        'Add Seminar' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(url('/thesis_seminar'), 'icon-list', 'Daftar Semhas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['route' => 'admin.semhas.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Pengajuan Semhas
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.thesis_seminar._form')
                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
