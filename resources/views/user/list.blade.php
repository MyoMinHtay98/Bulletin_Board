@extends('layouts.app')

@section('content')
        <div>
            <h1 class="main-hdr">USER LISTS</h1><br /><br />
            <div>
                <div class="form-group text-center">
                    {{ Form::open(['route' => 'user.search', 'method' => 'POST']) }}
                    <div class="form-inline text-center">
                        {{ Form::text('name', null, ['class' => 'form-inline', 'placeholder' => 'Search by name...']) }}
                        {{ Form::text('email', null, ['class' => 'form-inline', 'placeholder' => 'Search by email...']) }}
                        {{ Form::submit('Search', ['class' => 'btn btn-primary form-inline']) }}
                        <div>
                            {{ Form::radio('gender', 'm', false, ['id' => 'gender-m']) }}
                            {{ Form::label('gender-m', 'Male', ['class' => 'cyan']) }}
                            {{ Form::radio('gender', 'f', false, ['id' => 'gender-f']) }}
                            {{ Form::label('gender-f', 'Female', ['class' => 'purple']) }}
                        </div>
                        <div>
                            {{ Form::label('active', 'Active:', ['class' => 'green']) }}
                            {{ Form::checkbox('is_active[]', '1', false, ['id' => 'active']) }}
                            {{ Form::label('in_active', 'in-Active:', ['class' => 'red']) }}
                            {{ Form::checkbox('is_active[]', '0', false, ['id' => 'in_active']) }}
                        </div>
                    </div>
                    <br /><a class="btn btn-success" href="{{ route('user.register') }}">Register</a><br /><br />
                    {{ Form::close() }}
                </div>
                <table class="table table-bordered">
                    <thead class="alert-danger">
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Date of Birth</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Total Posts</th>
                            <th colspan="4" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="alert-warning">
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->gender == 'm')
                                        <span class="orange">{{ 'Male' }}</span>
                                    @else
                                        <span class="purple">{{ 'Female' }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->role == '0')
                                        <span class="green">{{ 'User' }}</span>
                                    @else
                                        <span class="red">{{ 'Admin' }}</span>
                                    @endif
                                </td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->hobby }}</td>
                                <td>{{ $user->address }}</td>
                                {{-- <td>{{ $user->posts->count() }}</td> --}}
                                <td><a class="btn btn-info" href="{{ route('user.details', $user->id) }}">Show</a>
                                </td>
                                <td><a class="btn btn-primary" href="{{ route('user.profileEdit.show', $user->id) }}">Update</a></td>
                                <td><a class="btn btn-danger" href="{{ route('user.delete', $user->id) }}">Delete</a>
                                </td>
                                {{-- <td><a class="btn btn-success" href="{{ route('user.change_password.show', $user->id) }}">Change
                                        Password</a>
                                </td> --}}
                            </tr>
                        @empty
                            <td colspan="9">There is no data</td>
                        @endforelse

                    </tbody>
                </table>
                <span class="text-center">

                    {{ $users->links() }}

                </span>
            </div>
        </div>
    @endsection
