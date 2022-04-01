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
      <div class="d-flex h3 mb-0">
            Új rendezvény
      </div>
      <div class="d-flex btn btn-disabled" aria-hidden="true">   </div>
    </div>
    <div class="card-body">
        <form action="{{ url('events') }}" method="post">
          @csrf

          <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="col-8">
              <label for="name">Rendezvény neve</label>
              <input type="text" name="name" id="name" class="form-control mb-4">
            </div>
            <div class="col-8">
              <label for="desc">Leírás</label>
              <input type="text" name="desc" id="description" class="form-control mb-4">
            </div>
            <div class="col-8">
              <label for="date">Időpont</label>
              <input type="text" name="date" id="date" class="form-control mb-4" placeholder="YYYY-MM-DD ÓÓ:PP:MM">
            </div>
            <div class="col-8">
              <label for="dur">Időtartam</label>
              <input type="text" name="dur" id="duration" class="form-control mb-4" placeholder="ÓÓ:PP:MM">
            </div>
            <div class="col-8">
              <label for="checkin">Bejelentkezés ideje</label>
              <input type="text" name="checkin" id="check_in_time" class="form-control mb-2" placeholder="YYYY-MM-DD ÓÓ:PP:MM">
            </div>
            
            
            <input type="submit" value="Rendezvény mentése" class="btn btn-success btn-lg m-4 col-4">
            
          </div>
          <input type="hidden" name="code" id="code">

          
      </form>
    
    </div>
  </div>
</div>
@endsection