@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Detail kelas
                </div>

                <div class="card-body">
					<div class="form-group">
						<label class="col-md-3" for="matkul">Matakuliah : </label>	{{$data->course['name']}}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="semester">Semester : </label> {{$data->semester['period']}}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="tahun">Tahun : </label> {{$data->semester['year']}}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="nama_kelas">Nama kelas : </label> {{$data->name}}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="minimal_kuota">Minimal kuota : </label> {{ $data->min_students }}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="maksimal_kuota">Maksimal kuota : </label> {{ $data->max_students }}
					</div>
					<div class="form-group">
						<label class="col-md-3" for="deskripsi">Deskripsi : </label> {{ $data->description }}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection