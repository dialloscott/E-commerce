@extends('admin.dashboard')

@section('body')
    <div class="h2 text-center">Admin Dashboard</div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header info-color-dark text-white"><i class="material-icons">shopping_cart</i>&nbsp;Orders
                </div>
                <div class="card-block">
                    @foreach($orders as $order)
                        @include('admin.partials.orders')
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header success-color text-white"><i class="material-icons">group</i>&nbsp;Users</div>
                <div class="card-block" style="height: 300px; overflow: auto;">
                    <table class="table-hover table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Joined</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td><i class="material-icons text-danger">delete_forever</i></td>
                                <td>{{ $u->name }} {{ $u->email }}</td>
                                <td>Since {{ $u->created_at->format('d, M Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop