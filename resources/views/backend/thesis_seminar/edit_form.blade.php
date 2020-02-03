<div class="form-group">
    {{ Form::hidden('thesis_id', $student[0]->id, null, ['class' => 'form-control', 'id' => 'nim']) }}
</div>

<div class="form-group">
    <label for="file_report">File Laporan (PDF)</label>
    {{ Form::file('file_report', null, ['class' => 'form-control', 'id' => 'file_report']) }}
</div>

<div class="form-group">
    {{ Form::hidden('status', 10, ['class' => 'form-control', 'id' => 'status']) }}
</div>