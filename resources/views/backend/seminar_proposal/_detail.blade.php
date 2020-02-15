<!-- Title Text Field Input -->
<div class="form-group">
    <label class="form-label" for="title">Judul Tugas Akhir</label>
    {!! Form::text('title', $theses[0]->title, ['class' => 'form-control-plaintext', 'readonly']) !!}
</div>

<div class="form-group">
    <label class="form-label" for="start_at">Tanggal Seminar</label>
    {!! Form::text('start_at', $theses[0]->datetime, ['class' => 'form-control-plaintext', 'readonly', 'placeholder' => 'Belum Disetujui']) !!}
</div>

<div class="form-group">
    <label class="form-label" for="start_at">Status</label>
        @foreach ($t_statuses as $key => $val)                                           
            @if ($key == $theses[0]->status)
                {!! Form::text('start_at', $val, ['class' => 'form-control-plaintext', 'readonly']) !!}
            @endif
        @endforeach
</div>

<div class="form-group">
    <label class="form-label" for="grade">Nilai</label>
    {!! Form::text('grade', $theses[0]->grade, ['class' => 'form-control-plaintext', 'readonly', 'placeholder' => 'Belum Dinilai']) !!}
</div>

<div class="form-group">
    <label class="form-label" for="file_path">File Seminar Proposal</label> <br>
    <a href= {{route('students.prosem.download', [$theses[0]->id])}} class="btn btn-primary">Download</a>
</div>

{{--  <div class="form-group">
    <label class="form-label" for="start_at">Ubah File</label>
    
    <div class="input-group">
        <div class="input-group-prepend">
            <button  class="btn btn-primary" onclick="browse()">Upload</button>
            {!! Form::file('file', ['id'=>'file', 'hidden', 'onchange' => 'path()']) !!}
        </div>
            <input id='path' class="file-path validate col-4" type="text" placeholder="Upload your file" readonly>
    </div>
</div>  --}}

@section('javascript')
    {{--  <script type="text/javascript">
        function browse(){
            document.getElementById("file").click();
        }
        function path(){
            var x = $("#file").val();
            $("#path").val(x);
        }
    </script>  --}}
@endsection



