

@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">

    <h4 class="card-title ml-2">About</h4>
    <a class="btn btn-sm btn-primary pr-4" href="{{ route('admin.about.new') }}"><i class="fa-solid fa-plus w-100"></i></a>
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
          <td>Name</td>
          <td>Emai</td>
          <td>Phone</td>
          <td>Address</td>
          <td>Avatar</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($abouts as $about)
          <tr>
            <input type="hidden" class="delete_id_about" value="{{ $about->id }}" >
            <td>{{ $about->name }}</td>
            <td>{{ $about->email }}</td>
            <td>{{ $about->phone }}</td>
            <td>{{ $about->address }}</td>
            <td><img src="{{ asset('storage/' . $about->avatar) }}" alt="" style="width: 200px; height: auto">
            </td>
            <td><a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-warning"><i
                  class="fa-regular fa-pen-to-square"></i></a></td>
            <td>
              <form action="{{ route('admin.about.delete', $about->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger btnDeleteAbout"><i class="fa-solid fa-trash-can"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
          @if (empty($about))
            <tr>
              <td colspan="7"><div class="card-footer text-muted text-center font-weight-bolder font-italic">
                No Records Found
              </div></td>
            </tr>
          @endif
      </tbody>
    </table>
  </div>
@endsection

@section('confirmDeleteAbout')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.btnDeleteAbout').click(function(e) {
      e.preventDefault();
      var deleteId = $(this).closest('tr').find('.delete_id_about').val();
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
              url: "about/delete/" + deleteId,
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


