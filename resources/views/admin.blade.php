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
                        <div endpoint="{{ route('delete.user', $user) }}" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $user['id'] }}"><i class="fa fa-trash"></i></div>
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
                  <input id="modal-input-id" name="id" type="text" class="form-control" id="inputid" placeholder="id">
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
@foreach ($users as $user)
<div class="modal fade" id="delete{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteUser" aria-hidden="true">
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
            <h5 class="modal-title" id="deleteUser">Hapus Data {{ $user['name'] }} ?</h5>
        </div>
        <form action="{{ route('delete.user', $user['id']) }}" method="post">
            @csrf
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

@endsection
