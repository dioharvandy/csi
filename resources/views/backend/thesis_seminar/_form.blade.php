<div class="form-group">
    <label for="file_report">File Laporan TA (PDF)</label>
    {{ Form::file('file_report', null, ['class' => 'form-control', 'id' => 'file_report']) }}
</div>

<div class="form-group">
    {{ Form::hidden('status', '1', null, ['class' => 'form-control', 'id' => 'status']) }}
</div>


