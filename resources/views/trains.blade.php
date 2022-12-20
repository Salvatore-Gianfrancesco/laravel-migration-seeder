@extends('layouts.app')

@section('page-title')
| Trains
@endsection

@section('content')
<div class="container">
    <h1>Timetable</h1>

    @forelse($trains as $train)
    <div>
        <div class="container-fluid bg-dark text-light py-2 my-3">
            <div class="py-1">{{$train->company}} {{$train->train_code}}</div>
            <div class="row border-top">
                <div class="col-6 g-0">
                    <div class="train d-flex justify-content-around align-items-center">
                        <div class="d-flex flex-column">
                            <h3>{{substr($train->departure_time, 0, 5)}}</h3>
                            <div>{{$train->departure_station}}</div>
                        </div>

                        <i class="fa-solid fa-arrow-right-long"></i>

                        <div class="d-flex flex-column">
                            <h3>{{substr($train->arrival_time, 0, 5)}}</h3>
                            <div>{{$train->arrival_station}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        <h5>Carriages</h5>
                        <div>{{$train->carriages}}</div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="h-100 d-flex flex-column justify-content-center gap-1">
                        <div>
                            <span>Train arriving:</span>
                            @if(!$train->is_cancelled) <i class="fa-solid fa-check"></i> @else <i class="fa-solid fa-xmark"></i>@endif
                        </div>

                        @if(!$train->is_cancelled)
                        <div>
                            <span>Train on time:</span>
                            @if($train->is_on_time) <i class="fa-solid fa-check"></i> @else <i class="fa-solid fa-xmark"></i> @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div>No train yet...</div>
        @endforelse
    </div>

    @endsection