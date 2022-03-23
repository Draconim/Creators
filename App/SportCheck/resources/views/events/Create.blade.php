@extends('home')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('events') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>

        <label>Date</label></br>
        <input type="text" name="date" id="date" class="form-control"></br>

        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>

        <label>Check-in time</label></br>
        <input type="text" name="check_in_time" id="check_in_time" class="form-control"></br>
       
        <input type="hidden" name="code" id="code">

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection