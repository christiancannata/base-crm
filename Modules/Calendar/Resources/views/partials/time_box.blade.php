<div class="col-md-12">
    <h5>Disponibilità del {{$day->format('d-m-Y')}}</h5>
</div>
<div class="col-md-12">
    <label>Seleziona l'orario</label>
    <select class="select2 form-control">
        @foreach($hours as $hour)

        @endforeach
    </select>
</div>
