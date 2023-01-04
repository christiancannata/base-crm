@if($event->model)
    @if(get_class($event->model) == \Modules\Task\Entities\Task::class)
        <form method="POST" action="{{route('task.update_popup_call',['task' => $event->model])}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf

            @endif
            <div class="row">
                <div class="col-md-12">
                    <h5>Appuntamento</h5>
                    <hr>
                </div>

                <div class="col-md-6 mb-2">
                    <label class="d-block">Tipologia</label>
                    <b class="d-block">
                        @if(get_class($event->model) == \Modules\Task\Entities\Task::class)
                            @if($event->model->category)
                                {{$event->model->category->name}}
                            @endif
                        @endif
                    </b>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="d-block">Data</label>
                    <b class="d-block">
                        {{$event->start->format("d/m/Y")}}
                    </b>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="d-block">Dalle</label>
                    <b class="d-block">
                        {{$event->start->format("H:i")}}
                    </b>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="d-block">Alle</label>
                    <b class="d-block">
                        {{$event->end->format("H:i")}}
                    </b>
                </div>
                <div class="col-md-12 mb-2">
                    <label class="d-block">Note</label>
                    <b class="d-block">{!! nl2br($event->description) !!}</b>
                </div>
                <div class="col-md-12">
                    <h5>Anagrafica Lead</h5>
                    <hr>
                </div>

                @if($event->model->lead)
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Nome</label>
                        <b class="d-block">{{$event->model->lead->first_name}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Cognome</label>
                        <b class="d-block">{{$event->model->lead->last_name}}</b>
                    </div>
                    @if($event->model->lead->company_name)
                        <div class="col-md-6 mb-2">
                            <label class="d-block">Ragione Sociale</label>
                            <b class="d-block">{{$event->model->lead->company_name}}</b>
                        </div>
                    @endif
                    @if($event->model->lead->vat_code)
                        <div class="col-md-6 mb-2">
                            <label class="d-block">Partita IVA</label>
                            <b class="d-block">{{$event->model->lead->vat_code}}</b>
                        </div>
                    @endif
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Telefono</label>
                        <b class="d-block">{{$event->model->lead->phone}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Email</label>
                        <b class="d-block">{{$event->model->lead->email}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Indirizzo</label>
                        <b class="d-block">{{$event->model->lead->address}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">CAP</label>
                        <b class="d-block">{{$event->model->lead->zip_code}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Comune</label>
                        <b class="d-block">{{$event->model->lead->town}}</b>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="d-block">Città</label>
                        <b class="d-block">{{$event->model->lead->city}}</b>
                    </div>

                @endif


                <div class="col-md-12">
                    <h5>Esita Chiamata</h5>
                    <hr>
                </div>

                @if($event->model->status->system_name == 'TO_DO')
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Esito</label>
                        <select autocomplete="off" class=" form-control status_system_name" name="status_system_name"
                                required>
                            <option value="" disabled selected>-- Scegli un esito --</option>
                            @foreach(\Modules\Task\Entities\TaskStatus::whereIn('system_name',['CANCELED','DONE'])->get() as $status)
                                <option value="{{$status->system_name}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3" id="reasonDiv" style="display: none">
                        <label class="form-label">Motivazione</label>
                        <select name="close_reason_id" class="select2 form-label reason_id" required>
                            <option disabled selected value="">-- Scegli un esito --</option>
                            @foreach(\Modules\Task\Entities\TaskStatus::where('parent_id',\Modules\Task\Entities\TaskStatus::where('system_name','DONE')->first()->id)->get() as $reasons)
                                <option value="{{$reasons->id}}">{{$reasons->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Note</label>
                        <textarea required class="form-control" name="note"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Esita appuntamento
                        </button>
                    </div>
                @else
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Esito</label>
                        <strong class="d-block">{{$event->model->status->name}}</strong>
                    </div>
                    @if($event->model->closeReason)
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Motivazione</label>
                            <strong class="d-block">{{$event->model->closeReason->name}}</strong>
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Note</label>
                        <strong class="d-block">{{$event->model->notes}}</strong>
                    </div>
                @endif


            </div>
            @if(get_class($event->model) == \Modules\Task\Entities\Task::class)
        </form>
    @endif
@endif
