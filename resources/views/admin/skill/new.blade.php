@extends('admin.app')
@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">New Skill</h4>
  </div>
@endsection
@section('content')
  <div class="container">
    <form class="row" action="{{ route('admin.skill.create') }}" method="POST">
      @csrf
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Languages & Tools</label>
        <input type="text" class="form-control" name="languages_tools">
        @error('languages_tools')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6">
        <label class="form-label col-form-label font-weight-bold">Databases</label>
        <input type="text" class="form-control" name="databases">
        @error('databases')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6 mt-4 m-auto pb-4 pt-4">
        <button type="submit" class="btn btn-block btn-success">New Skill</button>
      </div>
    </form>
  </div>
@endsection
