@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-center">Felhasználók</div>
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-center row">
                    <form method="GET" action="{{url('/users/search')}}" class="d-flex flex-row align-items-baseline justify-content-center">
                        <input type="search" name="userSearch" placeholder="Keresés" class="form-control w-25">
                        <button type="submit" class="btn btn-secondary ms-2 form-text">Keresés</button>
                    </form>
                    @if(isset($message))
                    <div class="card-header">{{ $message }}</div>
                    @endif
                </div>
                <div class="d-flex flex-column mx-3 pt-5">
                    <div class="d-flex flex-row row border-bottom border-2 border-dark">
                        <div class="d-flex col align-items-baseline justify-content-start">#</div>
                        <div class="d-flex col align-items-baseline justify-content-start">Név</div>
                        <div class="d-flex col align-items-baseline justify-content-start">Szerepkör</div>
                        <div class="d-flex col align-items-baseline justify-content-start">Kontrol</div>
                    </div>
                    @foreach($users->reverse() as $item)
                        <div class="d-flex flex-row align-items-baseline row py-2 border-bottom border-1 border-secondary">
                            <div class="d-flex col align-items-baseline justify-content-start">{{ $item->id }}</div>
                            <div class="d-flex col align-items-baseline justify-content-start">{{ $item->name }}</div>
                            <div class="d-flex col align-items-baseline justify-content-start">{{ $item->role_id }}</div>
                            <div class="d-flex col align-items-baseline justify-content-start">
                                @if($item->role_id == "admin")
                                    <a href="{{ url('/users/' . $item->id . '/toadmin') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Admin jog elvétele</button></a>
                                @else
                                    <a href="{{ url('/users/' . $item->id . '/toadmin') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Admin jog adása</button></a>
                                @endif                                            
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection