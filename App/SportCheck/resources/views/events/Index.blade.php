@extends('events.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contacts</div>
                    @if(isset($message))
                    <div class="card-header">{{ $message }}</div>
                    @endif
                    <div class="card-body">
                        <a href="{{ url('/events/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Date</th>
                                        {{-- <th>Duration</th>
                                        <th>Check-in time</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        {{-- <td>{{ $item->description }}</td> --}}
                                        <td>{{ $item->date }}</td>
                                        {{-- <td>{{ $item->duration }}</td>
                                        <td>{{ $item->check_in_time }}</td> --}}
 
                                        <td>
                                            <a href="{{ url('/events/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection