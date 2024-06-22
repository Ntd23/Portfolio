@extends('admin.app')
@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">New Education</h4>
  </div>
@endsection
@section('content')
  <div class="container">
    <form class="row" action="{{ route('admin.edu.create') }}" method="POST">
      @csrf
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">School</label>
        <input type="text" class="form-control" name="school">
        @error('school')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Degree</label>
        <input type="text" class="form-control" name="degree">
        @error('degree')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Major</label>
        <input type="text" class="form-control" name="major">
        @error('major')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">Objective</label>
        <input type="text" class="form-control" name="objective">
        @error('objective')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col">
        <label class="form-label col-form-label font-weight-bold">Start At</label>
        <input class="form-control" type="date" name="start_at">
        @error('start_at')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col  col-6">
        <label class="form-label col-form-label font-weight-bold">End At</label>
        <input class="form-control" type="date" name="end_at">
        @error('end_at')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6 mt-4 m-auto pb-4 pt-4">
        <button type="submit" class="btn btn-block btn-success">New Education</button>
      </div>
    </form>
  </div>
@endsection
