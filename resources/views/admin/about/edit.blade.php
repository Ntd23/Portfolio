@extends('admin.app')
@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">Edit About</h4>
  </div>
@endsection
@section('content')
  <div class="container">
    <form class="row" action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $about->name }}">
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $about->email }}">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ $about->phone }}">
        @error('phone')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $about->address }}">
        @error('address')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col">
        <label class="form-label col-form-label font-weight-bold">Avatar</label>
        <input class="form-control" type="file" onchange="PreviewImage();" id="uploadImage" accept="image/*"
          name="avatar">
        <img id="uploadPreview" style="width: 100%" class="mt-6" src="{{ asset('storage/'. $about->avatar) }}">
        @error('avatar')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">Github</label>
        <input class="form-control" type="text" name="github_url" value="{{ $about->github_url }}">
        @error('github_url')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">Linkedin</label>
        <input class="form-control" type="text" name="linkedin_url" value="{{ $about->linkedin_url }}">
        @error('linkedin_url')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">Facebook</label>
        <input class="form-control" type="text" name="facebook_url" value="{{ $about->facebook_url }}">
        @error('facebook_url')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6 mt-4 m-auto pb-4 pt-4">
        <button type="submit" class="btn btn-block btn-success">Update About</button>
      </div>
    </form>
  </div>
@endsection


