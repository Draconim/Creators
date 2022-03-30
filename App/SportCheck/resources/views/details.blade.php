@extends('home')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <a href="{{ url('/events' ) }}" title="vissza" >
                    <button class="btn btn-primary btn-sm">&larr;</button>
                </a>
            </div>
            <div class="d-flex">
                <h3>
                    {{ $event->name}}
                </h3>
            </div>
            <div class="d-flex btn btn-disabled" aria-hidden="true">   </div>
        </div>
        <div class="card-body text-center">
            <div class="container d-flex flex-column">
                <div class="p-4">
                    <label for="desc"><h4>A redezvényről</h4></label>
                    <div name="desc">{{ $event->description }}</div>
                </div>
                <div class="d-flex flex-row">
                    <div class="px-4 py-2 col-6">
                        <label for="date"><h4>Rendezvény <br />dátuma</h4></label>
                        <div name="date">{{ $event->date }}</div>
                    </div>
                    <div class="px-4 py-2 col-6">
                        <label for="dur"><h4>Rendezvény időtartama</h4></label>
                        <div name="dur">{{ $event->duration }}</div>
                    </div>
                </div>
                <div class="p-4">
                    <label for="checkin"><h4>Megjelenés</h4></label>
                    <div name="checkin">{{ $event->check_in_time }}</div>
                </div>
                @if(\App\Http\Controllers\EventController::checkUserRole() == "user")
                @if ($type == '1')
                    <form method="POST" action="{{ route('details',$event) }}">
                        @csrf
                            <button class="btn btn-primary btn-m" type="submit">
                                Jelentkezés törlése
                            </button>
                    </form>

                @else
                    <form method="POST" action="{{ route('details',$event) }}">
                        @csrf
                            <button class="btn btn-primary btn-m" type="submit">
                                Jelentkezés az eseményre
                            </button>
                    </form>
                @endif
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
