@extends('admin.layouts.layout')
@section('body')
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Add Medicine</h2>
                @if (session()->has('message'))
                  <div class="alert alert-success text-center">{{session('message')}}</div>
                @endif
                <form action="/admin/add-medicine" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Medicine Name</label>
                      <input type="text" name="medicine_name" class="form-control" aria-describedby="emailHelp">
                      @error('medicine_name')
                        <div class="alert alert-danger text-center">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Medicine Price</label>
                      <input type="number" name="price" class="form-control" aria-describedby="emailHelp">
                      @error('price')
                        <div class="alert alert-danger text-center">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Medicine Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                        @error('photo')
                            <div class="alert alert-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
                </div>
@endsection

