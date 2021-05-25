@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User List</div>
                    <div class="text-right p-3">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
                    </div>
                    @isset($users[0])
                    <div class="card-body">
                        <table class="table table-striped table-inverse">
                            <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->country_name ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('user.edit',$user->id) }}">Edit</a>
                                        |
                                        <a href="{{ route('user.delete',$user->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
