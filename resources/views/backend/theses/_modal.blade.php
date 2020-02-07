<!-- Button trigger modal -->
    <div class="text-right col-6">
        <button type="button" class="btn btn-primary btn-group" data-toggle="modal" data-target="#model_pembimbing">
        Ajukan pembimbing
        </button>
    </div>
</div>

{!! Form::open(['method' => 'POST', 'route' => ['students.theses.store'], 'class' => 'post']) !!}
<!-- Modal -->
<div class="modal fade" id="model_pembimbing" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Ajukan Tugas Akhir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">

                        {!! Form::hidden('student_id', $student->id) !!}

                        <div class="form-group">
                                <label for="title">Theses Title*</label>
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => "Title", 'required']) !!}
                        </div>

                        <div class="form-group">
                                <label for="thesis_id">Topic of Theses*</label>
                                    {!! Form::select('thesis_id', $topic, null, ['class' => 'form-control', 'placeholder' => "Topic", 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="abstract">Theses Abstract*</label>
                                {!! Form::textArea('abstract', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="row">
                        <div class="container col-sm mb-4">
                            <div class="form-group">
                                    <label for="lecturer_id">Name of Supervisor*</label>
                                        {!! Form::select('lecturer_id[]', $lecturer, null, ['class' => 'form-control mb-1', 'placeholder' => "Supervisor's name", 'required']) !!}
                                        {!! Form::hidden('position[]', 1) !!}        
                            </div>
                        </div>

                        <div class="container col-sm">
                            <div class="form-group">
                                    <label for="lecturer_id">Name of Supervisor's Assistant</label>
                                        {!! Form::select('lecturer_id[]', $lecturer, null, ['class' => 'form-control mb-1', 'placeholder' => "Supervisor's name", 'nullable']) !!}
                                        {!! Form::hidden('position[]', 1) !!}            
                            </div>
                        </div>

                        <div class="container col-sm">
                            <div class="form-group">
                                    <label for="lecturer_id">Name of Supervisor's Assistant</label>
                                        {!! Form::select('lecturer_id[]', $lecturer, null, ['class' => 'form-control mb-1', 'placeholder' => "Supervisor's name", 'nullable']) !!}
                                        {!! Form::hidden('position[]', 1) !!}            
                            </div>
                        </div>
                    </div>

                    <br><br><p>(*) required</p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit(trans('Save'), ['class' => 'btn btn-primary']) }}
                {{--  <button type="button" class="btn btn-primary">Save</button>  --}}
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>