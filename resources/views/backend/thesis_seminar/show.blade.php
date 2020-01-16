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
                        <label for="student"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('student_name', null, ['class' => 'form-control-plaintext', 'id' => 'student_name', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="semhas_at"><strong>Waktu Mengajukan</strong></label>
                        {{ Form::input('timestamp','registered_time', null, ['class' => 'form-control-plaintext', 'id' => 'registered_time', 'readonly' => 'readonly','disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="jam"><strong>Jadwal Seminar</strong></label>
                        {{ Form::input('timestamp','seminar_time', null, ['class' => 'form-control-plaintext', 'id' => 'seminar_time', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="reviewer_name"><strong>Penguji</strong></label>
                        {{ Form::text('reviewer_name', null, ['class' => 'form-control-plaintext', 'id' => 'reviewer_name', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="status"><strong>Status</strong></label>
                        {{ Form::text('status_semhas', null, ['class' => 'form-control-plaintext', 'id' => 'status', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="recommendation"><strong>Rekomendasi</strong></label>
                        {{ Form::text('recommendation', null, ['class' => 'form-control-plaintext', 'id' => 'recommendation', 'readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_reports"><strong>File Laporan TA</strong></label>
                        {{ Form::text('file_reports', null, ['class' => 'form-control-plaintext', 'id' => 'file_reports', 'readonly' => 'readonly']) }}
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