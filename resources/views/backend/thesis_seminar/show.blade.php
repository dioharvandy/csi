@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Thesis Seminar' => url('/thesis_seminar'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
   
    {!! cui_toolbar_btn(url('/thesis_seminar'), 'icon-list', 'Daftar Semhas') !!}
    {!! cui_toolbar_btn(url('/thesis_seminar/create'), 'icon-plus', 'Ajukan Semhas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Seminar Hasil
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">  

                    {{ Form::model($semhass, []) }}

                    <div class="form-group">
                        <label for="mahasiswa"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="semhas_at"><strong>Tanggal Semhas</strong></label>
                        {{ Form::input('date','semhas_at', null, ['class' => 'form-control-plaintext', 'id' => 'semhas_at', 'readonly' => 'readonly','disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="jam"><strong>Jam</strong></label>
                        {{ Form::text('semhas_time', null, ['class' => 'form-control-plaintext', 'id' => 'semhas_time', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="ruangan"><strong>Ruangan</strong></label>
                        {{ Form::text('ruangan_nama', null, ['class' => 'form-control-plaintext', 'id' => 'ruangan_nama', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="status"><strong>Status</strong></label>
                        {{ Form::text('status_semhas', null, ['class' => 'form-control-plaintext', 'id' => 'status', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="rekomendasi"><strong>Rekomendasi</strong></label>
                        {{ Form::text('rekomendasi_semhas', null, ['class' => 'form-control-plaintext', 'id' => 'rekomendasi', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="sidang_deadline_at"><strong>Tenggang Waktu Sidang</strong></label>
                        {{ Form::input('date','sidang_deadline_at', null, ['class' => 'form-control-plaintext', 'id' => 'sidang_deadline_at', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_ba_seminar"><strong>File Ba Seminar</strong></label>
                        {{ Form::text('file_ba_seminar', null, ['class' => 'form-control-plaintext', 'id' => 'file_ba_seminar', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_laporan_ta"><strong>File Laporan TA</strong></label>
                        {{ Form::text('file_laporan_ta', null, ['class' => 'form-control-plaintext', 'id' => 'file_laporan_ta', 'readonly' => 'readonly']) }}
                    </div>
                    
                    

                   
                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection