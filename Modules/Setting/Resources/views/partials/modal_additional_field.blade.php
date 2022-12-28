<div class="modal fade" id="addFieldUser{{$field->id}}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form autocomplete="off" method="POST"
                  class="updateField"
                  action="{{route('setting.update_additional_fields',['field' => $field])}}">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica {{$field->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Tipo campo</label>
                            <select class="form-control" name="type" required>
                                <option value="text"
                                        @if($field->type == 'text') selected @endif
                                >Testo semplice
                                </option>
                                <option value="textarea"
                                        @if($field->type == 'textarea') selected @endif

                                >Area di testo
                                </option>
                                <option value="select"
                                        @if($field->type == 'select') selected @endif

                                >Scelta singola
                                </option>
                                <option value="checkbox"
                                        @if($field->type == 'checkbox') selected @endif
                                >Checkbox
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Nome campo</label>
                            <input class="form-control" type="text" required
                                   name="name" value="{{$field->title}}" placeholder="Es.: Email aziendale">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Descrizione</label>
                            <textarea class="form-control" type="text"
                                      name="description">{{$field->description}}</textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">
                                <input type="checkbox"
                                       @if($field->required) checked @endif
                                       name="required">
                                Campo obbligatorio</label>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Aggiorna</button>
                </div>
            </form>
        </div>
    </div>
</div>
