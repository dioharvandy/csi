<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Dosen Tanpa Gelar') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- NIP Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nip">NIP</label>
    {{ html()->text('nip')->class(['form-control', 'is-invalid' => $errors->has('nip')])->id('nip')->placeholder('NIP Dosen') }}
    @error('nip')
    <div class="invalid-feedback">{{ $errors->first('nip') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="nidn">NIDN:</label>
    {{ html()->text('nidn')->class(["form-control", "is-invalid" => $errors->has('nidn')])->id('nidn')->placeholder('Nomor Induk Dosen Nasional') }}
    @error('nidn')
    <div class="invalid-feedback">{{ $errors->first('nidn') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="nik">NIK</label>
    {{ html()->text('nik')->class(["form-control", "is-invalid" => $errors->has('nik')])->id('nik')->placeholder('NIK Dosen') }}
    @error('nik')
    <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="karpeg">Karpeg:</label>
    {{ html()->text('karpeg')->class(["form-control", "is-invalid" => $errors->has('karpeg')])->id('karpeg')->placeholder('Nomor Kartu Pegawai Dosen') }}
    @error('karpeg')
    <div class="invalid-feedback">{{ $errors->first('karpeg') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="npwp">NPWP:</label>
    {{ html()->text('npwp')->class(["form-control", "is-invalid" => $errors->has('npwp')])->id('npwp')->placeholder('Nomor Pokok Wajib Pajak') }}
    @error('npwp')
    <div class="invalid-feedback">{{ $errors->first('npwp') }}</div>
    @enderror
</div>

<!-- Department Input (Select) -->
<div class="form-group">
    <label class="form-label" for="department_id">Jurusan/Prodi:</label>
    {{ html()->select('department_id')->options($departments)->class(["form-control", "is-invalid" => $errors->has('department_id')])->id('department_id') }}
    @error('department_id')
    <div class="invalid-feedback">{{ $errors->first('department_id') }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthplace">Tempat Lahir:</label>
            {{ html()->text('birthplace')->class(["form-control", "is-invalid" => $errors->has('birthplace')])->id('birthplace')->placeholder('Tempat Lahir') }}
            @error('birthplace')
            <div class="invalid-feedback">{{ $errors->first('birthplace') }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="birthday">Tanggal Lahir:</label>
            {{ html()->date('birthday')->class(["form-control", "is-invalid" => $errors->has('birthday')])->id('birthday')->placeholder('Tanggal Lahir') }}
            @error('birthday')
            <div class="invalid-feedback">{{ $errors->first('birthday') }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Input (Select) gender-->
<div class="form-group">
    <label class="form-label" for="gender">Jenis Kelamin:</label>
    {{ html()->select('gender')->options($genders)->class(["form-control", "is-invalid" => $errors->has('gender')])->id('gender') }}
    @error('gender')
    <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
    @enderror
</div>

<!-- Religion Input (Select) -->
<div class="form-group">
    <label class="form-label" for="religion">Agama:</label>
    {{ html()->select('religion', $religions)->class(["form-control", "is-invalid" => $errors->has('religion')])->id('religion') }}
    @error('religion')
    <div class="invalid-feedback">{{ $errors->first('religion') }}</div>
    @enderror
</div>

<!-- Input (Select) marital_status -->
<div class="form-group">
    <label class="form-label" for="marital_status">Marital Status:</label>
    {{ html()->select('marital_status')->options($marital_statuses)->class(["form-control", "is-invalid" => $errors->has('marital_status')])->id('marital_status') }}
    @error('marital_status')
    <div class="invalid-feedback">{{ $errors->first('marital_status') }}</div>
    @enderror
</div>

<!-- Input (Select) association_type-->
<div class="form-group">
    <label class="form-label" for="association_type">Jenis Ikatan Kerja:</label>
    {{ html()->select('association_type')->options($association_types)->class(["form-control", "is-invalid" => $errors->has('association_type')])->id('association_type')->placeholder('') }}
    @error('association_type')
    <div class="invalid-feedback">{{ $errors->first('association_type') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="email">Email:</label>
    {{ html()->text('email')->class(["form-control", "is-invalid" => $errors->has('email')])->id('email')->placeholder('Email Dosen') }}
    @error('email')
    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="phone">No HP:</label>
    {{ html()->text('phone')->class(["form-control", "is-invalid" => $errors->has('phone')])->id('phone')->placeholder('No Handphone Dosen') }}
    @error('phone')
    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="address">Alamat:</label>
    {{ html()->textarea('address')->class(["form-control", "is-invalid" => $errors->has('address')])->id('address') }}
    @error('address')
    <div class="invalid-feedback">{{ $errors->first('address') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="photo">Photo:</label>
    {{ html()->file('photo')->class(["form-control-file", "is-invalid" => $errors->has('photo')])->id('photo') }}
    @error('photo')
    <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
    @enderror
</div>

