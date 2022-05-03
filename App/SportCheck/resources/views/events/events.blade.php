@extends('layouts.app')
@section('content')

<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>

<div class="d-flex flex-column text-center">
    <form method="GET" action="{{route('eventsearch')}}" class="d-flex flex-row align-items-baseline justify-content-center">
    <div class="d-flex flex-column justify-content-center w-100">
            <div class="d-flex flex-row justify-content-center align-items-baseline">
                <div class="mx-2">
                    <input type="radio" name="searchItem" value="srcName" checked> Keresés a címben
                </div>
                <div class="mx-2">
                    <input type="radio" name="searchItem" value="srcDesc"> Keresés a leírásban
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center mt-2">
                <input type="search" name="eventSearch" placeholder="Keresés" class="form-control w-25">
                <button type="submit" class="btn btn-secondary ms-2 form-text">Keresés</button>
            </div>
        </div>
    </form>
    
    @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")
    <a href="{{route('create_event')}}" class="d-flex align-self-center justify-content-center btn btn-primary btn-m col-sm-2 m-4 text-nowrap"> Új rendezvény hozzáadása</a>
    @endif
    <div class="d-flex flex-column mx-2 mt-4">
    @foreach($events as $item)
            <div class="d-flex justify-content-center">
                <div class="card d-flex mb-3  col-sm-10 col-lg-5 align-self-center">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        @if(\App\Http\Controllers\EventController::checkUserRole() != "admin")
                        <div class="d-flex w-25"></div>
                        @endif
                        <div class="d-flex ps-2 pt-2"><h5>{{ $item->name }}</h5></div>
                        
                        @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")
                            <div class="d-flex w-50 justify-content-end">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/update/')}}" class="btn btn-warning align-self-center mb-1">Módosítás</a>   
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/export/')}}" class="btn btn-primary align-self-center mb-1">Letöltés</a>   
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/qr/set/')}}" class="btn btn-info align-self-center mb-1">QR kód</a>   
                                        </div>
                                    </div>
                                    <form action="{{url('/events')}}" method="POST">
                                        @csrf
                                        <div class="d-flex">
                                            <div class="d-flex mx-2">
                                                <input type="text" name="id" value="{{$item->id}}" class="d-none">
                                                <button class="btn btn-danger align-self-center mb-1">Törlés</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                        <div class="d-flex w-25 justify-content-end"></div>
                        @endif
                    </div>
                    <a href="{{ url('/events/'. $item->id) }}" class="text-reset text-decoration-none">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column ">
                    <div class="d-flex">
                        {{$item->description}}
                    </div>
                        <div class="d-flex flex-row mt-2">
                            <label for="date" class="d-flex align-self-baseline"><h6>Rendezvény ideje:&nbsp</h6></label>
                            <div name="date" class="d-flex align-self-baseline">
                                {{ $item->date }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
    
@endsection