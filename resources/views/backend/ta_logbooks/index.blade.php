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
                    <strong><i class="fa fa-list"></i> List Log Book TA</strong>
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
                            <th class="text-center">Judul TA</th>
                            <th class="text-center">Pembimbing</th>
                            <th class="text-center">Tanggal Logbook</th>
                            <th class="text-center">Progress</th>
                            <th class="text-center">File Progres</th>
                            <th class="text-center">Supervised by</th>
                            <th class="text-center">Supervised at</th>
                            <th class="text-center">File note</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logbook as $logbook)
                            {{-- @if($logbook->status == 1) --}}
                            <?php $n = 1?>
                                <tr>
                                    <td class="text-center">{{ $n }}</td>
                                    <td class="text-center">{{ $logbook->thesis_title }}</td>
                                    <td class="text-center">{{ $logbook->lecturer_name }}</td>
                                    <td class="text-center">{{ $logbook->date }}</td>
                                    <td class="text-center">{{ $logbook->progress }}</td>
                                    <td class="text-center">{{ $logbook->files_progress }}</td>
                                    <td class="text-center">{{ $logbook->supervised_by }}</td>
                                    <td class="text-center">{{ $logbook->supervised_at }}</td>
                                    <td class="text-center">{{ $logbook->files_notes }}</td>
                                    <td class="text-center">{{ $logbook->status }}</td>
                                </tr>
                            <?php $n = 1?>
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
