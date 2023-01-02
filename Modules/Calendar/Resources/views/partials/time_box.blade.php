<div class="col-md-12">
    <h5>Disponibilità del {{$day->format('d-m-Y')}}</h5>
</div>
@if(!empty($hours))
    <div class="col-md-12  mb-3">

        <label>Seleziona l'orario</label>
        <input type="hidden" name="event_date" value="{{$day->format("Y-m-d")}}">
        <select required name="hour" class="select2 form-control">
            @foreach($hours as $hour)
                <option>{{$hour}}</option>
            @endforeach
        </select>
    </div>
    @if(!isset($hideDuration))
        <div class="col-md-12 mb-3">

            <label>Durata</label>
            <select required name="period" class="select2 form-control">
                <option value="30">30 Minuti</option>
                <option value="60">1 Ora</option>
                <option value="120" selected>2 Ore</option>
                <option value="180">3 Ore</option>
            </select>
        </div>
    @endif

@else
    <div class="col-md-12">

        <div class="alert alert-danger">
            Nessuna disponibilità.
        </div>
    </div>
@endif

