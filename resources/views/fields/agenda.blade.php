<div class="row">
    @if($value)
        <div class="col-md-12">
            <h5>{{$value->format('D d-m-Y')}} alle {{$value->format("H:i")}}</h5>
        </div>
    @endif
    <div class="col-lg-8">
        <div class="calendar-wrap style-two">
            <div id="calendar"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row" id="selectBox">
            @if($value)
                @include('calendar::partials.time_box',[
    'day' => $value,
    'hideDuration' => true,
    'hours' => [
        $value->format("H:i")
]
])
            @endif
        </div>
    </div>
</div>

@push('scripts')

    <script src="/assets/js/pages/agenda.js"></script>
@endpush
