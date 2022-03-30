@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contacts</div>
                    <a href="{{ url('/users') }}" title="X"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> X</button></a>                                            
                    <form method="GET" action="{{url('/users/search')}}">

                        <input type="search" name="userSearch" placeholder="Keresés">
                        <button type="submit">Keresés</button>
                    </form>
                    @if(isset($message))
                    <div class="card-header">{{ $message }}</div>
                    @endif
                    <div class="card-body">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->role_id }}</td>
                                        <td>
                                            <a href="{{ url('/users/' . $item->id . '/toadmin') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Admin jog adása/elvétele</button></a>                                            
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