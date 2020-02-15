@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
            	<div class="card-header">
	            	FORM TAMBAH KELAS DOSEN
            	</div>
            	<div class="card-body">
            		<form method="POST" action="{{ route('kelas.simpandosenkelas') }}">
            		@csrf
					<div class="form-group">
						<label for="nama_kelas">Nama kelas</label>
						<select class="form-control" id="nama_kelas" name="nama_kelas">
							<option>-- Pilih Kelas --</option>
							@foreach($data1 as $kelas)
							<option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="nama_dosen">Nama dosen</label>
						<select class="form-control" id="nama_dosen" name="nama_dosen">
							<option>-- Pilih Dosen --</option>
							@foreach($data2 as $dosen)
							<option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection