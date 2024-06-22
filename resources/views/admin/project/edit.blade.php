@extends('admin.app')
@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">Edit Project</h4>
  </div>
@endsection
@section('content')
  <div class="container">
    <form class="row" action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $project->title }}">
        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">URL</label>
        <input type="text" class="form-control" name="url" value="{{ $project->url }}">
        @error('url')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-12">
        <label class="form-label col-form-label font-weight-bold">Image</label>
        <input class="form-control" type="file" onchange="PreviewImage();" id="uploadImage" accept="image/*"
          name="image">
        <img id="uploadPreview" style="width: 100%" class="mt-6" src="{{ asset('storage/'.$project->image) }}">
        @error('image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-12 mt-10">
        <div class="form-group">
          <label class="form-label col-form-label font-weight-bold">Description</label>
          <textarea class="form-control" name="descriptions" cols="15" placeholder="Leave a comment here">{{ $project->descriptions }}</textarea>
        </div>
        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col col-6 mt-4 m-auto pb-4 pt-4">
        <button type="submit" class="btn btn-block btn-success">Update Project</button>
      </div>
    </form>
  </div>
@endsection

