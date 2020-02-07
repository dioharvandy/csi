<!-- Title Text Field Input -->
<div class="form-group">
    <label class="form-label" for="title">Judul Tugas Akhir</label>
    {{-- {!! Form::text('title', $theses[0]->title, ['class' => 'form-control-plaintext', 'disabled']) !!} --}}
</div>

<div class="form-group">
    <label class="form-label" for="topic">File Seminar Proposal</label>
    {{-- {!! Form::text('topic', $theses[0]->topics_name, ['class' => 'form-control-plaintext', 'disabled']) !!} --}}
</div>

<div class="form-group">
    <label class="form-label" for="status">Nilai</label>
</div>

<div class="form-group">
    <label class="form-label" for="start_at">Tanggal Disetujui</label>
    {{-- {!! Form::text('start_at', $theses[0]->start_at, ['class' => 'form-control-plaintext', 'disabled']) !!} --}}
</div>

<div class="form-group">
    <label class="form-label" for="start_at">Tambahkan File</label>
    
    <div class="input-group">
        <div class="input-group-prepend">
            <button  class="btn btn-primary" onclick="browse()">Upload</button>
            {!! Form::file('file', ['id'=>'file', 'hidden']) !!}
        </div>
            <input class="file-path validate" type="text" placeholder="Upload your file">
    </div>
</div>





