@extends('admin.layouts.layout')
@section('body')
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Medicines</h2>
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
                  @foreach ($medicines as $medicine)
                    <option value="{{ $medicine->medicine_name }}">
                  @endforeach
                </datalist>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Medicine Name</th>
                      <th scope="col">Medicine Price</th>
                      <th scope="col">Date</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($medicines as $medicine)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td style="color: green">{{ $medicine->price }} pound</td>
                        <td>{{ $medicine->created_at }}</td>
                        <td>
                          <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" href="/admin/edit/{{ $medicine->id }}"> Edit</a>
                          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="background-color:#fafafa">
                                  <form action="/admin/edit/{{ $medicine->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Medicine Name</label>
                                          <input type="text" value="{{ $medicine->medicine_name }}" name="medicine_name" class="form-control" aria-describedby="emailHelp">
                                          @error('medicine_name')
                                            <div class="alert alert-danger text-center">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Medicine Price</label>
                                          <input type="number" value="{{ $medicine->price }}" name="price" class="form-control" aria-describedby="emailHelp">
                                          @error('price')
                                            <div class="alert alert-danger text-center">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <form action="/admin/delete/{{ $medicine->id }}" method="post">
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

