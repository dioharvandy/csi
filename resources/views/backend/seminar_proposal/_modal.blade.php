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
                            <label class="form-label" for="datetime">Tanggal Seminar*</label> <br>
                            <input type="datetime-local" name="datetime" id="datetime" required>
                        </div>

                        <div class="form-group">
                          <label for="room_id">Ruangan*</label> <br>
                         {!! Form::select('room_id', $building, null, ['class' => 'select form-group', 'placeholder' => 'Ruangan', 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="start_at">File Proposal*</label>                             
                                <div class="input-group"> 
                                    <div class="input-group-prepend">
                                    <div class="btn btn-primary" >
                                        <a  onclick="browse()">Upload</a>
                                    </div> 
                                        {!! Form::file('file', ['id'=>'file', 'hidden', 'required']) !!}  
                                    </div> 
                                        <input id='path'  name="path" class="file-path validate col-9" type="text" placeholder="Masukkan file" readonly> 
                                </div> 
                        </div>
                        {!! Form::hidden('thesis_id', $id) !!}

                        <br><p>(*) required</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{ Form::submit(trans('Save'), ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
