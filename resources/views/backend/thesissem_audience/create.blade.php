@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Semhas' => route('admin.semhas.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pesertasemhas.index',[$id]), 'icon-list', 'List Peserta Semhas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                {{ Form::open(['route' => 'admin.pesertasemhas.store', 'method' => 'post']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Data Peserta Semhas
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.pesertasemhas._form')
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
