@extends('layouts.app')

@section('content')
    <!-- Styles -->
    <link href="{{ asset('css/edit-profile.css') }}" rel="stylesheet">

    <!-- Script -->
    <script src="{{ asset('js/preview-profile.js') }}"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   
                    <div class="card-header">{{ __('Profile Edit') }}</div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'user.profileEdit', 'method' => 'POST', 'files' => 'true']) }}
                        {{-- {{ Form::hidden('id', $user->id) }} --}}
                        <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            {{ Form::label('email', 'Email Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            {{ Form::label('file_path', 'Profile Picture', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::file('file_path', null, ['id' => 'file_path', 'class' => 'form-control', 'placeholder' => 'No file chosen']) }}
                            </div>
                        </div>
                        @error('file_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            <div class="ml-5">
                                <span class="ml-5">
                                    <span class="ml-5">
                                        <span class="ml-5">
                                            <span class="ml-3">
                                                <img class="ml-5" id="image"
                                                    src="{{ asset('uploads/' . $user->file_path) }}" width="200px"
                                                    height="100px" alt="Image">
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('role', 'Role', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('role', ['0' => 'User', '1' => 'Admin'], $user->role, ['class' => 'form-control', 'placeholder' => 'Select Role']) }}
                            </div>
                        </div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row ml-5">
                            <div class="ml-5">
                                <p class="ml-3">{{ Form::label('gender', 'Gender', ['class' => 'ml-5']) }}</p>
                            </div>
                            <div class="col-md-6 ml-3">
                                {{ Form::radio('gender', 'm', false, ['id' => 'gender-m', $user['gender'] == 'm' ? 'checked' : '']) }}
                                {{ Form::label('gender-m', 'Male') }}
                                {{ Form::radio('gender', 'f', false, ['id' => 'gender-f', $user['gender'] == 'f' ? 'checked' : '']) }}
                                {{ Form::label('gender-f', 'Female') }}
                            </div>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            {{ Form::label('dob', 'Date of Birth', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::date('dob', $user->dob, ['id' => 'dob', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            {{ Form::label('address', 'Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('address', $user->address, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'cols' => 35,
                                ]) }}
                            </div>
                        </div>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row">
                            {{ Form::label('hobby', 'Hobby', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('hobby', $user->hobby, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'cols' => 35,
                                ]) }}
                            </div>
                        </div>
                        @error('hobby')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                <a type="button" class="btn btn-success" href="/user/changePassword">
                                    {{ __('Change Password') }}
                                </a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file_path").change(function() {
            readURL(this);
        });
    </script>
@endsection
