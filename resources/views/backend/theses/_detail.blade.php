<!-- Student's name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="student_id">Nama Mahasiswa/Nim:</label>
    {{ html()->text('student_id', $thesis->student->name.' - '.$thesis->student->nim )->class('form-control-plaintext') }}
</div>

<!-- Topik Text Field Input -->
<div class="form-group">
    <label class="form-label" for="thesis_id">Topik</label>
    {{ html()->text('thesis_id', $thesis->thesisTopic->name)->class('form-control-plaintext') }}
</div>

<!-- title Text Field Input -->
<div class="form-group">
    <label class="form-label" for="title">Judul:</label>
    {{ html()->textarea('title', $thesis->title)->class('form-control-plaintext') }}
</div>

<!-- Abstract Text Field Input -->
<div class="form-group">
    <label class="form-label" for="abstract">Abstrak:</label>
    {{ html()->textarea('abstract', $thesis->abstract)->class('form-control-plaintext') }}
</div>

<!-- Start_at Text Field Input -->
<div class="form-group">
    <label class="form-label" for="start_at">Mulai Tugas Akhir Pada:</label>
    {{ html()->text('start_at',$thesis->start_at->format('d M Y') )->class('form-control-plaintext') }}
</div>

<!-- Status Text Field Input -->
<div class="form-group">
    <label class="form-label" for="npwp">Status:</label>
    {{ html()->text('status', $thesis->status)->class('form-control-plaintext') }}
</div>
<div class="form-group">
    <label class="form-label" for="topic">Topik Tugas Akhir</label>
    {!! Form::text('topic', $theses[0]->topics_name, ['class' => 'form-control-plaintext', 'disabled']) !!}
</div>

<!-- Title Text Field Input -->
<div class="form-group">
    <label class="form-label" for="title">Judul</label>
    {!! Form::text('title', $theses[0]->title, ['class' => 'form-control-plaintext', 'disabled']) !!}
</div>

<div class="form-group">
    <label class="form-label" for="start_at">Tanggal Mulai</label>
    {!! Form::text('start_at', $theses[0]->start_at, ['class' => 'form-control-plaintext', 'disabled']) !!}
</div>

<div class="form-group">
    <label class="form-label" for="status">Status</label>
    @foreach ($t_statuses as $key => $val)
        @if ($key == $theses[0]->status)
            {!! Form::text('status', $val, ['class' => 'form-control-plaintext', 'disabled']) !!}
        @endif
    @endforeach
</div>

<div class="form-group">
    <label class="form-label" for="abstract">Abstrak</label>
    {!! Form::textArea('abstract', $theses[0]->abstract, ['class' => 'form-control-plaintext', 'disabled']) !!}
</div>

<!-- Astract Text Field Input -->
{{-- <div class="form-group">
    <label class="form-label" for="abstract">Abstract</label>
    {{ html()->textArea('abstract', $theses->abstract )->class('form-control-plaintext') }}
</div> --}}


{{-- <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('birthplace', $student->birthplace)->class('form-control-plaintext') }}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthdate">Tanggal Lahir:</label>
            {{ html()->text('birthdate', $student->birthdate)->class('form-control-plaintext') }}
        </div>
    </div>
</div> --}}

<!-- Gender Text Field Input -->
{{-- <div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->text('gender', $student->gender ? data_get($genders, $student->gender, '-') : "-")->class('form-control-plaintext') }}
</div> --}}

