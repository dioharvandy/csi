@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Mahasiswa' => route('admin.students.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {{-- {!! cui_toolbar_btn(route('admin.students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="fa fa-list"></i> List Tugas Akhir</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{-- {{ $students->links() }} --}}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Topik</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Pembimbing</th>
                            <th class="text-center">Tanggal Mulai</th>
                            <th class="text-center">Lihat Logbook</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($theses as $theses)
                            @if($theses->status == 1)
                            <?php $n = 1?>
                                <tr>
                                    <td>{{ $n }}</td>
                                    <td>{{ $theses->topics_name }}</td>
                                    <td>{{ $theses->title }}</td>
                                    <td class="text-center">{{ $theses->abstract }}</td>
                                    <td class="text-center">
                                        @foreach ($supervisor as $supervisor)
                                            @if ($supervisor->thesis_id == $theses->id)
                                                {{$supervisor->lecturer_name}} <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $theses->start_at }}</td>
                                    <td class="text-center">
                                        Coming soon
                                         {{-- {!! cui_btn_view(route('admin.ta_logbook.index', [$theses->id])) !!}  --}}
                                        {{--  {!! cui_btn_edit(route('admin.students.edit', [$theses->id])) !!}  --}}
                                         {{-- {!! cui_btn_delete(route('admin.students.destroy', [$theses->id]), "Anda yakin akan menghapus data mahasiswa ini?") !!}  --}}
                                    </td>
                                </tr>
                            <?php $n = 1?>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{-- {{ $students->links() }} --}}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
