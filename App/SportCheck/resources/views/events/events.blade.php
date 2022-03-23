@extends('layouts.app')

@section('content')
<div class="d-flex flex-column text-center">
    <a href="{{route('create_event')}}" class="d-flex align-self-center btn btn-primary btn-m col-sm-1 m-4"> Új rendezvény hozzáadása</a>
    @foreach($events as $item)
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
    @endforeach
</div>
    
@endsection