@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {{ Form::open(['route' => 'user.register', 'method' => 'POST', 'files' => 'true']) }}
                        <div class="form-group row">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            @error('name')
                                <p class="error-msg red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            {{ Form::label('file_path', 'Profile Picture', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::file('file_path', null, ['id' => 'file_path', 'class' => 'form-control', 'placeholder' => 'No file chosen']) }}
                            </div>
                            @error('file_path')
                                <p class="error-msg red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="ml-5">
                                <span class="ml-5">
                                    <span class="ml-5">
                                        <span class="ml-5">
                                            <span class="ml-3">
                                                <img class="ml-5" id="image"
                                                    src="{{ asset('uploads/') }}" width="200px"
                                                    height="100px" alt="Image">
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', null, ['class' => 'form-control']) }}
                            </div>
                            @error('email')
                                <p class="error-msg red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            {{ Form::label('password', 'Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('password')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('gender', 'Gender:', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            {{ Form::radio('gender', 'm', false, ['id' => 'gender-m']) }}
                            {{ Form::label('gender-m', 'Male') }}
                            {{ Form::radio('gender', 'f', false, ['id' => 'gender-f']) }}
                            {{ Form::label('gender-f', 'Female') }}
                        </div>
                        @error('gender')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('role', 'Role:', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::checkbox('role', '1', ['id' => 'role']) }}
                            </div>
                        </div>
                        @error('role')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('dob', 'Date of Birth', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::date('dob', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('dob')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('age', 'Age', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::number('age', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        @error('age')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('hobby', 'Hobby', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('hobby', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'cols' => 35,
                                ]) }}
                            </div>
                        </div>
                        @error('hobby')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row">
                            {{ Form::label('address', 'Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('address', null, [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'cols' => 35,
                                ]) }}
                            </div>
                        </div>
                        @error('address')
                            <p class="error-msg red">{{ $message }}</p>
                        @enderror
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Register', ['class' => 'btn btn-success form-inline']) }}
                                <a class="btn btn-primary" href="{{ route('user.list') }}">Back</a>
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
