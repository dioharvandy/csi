<input type="hidden" name="ta_semhas_id" value="{{ $id }}">
<div class="form-group">
    <label for="mahasiswa">Nama Mahasiswa</label>
    {{ Form::select('mahasiswa_id', $mahasiswas, null, ['class' => 'form-control', 'nama' => 'nama', 'placeholder' => 'Mahasiswa']) }}
</div>