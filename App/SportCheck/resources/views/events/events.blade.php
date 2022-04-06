@extends('layouts.app')
@section('content')

<div class="d-flex flex-column text-center">
    @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")
    <a href="{{route('create_event')}}" class="d-flex align-self-center justify-content-center btn btn-primary btn-m col-sm-2 m-4 text-nowrap"> Új rendezvény hozzáadása</a>
    @endif
    @foreach($events as $item)
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
                <div class="card d-flex mb-3 col-sm-10 align-self-center">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div class="d-flex w-25"></div>
                        <div class="d-flex"><h5>{{ $item->name }}</h5></div>
                        <div class="d-flex w-25 justify-content-end">
                            @if(\App\Http\Controllers\EventController::checkUserRole() == "admin")
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/update/')}}" class="btn btn-warning align-self-center mb-1">Módosítás</a>   
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/update/')}}" class="btn btn-primary align-self-center mb-1">Letöltés</a>   
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex mx-2">
                                            <a href="{{url('/events/'.$item->id.'/qr/set/')}}" class="btn btn-primary align-self-center mb-1">QR kód lekérése</a>   
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
                             
                            @endif
                        </div>
                    </div>
                    <a href="{{ url('/events/'. $item->id) }}" class="text-reset text-decoration-none">
                    <div class="card-body d-flex align-items-center justify-content-center flex-row ">
                            <div class="d-flex">
                                <label for="date" class="d-flex align-self-baseline"><h6>Rendezvény ideje:&nbsp</h6></label>
                                <div name="date" class="d-flex align-self-baseline">
                                    {{ $item->date }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
    
@endsection