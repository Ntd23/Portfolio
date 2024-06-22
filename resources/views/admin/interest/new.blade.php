@extends('admin.app')
@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">New Interest</h4>
  </div>
@endsection
@section('content')
  <div class="container">
    <form class="row" action="{{ route('admin.interest.create') }}" method="POST">
      @csrf
      <div class="col col-12 mt-10">
        <div class="form-group">
          <label class="form-label col-form-label font-weight-bold">Description</label>
          <textarea class="form-control" name="descriptions" cols="15" placeholder="Leave a comment here"></textarea>
        </div>
        @error('descriptions')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col col-6 mt-4 m-auto pb-4 pt-4">
        <button type="submit" class="btn btn-block btn-success">New Interest</button>
      </div>
    </form>
  </div>
@endsection
