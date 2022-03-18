@extends('admin.layouts.layout')
@section('body')
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Orders</h2>
                @if (session()->has('message'))
                  <div class="alert alert-success text-center">{{session('message')}}</div>
                @endif
                <label for="exampleDataList" class="form-label">Search</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                  <option value="01098764376">
                  <option value="01545181114">
                  <option value="01015481547">
                  <option value="01011411111">
                </datalist>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Medicine Name</th>
                      <th scope="col">Person Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $order->medicine_name }}</td>
                        <td>{{ $order->person_name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                          <form action="/admin/delete-order/{{ $order->id }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Done</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </table>
              </div>
                </div>
@endsection

