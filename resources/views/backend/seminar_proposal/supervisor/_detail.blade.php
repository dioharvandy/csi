<!-- Title Text Field Input -->
<form class="post" action="{{route('admin.supervisor.prosem.accepted', [$theses[0]->id])}}" method="post">
@csrf

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
        <label class="form-label" for="file_path">File Seminar Proposal</label> <br>
        <a href= {{route('students.prosem.download', [$theses[0]->id])}} class="btn btn-primary">Download</a>
    </div>

    @if ($theses[0]->status == 0)    
        <div class="form-group">
            <label class="form-label" for="grade">Input Nilai</label>
            {!! Form::number('grade', $theses[0]->grade, ['class' => 'form-control-plaintext', 'placeholder' => 'Belum Dinilai']) !!}
            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
        </div>
    @else
        <div class="form-group">
            <label class="form-label-2 mr-2" for="grade">Ubah Nilai</label>
            {!! Form::number('grade', $theses[0]->grade, ['class' => 'form-control mb-2 col-2', 'min'=> "0",  'max'=> "100", 'placeholder' => 'Belum Dinilai']) !!} 
            {!! Form::submit('Ubah', ['class' => 'btn btn-success', 'onclick'=> 'confirmed()']) !!}
        </div>
    @endif

</form>

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
    <script type="text/javascript">
        function confirmed() {
            if(confirm("Apakah Anda Yakin ?")==true){
                return true;
            }else{
                event.preventDefault();
            }
        }
    </script>
@endsection



