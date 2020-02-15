@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
            	<div class="card-header">
	            	FORM TAMBAH KELAS
            	</div>
            	<div class="card-body">
            		<form method="POST" action="{{ route('kelas.simpan') }}">
            		@csrf
            		<div class="form-group">
					    <label for="matkul">Matakuliah</label>
					    <select class="form-control" id="matkul" name="matkul">
					      <option>-- Pilih Matkul --</option>
					      @foreach($data as $matkul)
  					      <option value="{{ $matkul->id }}">{{ $matkul->name }}</option>
  					      @endforeach
					    </select>
					</div>
					<div class="form-group">
						<label for="">Semester</label>
						<select class="form-control" id="semester" name="semester">
							@foreach($data2 as $smt)
							<option value="{{ $smt->id }}">{{ $smt->period }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="nama_kelas">Nama kelas</label>
						<input type="text" class="form-control" id="nama_kelas" placeholder="nama kelas" name="nama_kelas">
					</div>
					<div class="form-group">
						<label for="minimal_kuota">Minimal kuota</label>
						<input type="number" class="form-control" name="minimal_kuota" id="minimal_kuota" placeholder="minimal kuota">
					</div>
					<div class="form-group">
						<label for="maksimal_kuota">Maksimal kuota</label>
						<input type="number" class="form-control" name="maksimal_kuota" id="maksimal_kuota" placeholder="maksimal kuota">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection