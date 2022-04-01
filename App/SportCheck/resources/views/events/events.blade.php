@extends('layouts.app')

@section('content')
<div class="d-flex flex-column text-center">

    @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")
    <a href="{{route('create_event')}}" class="d-flex align-self-center btn btn-primary btn-m col-sm-1 m-4"> Új rendezvény hozzáadása</a>
    @endif
    {{dd(\App\Http\Controllers\EventController::checkUserRole())}}
    @foreach($events as $item)
        <div class="d-flex flex-column">
        @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")

            <div class="d-flex flex-row justify-content-center">
                <div class="d-flex">
                    <div class="d-flex mx-2">
                        <a href="{{url('/events/'.$item->id.'/update/')}}" class="btn btn-primary align-self-center mb-1">Módosítás</a>   
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex mx-2">
                        <a href="{{url('/events/'.$item->id.'/update/')}}" class="btn btn-primary align-self-center mb-1">Letöltés</a>   
                    </div>
                </div>
            </div>
            
        @endif
            
            <div class="d-flex justify-content-center">
                <div class="card d-flex mb-3 col-sm-10 align-self-center">
                    <h5 class="card-header">{{ $item->name }}</h5>
                    <div class="card-body d-flex align-items-center justify-content-center flex-row">
                            <div class="d-flex">
                                <label for="date" class="d-flex align-self-baseline"><h6>Rendezvény ideje:&nbsp</h6></label>
                                <div name="date" class="d-flex align-self-baseline">
                                    {{ $item->date }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/events/'. $item->id) }}" class="stretched-link"></a>
                    </div>
            </div>
            
        </div>
        
        
    @endforeach
</div>
    
@endsection