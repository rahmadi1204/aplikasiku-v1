@extends('layouts/app')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-default col-md-12">
        <div class="card-header">
          <div class="card-title">
              <div class="dot1"></div>
              <div class="dot2"></div>
              <div class="dot3"></div>
          </div>
          <div class="card-tools">
              <button class="btn btn-outline-primary" data-toggle="modal" data-target="#create">+ Tambah</button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($users as $user)
                    <tr class="data-row">
                      <td>{{ $i }}</td>
                      <td class="username">{{ $user['username'] }}</td>
                      <td class="name">{{ $user['name'] }}</td>
                      <td  class="email">{{ $user['email'] }}</td>
                      <td>
                          <div class="row ml-1">
                            <div class="btn btn-outline-success btn-sm mr-1" id="edit-item" data-id="{{ $user->id }}"><i class="fa fa-edit"></i></div>
                        </form>
                        <div class="btn btn-outline-danger btn-sm mr-1" id="delete-item" data-delete-id="{{ $user->id }}" data-delete-name="{{ $user->name }}"><i class="fa fa-trash"></i></div>
                          </div>
                      </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

{{--  add  --}}
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <div class="card-title">
                  <div class="dot1"></div>
                  <div class="dot2"></div>
                  <div class="dot3"></div>
              </div>
            <h5 class="modal-title" id="create">Tambah User</h5>
          </div>
          <div class="modal-body">
              <form action="{{ route('create.user') }}" method="post">
                  @csrf
                <div class="form-group row">
                  <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input name="username" type="text" class="form-control" id="inputusername" placeholder="username">
                  </div>
                </div>
                @error('username')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group row">
                  <label for="inputuser" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="inputuser" placeholder="user">
                  </div>
                </div>
                @error('user')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                @error('email')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group row">
                  <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="passwordCreated" placeholder="password">
                  </div>
                </div>
                @error('password')
                <div class="text-danger text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="row mt-3">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember" onclick="showPassword()">
                      <label for="remember">
                       Show Password
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Create</button>
              </div>
          </form>
        </div>
      </div>
    </div>

  {{--  update  --}}
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="card-title">
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
            </div>
          <h5 class="modal-title" id="editUser">Edit User</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('update.user')}}" method="post">
                @csrf

              <div class="form-group row">
                <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input id="modal-input-id" name="id" type="hidden" class="form-control" placeholder="id">
                  <input id="modal-input-username" name="username" type="text" class="form-control" id="inputusername" placeholder="username">
                </div>
              </div>
              @error('username')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group row">
                <label for="inputuser" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input id="modal-input-name" name="name" type="text" class="form-control" id="inputuser" placeholder="user">
                </div>
              </div>
              @error('user')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input id="modal-input-email" name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              @error('email')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group row">
                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input name="password" type="password" class="form-control" id="inputpassword" placeholder="password">
                </div>
              </div>
              @error('password')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              {{--  <div class="row mt-3">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" onclick="showPassword()">
                    <label for="remember">
                     Show Password
                    </label>
                  </div>
                </div>
              </div>  --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{--  delete  --}}

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="card-title">
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
            </div>
        </div>
        <div class="modal-body">
            <form action="{{ route('delete.user')}}" method="post">
                @csrf
            <h5 class="modal-title" id="deleteUser">Yakin Hapus Data <input type="text" class="border-0 text-danger" id="modal-delete-name"></h5>
            <input id="modal-delete-id" name="id" type="hidden" class="form-control">
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
{{--  User Edit  --}}
<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#edit-item", function() {
          $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

          var options = {
            'backdrop': 'static'
          };
          $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
          var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
          var row = el.closest(".data-row");

          // get the data
          var id = el.data('id');
          var name = row.children(".name").text();
          var username = row.children(".username").text();
          var email = row.children(".email").text();

          // fill the data in the input fields
          $("#modal-input-id").val(id);
          $("#modal-input-name").val(name);
          $("#modal-input-username").val(username);
          $("#modal-input-email").val(email);

        })

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
          $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
          $("#edit-form").trigger("reset");
        })
      })
</script>
{{--  Delete User  --}}
<script>
    $(document).ready(function() {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#delete-item", function() {
          $(this).addClass('delete-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

          var options = {
            'backdrop': 'static'
          };
          $('#delete-modal').modal(options)
        })

        // on modal show
        $('#delete-modal').on('show.bs.modal', function() {
          var el = $(".delete-item-trigger-clicked"); // See how its usefull right here?
          var row = el.closest(".data-row");

          // get the data
          var id = el.data('delete-id');
          var name = el.data('delete-name');

          // fill the data in the input fields
          $("#modal-delete-id").val(id);
          $("#modal-delete-name").val(name);

        })

        // on modal hide
        $('#delete-modal').on('hide.bs.modal', function() {
          $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
          $("#delete-form").trigger("reset");
        })
      })
</script>
@endsection
