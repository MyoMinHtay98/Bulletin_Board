@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'user.search', 'method' => 'POST']) }}
    <div class="text-center">
        <h1 class="main-hdr">SEARCH RESULT</h1><br /><br />
        <a class="btn btn-primary" href="{{ route('user.list') }}">User Lists</a><br /><br />
    </div>
    @if ($result && $result != null)
        <table class="table table-bordered">
            <thead class="alert-info">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Date of Birth</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Hobby</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Total Posts</th>
                </tr>
            </thead>
            <tbody class="alert-warning">
                @foreach ($result as $user)
                    <tr>
                        <td> {{ $user['name'] }} </td>
                        <td> {{ $user['email'] }} </td>
                        <td>
                            @if ($user->gender == 'm')
                                {{ 'Male' }}
                            @else
                                {{ 'Female' }}
                            @endif
                        </td>
                        <td>
                            @if ($user->role == '0')
                                {{ 'User' }}
                            @else
                                {{ 'Admin' }}
                            @endif
                        </td>
                        <td> {{ $user['dob'] }} </td>
                        <td> {{ $user['age'] }} </td>
                        <td> {{ $user['hobby'] }} </td>
                        <td> {{ $user['address'] }} </td>
                        {{-- <td> {{ $user['total_posts'] }} </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ Form::close() }}

@endsection
