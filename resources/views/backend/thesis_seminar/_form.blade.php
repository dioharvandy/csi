<div class="form-group">
    {{ Form::hidden('thesis_id', $student, null, ['class' => 'form-control', 'id' => 'student']) }}
</div>

<div class="form-group">
    <label for="file_report">File Laporan TA (PDF)</label>
    {{ Form::file('file_report', null, ['class' => 'form-control', 'id' => 'file_report']) }}
</div>

<div class="form-group">
    {{ Form::hidden('status', 1, ['class' => 'form-control', 'id' => 'status']) }}
</div>


