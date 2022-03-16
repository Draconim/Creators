@extends('events.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('events/' .$events->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$events->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$events->name}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$events->description}}" class="form-control"></br>

        <label>Date</label></br>
        <input type="text" name="date" id="date" value="{{$events->date}}" class="form-control"></br>

        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" value="{{$events->duration}}" class="form-control"></br>

        <label>Check-in time</label></br>
        <input type="text" name="check_in_time" id="check_in_time" value="{{$events->check_in_time}}" class="form-control"></br>
        


        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop