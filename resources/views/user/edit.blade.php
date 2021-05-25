@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-5">
                    <div class="card-header">Add Country</div>
                    <div class="card-body">
                        <form id="CountryForm" role="form" method="POST"
                              action="{{route('save-country')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Country</label>
                                    <input type="text" name="country_name" required>
                                    <button type="submit" class="btn btn-primary"><span>Add Country</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{ isset($user) ? "Edit User" : "Create User" }}</div>

                    <div class="card-body">
                        <form id="itemFrom" role="form" method="POST"
                              action="{{ isset($user) ? route('user.update',$user->id) : route('user.create') }}">
                            @csrf
                            @isset($user)
                                @method('PUT')
                            @endisset

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $user->name ?? '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ $user->email ?? '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" required>
                                </div>

                                <div class="form-group">
                                    @isset($country[0])
                                        <label for="type">Country</label>
                                        <select name="country_id" required>
                                            @forelse ($country as $item)
                                                <option value="{{$item->id}}">{{$item->country_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    @else
                                        <span class="text-small text-danger">Add Country First</span>
                                    @endisset
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($user)
                                        <i class="fas fa-arrow-circle-up"></i>
                                        <span>Update</span>
                                    @else
                                        <i class="fa fa-plus-circle"></i>
                                        <span>Create</span>
                                    @endisset
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
