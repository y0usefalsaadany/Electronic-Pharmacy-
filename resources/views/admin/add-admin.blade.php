@extends('admin.layouts.layout')
@section('body')
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Add Admin</h2>
                @if (session()->has('message'))
                 <div class="alert alert-success text-center">{{session('message')}}</div>
                @endif
                <form action="/admin/add-admin" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Admin Name</label>
                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Admin Email</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                  </div>
                      <div class="mb-3">
                          <label for="formPassword" class="form-label">password</label>
                          <input class="form-control" name="password" type="password" id="formFile">
                      </div>
                      <input type="hidden" name="is_admin" value="1" class="form-control" aria-describedby="emailHelp">
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
                </div>
@endsection

