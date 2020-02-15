@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Tugas Akhir' => '#',
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
                    <div class="row">
                        <div class="col-6">
                            <strong><i class="fa fa-list "></i> List Seminar Proposal</strong>
                        </div>

                        <!-- Button trigger modal -->
                        <div  class="text-right col-6">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                Tambahkan Proposal
                                </button>
                        </div>
                        <form class="post" action="{{route('students.prosem.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('backend.seminar_proposal._modal')
                        </form>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Judul Tugas Akhir</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($theses as $thesis)
                                <tr>
                                    <td class="text-center">{{ $thesis->title }}</td>
                                    <td class="text-center">              
                                        @foreach ($t_statuses as $key => $val)                                           
                                            @if ($key == $thesis->status)
                                                {{ $val }}
                                            @endif
                                       @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href= {{route('students.prosem.download', [$thesis->id])}} class="btn btn-outline-primary">
                                            <i class="fas fa-file-download"></i>
                                        </a>
                                        <a href="{{route('students.prosem.show', [$thesis->id] )}}" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $theses->links() }}
                            </div>
                        </div>
                    </div>
                    
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection


@section('javascript')
<script type="text/javascript">

    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
    });

    function browse(){
        $("#file").click();
        $('#file').on('change', function(){
            var x = $("#file").val();
            $("#path").val(x);
        })
    }
</script>
@endsection


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button>
