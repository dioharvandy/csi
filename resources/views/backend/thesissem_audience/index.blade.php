@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Thesis Seminar' => url('/thesis_seminar'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
{!! cui_toolbar_btn(route('admin.pesertasemhas.create', [$id]), 'icon-plus', 'Tambah Peserta Semhas') !!}  
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Daftar Peserta Semhas
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                            
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $semhass->links() }}
                            
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($semhass as $peserta)
                            <tr>
                                <td class="text-center">{{ $peserta->name }}</td>
                                <td class="text-center">{{ $peserta->nim }}</td>
                                <td class="text-center">
                                {!! cui_btn_delete(route('admin.pesertasemhas.destroy', [$peserta->id]), "Anda yakin akan menghapus data peserta semhas ini?") !!}
          
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Peserta semhas belum ada
                            </td>
                        </tr>

                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $semhass->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
