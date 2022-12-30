@if($event->model)
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
            <b class="d-block">{{$event->description}}</b>
        </div>
        <div class="col-md-12">
            <h5>Anagrafica Cliente</h5>
            <hr>
        </div>

        @if($event->model->customer)
            <div class="col-md-6 mb-2">
                <label class="d-block">Nome</label>
                <b class="d-block">{{$event->model->customer->first_name}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">Cognome</label>
                <b class="d-block">{{$event->model->customer->last_name}}</b>
            </div>
            @if($event->model->customer->company_name)
                <div class="col-md-6 mb-2">
                    <label class="d-block">Ragione Sociale</label>
                    <b class="d-block">{{$event->model->customer->company_name}}</b>
                </div>
            @endif
            @if($event->model->customer->vat_code)
                <div class="col-md-6 mb-2">
                    <label class="d-block">Partita IVA</label>
                    <b class="d-block">{{$event->model->customer->vat_code}}</b>
                </div>
            @endif
            <div class="col-md-6 mb-2">
                <label class="d-block">Telefono</label>
                <b class="d-block">{{$event->model->customer->phone}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">Email</label>
                <b class="d-block">{{$event->model->customer->email}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">Indirizzo</label>
                <b class="d-block">{{$event->model->customer->address}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">CAP</label>
                <b class="d-block">{{$event->model->customer->zip_code}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">Comune</label>
                <b class="d-block">{{$event->model->customer->town}}</b>
            </div>
            <div class="col-md-6 mb-2">
                <label class="d-block">Città</label>
                <b class="d-block">{{$event->model->customer->city}}</b>
            </div>

        @endif


        <div class="col-md-12">
            <h5>Esita Chiamata</h5>
            <hr>
        </div>
        <div class="col-md-12 mb-3">
            <label class="form-label">Esito</label>
            <select class=" form-control status_id" name="status_id" required>
                <option disabled selected>-- Scegli un esito --</option>
                @foreach(\Modules\Task\Entities\TaskStatus::all() as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label class="form-label" required>Motivazione</label>
            <select class="select2 form-label">
                <option disabled selected>-- Scegli un esito --</option>
            </select>
        </div>
        <div class="col-md-12 mb-3" id="noteDiv" style="display: none">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="note"></textarea>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-success update-event">Esita appuntamento
            </button>
        </div>

    </div>

@endif
