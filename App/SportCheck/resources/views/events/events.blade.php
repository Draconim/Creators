@extends('home')

@section('content')
<div class="d-flex flex-column text-center">
    <div class="card d-flex mb-3 col-sm-10 align-self-center">
        <h5 class="card-header">Röplabda</h5>
        <div class="card-body">2022.03.19 14:00-18:00</div>
        <a href="{{ route('details') }}" class="stretched-link"></a>
    </div>
    
</div>
    
@endsection