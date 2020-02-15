@extends('layouts.app')

@section('toolbar')
    {!! cui_toolbar_btn(route('kelaslecturer.tambah'), 'icon-plus', 'Tambah Dosen') !!}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 align="center">Data Matkul</h2>                        
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama dosen</th>
                            <th>Kelas</th>
                        </tr>
                        @foreach($datas as $data)
                        <tr>
                            <td> {{ $data->name }} </td>
                            <td> 
                                @foreach($data->classroom as $classroom)
                                <li>{{ $classroom->name }}</li>
                                @endforeach
                            </td> <!-- {{$data->lecturer}} -->
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
