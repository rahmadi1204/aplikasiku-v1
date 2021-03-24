@extends('layouts/app')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row m-1">
        <div class="card col-xl-12">
            <div class="card-header">
                <div class="card-title">
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                    <div class="dot3"></div>
                </div>
                <div class="card-tools">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createCategory">+ Tambah Category</button>
                    {{--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>  --}}
                </div>
                <h5 style="text-align: center" >Daftar Category</h5>
            </div>
              <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="category" id="select-category" class="form-control">
                            @foreach ($categories as $category)
                           <option value="{{ $category['name'] }}"><i class="fa fa-link"></i> {{ $category['name'] }}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
              </div>
        </div>
      </div>
        <div class="row m-1">
            <div class="card card-default col-xl-12">
              <div class="card-header">
                <div class="card-title">
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                    <div class="dot3"></div>
                </div>
                <div class="card-tools">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createProduct">+ Tambah Product</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Category</th>
                          <th>Nama Product</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                          @php
                              $i=1;
                          @endphp
                          @foreach ($products as $product)
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product['category_id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['harga'] }}</td>
                            <td>{{ $product['stok'] }}</td>
                            <td>
                              <div class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $product['id'] }}"><i class="fa fa-edit"></i></div>
                              <div class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $product['id'] }}"><i class="fa fa-trash"></i></div>
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
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
{{--  create category  --}}
  <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="createCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="card-title">
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
            </div>
          <h5 class="modal-title" id="create">Tambah Kategori</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('create.category') }}" method="post">
                @csrf
              <div class="form-group row">
                <label for="inputuser" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input name="name" type="text" class="form-control" id="inputuser" placeholder="Category's Name" value="{{ old('name') ?? '' }}">
                </div>
              </div>
              @error('name')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror

            </div>
            <div class="modal-footer">
                <button type="dismiss" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  {{--  Create Product  --}}
  <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="card-title">
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="dot3"></div>
            </div>
          <h5 class="modal-title" id="createProduct">Tambah Product</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('create.product') }}" method="post">
                @csrf
              <div class="form-group row">
                <label for="inputproduct" class="col-sm-4 col-form-label">Nama Barang</label>
                <div class="col-sm-8">
                  <input name="name" type="text" class="form-control" id="inputProductName" placeholder="Nama Product" value="{{ old('name') ?? '' }}">
                </div>
              </div>
              @error('name')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group row">
                <label for="inputproduct" class="col-sm-4 col-form-label">Kategori</label>
                <div class="col-sm-8">
                    <select name="" id="" class="form-control">
                        @foreach ($categories as $category)
                       <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                       @endforeach
                    </select>
                </div>
            </div>
              <div class="form-group row">
                <label for="inputproduct" class="col-sm-4 col-form-label">Harga Barang</label>
                <div class="col-sm-8">
                  <input name="harga" type="number" class="form-control" id="inputProductHarga" placeholder="Harga Product" value="{{ old('harga') ?? '' }}">
                </div>
              </div>
              @error('harga')
              <div class="text-danger text-sm">
                  {{ $message }}
              </div>
              @enderror
              <div class="form-group row">
                <label for="inputproduct" class="col-sm-4 col-form-label">Jenis Satuan</label>
                <div class="col-sm-8">
                    <select class="form-control">
                        <option value="Pcs">Pcs</option>
                        <option value="Meter">Meter</option>

                    </select>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="dismiss" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
