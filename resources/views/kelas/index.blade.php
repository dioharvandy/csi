@extends('layouts.app')

@section('toolbar')
    {!! cui_toolbar_btn(route('kelas.tambah'), 'icon-plus', 'Tambah Matkul') !!}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 align="center">Data Kelas</h2>                        
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Dosen</th>
                            <th>Kode Matkul</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Detail</th>
                        </tr>
                        @foreach($datas as $kelas)
                        <tr>
                            <td> {{ $kelas->name }} </td>
                            <td>
                                @foreach($kelas->lecturertes as $lecturer)
                                <li>{{ $lecturer->name }}</li>
                                @endforeach
                            </td>
                            <td> {{ $kelas->course->code }} </td>
                            <td> {{ $kelas->semester->period }} </td>
                            <td> {{ $kelas->course->credit }} </td>
                            <td>
                                
                                <a href="{{ route('kelas.edit',[$kelas->id]) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('kelas.delete',[$kelas->id]) }}" class="btn btn-danger">Hapus</a>
                                <a href="{{ route('kelas.detail',[$kelas->id]) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
