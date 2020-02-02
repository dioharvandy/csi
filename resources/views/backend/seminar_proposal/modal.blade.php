<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
  Ajukan pembimbing
</button>

{!! Form::open(['method' => 'POST', 'route' => ['student.supervisor.create'], 'class' => 'post']) !!}
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">

                        <div class="form-group">
                                <label for="lecturer_id">Name of Supervisor</label>
                                    {!! Form::select('lecturer_id', $lecturer, null, ['class' => 'form-control', 'placeholder' => "Supervisor's name", 'required']) !!}
                        </div>

                        {!! Form::hidden('thesis_id', $theses->id) !!}

                        <div class="form-group">
                                <label for="position">Position of Supervisor</label>
                                {!! Form::select('position', [1 => 'Supervisor', 2=>"Supervisor's Assistant"], null, ['class' => 'form-control', 'placeholder' => 'Position', 'required']) !!}
                        </div>

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