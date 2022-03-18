@extends('admin.layouts.layout')
@section('body')
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Admins</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                @endif
                <form action="/admin/search" method="get">
                  @csrf
                  <label for="exampleDataList" class="form-label">Search</label>
                  <input type="search" name="search" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                </form>
                {{-- <input type="submit" value=""> --}}
                <datalist id="datalistOptions">
                  @foreach ($admins as $admin)
                    <option value="{{ $admin->name }}">
                  @endforeach
                </datalist>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Admin Name</th>
                      <th scope="col">Admin Email</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>
                          <form action="/admin/deleteAdmin/{{ $admin->id }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </table>
              </div>
                </div>
@endsection

