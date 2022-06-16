@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-6 text-center">
              <label for="">Profile Image</label>
              <img src="{{ asset('uploads/' . $user->file_path) }}" width="220px" height="160px" alt="Image">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-6">
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->name}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Role') }}</label>
                @if($user->role == '0')
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">User</i>
                </label>
                @else
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">Admin</i>
                </label>
                @endif
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Email') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->email}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Gender') }}</label>
                @if($user->gender == 'm')
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">Male</i>
                </label>
                @else
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">Female</i>
                </label>
                @endif
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Date of Birth') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{date('Y/m/d', strtotime($user->dob))}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Hobby') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->hobby}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Address') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->address}}</i>
                </label>
              </div>
              <div class="">
                <a type="button" class="btn btn-primary mt-5" href="{{ route('user.profileEdit') }}">
                  {{ __('Edit Profile') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection