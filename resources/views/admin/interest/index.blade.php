@extends('admin.app')

@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">

    <h4 class="card-title ml-2">Interest</h4>
    <a class="btn btn-sm btn-primary pr-4" href="{{ route('admin.interest.new') }}"><i class="fa-solid fa-plus w-100"></i></a>
  </div>
@endsection

@section('content')
  <div class="container p-6">
    @if (session('success'))
      <div class="alert alert-success mt-2">
        {{ session('success') }}
      </div>
    @endif
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <td>Interest</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($interests as $interest)
          <tr>
            <input type="hidden" class="delete_id_interest" value="{{ $interest->id }}" >
            <td>{{ $interest->descriptions }}</td>
            <td><a href="{{ route('admin.interest.edit', $interest->id) }}" class="btn btn-sm btn-warning"><i
                  class="fa-regular fa-pen-to-square"></i></a></td>
            <td>
              <form action="{{ route('admin.interest.delete', $interest->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger btnDeleteInterest"><i class="fa-solid fa-trash-can"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
          @if (empty($interest))
            <tr>
              <td colspan="3"><div class="card-footer text-muted text-center font-weight-bolder font-italic">
                No Records Found
              </div></td>
            </tr>
          @endif
      </tbody>
    </table>
  </div>
@endsection

@section('confirmDeleteInterest')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.btnDeleteInterest').click(function(e) {
      e.preventDefault();
      var deleteId = $(this).closest('tr').find('.delete_id_interest').val();
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to restore this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var data = {
              "_token": $('input[name=_token]').val(),
              "id": deleteId,
            };
            $.ajax({
              type: "DELETE",
              url: "interest/delete/" + deleteId,
              data: data,
              success: function(response) {
                swal(response.status, {
                    icon: "success",
                  })
                  .then((result) => {
                    location.reload();
                  })
              },
            })
          }
        });
    });
  });
</script>
@endsection


