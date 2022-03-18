@extends('events.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contacts</div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Check-in time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>{{ $events->id }}</td>
                                        <td>{{ $events->name }}</td>
                                        <td>{{ $events->description }}</td>
                                        <td>{{ $events->date }}</td>
                                        <td>{{ $events->duration }}</td>
                                        <td>{{ $events->check_in_time }}</td>
 
                                        <td>
                                            
                                            <a href="{{ url('/events/' . $events->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/events' . '/' . $events->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection