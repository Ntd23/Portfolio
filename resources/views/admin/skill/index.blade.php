@extends('admin.app')

@section('card-title')
  <div class="container d-flex justify-content-between align-items-sm-start">
    <h4 class="card-title ml-2">Skill</h4>
    <a class="btn btn-sm btn-primary pr-4" href="{{ route('admin.skill.new') }}"><i class="fa-solid fa-plus w-100"></i></a>
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
          <td>Languages & Tools</td>
          <td>Databases</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($skills as $skill)
          <tr>
            <input type="hidden" class="delete_id_skill" value="{{ $skill->id }}">
            <td>{{ $skill->languages_tools }}</td>
            <td>{{ $skill->databases }}</td>
            </td>
            <td><a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a></td>
            <td>
              <form action="{{ route('admin.skill.delete', $skill->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger btnDeleteSkill"><i class="fa-solid fa-trash-can"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        @if (empty($skill))
            <tr>
              <td colspan="8"><div class="card-footer text-muted text-center font-weight-bolder font-italic">
                No Records Found
              </div></td>
            </tr>
          @endif
      </tbody>
    </table>
  </div>
@endsection

@section('confirmDeleteSkill')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.btnDeleteSkill').click(function(e) {
      e.preventDefault();
      var deleteId = $(this).closest('tr').find('.delete_id_skill').val();
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
              url: "skill/delete/" + deleteId,
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


