@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h3>Date Range</h3>
        <form method="GET" class="mb-3" action="filter">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="dateFrom">From:</label>
                    <input type="date" id="dateFrom" name="dateFrom" class="form-control" placeholder="Date From">
                </div>
                <div class="col-md-6">
                    <label for="dateTo">To:</label>
                    <input type="date" id="dateTo" name="dateTo" class="form-control" placeholder="Date To">
                </div>
            </div>

            <select id="userSelect" name="userSelect" class="form-control my-3" >
                <option value="" disabled selected>Select User</option>
                @foreach ($users as $user )
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach

            </select>


            <div class="row justify-content-center">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Room Number</th>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr data-user="John Doe">
                        <td>{{ $order->user->room->name ?? "default" }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <ul class="list-group">


                                @foreach ($order->items as $item)
                                    <li class="list-group-item list-group-item-warning mb-2">
                                        {{ $item->product_name }}
                                    </li>
                                @endforeach

                            </ul>

                        </td>

                        <td>
                            <ul class="list-group">
                                @foreach ($order->items as $item)
                                    <li class="list-group-item list-group-item-success mb-2">
                                        {{ $item->price }}
                                    </li>
                                @endforeach
                            </ul>

                        </td>

                        <td>

                            <ul class="list-group">
                                @foreach ($order->items as $item)
                                    <li class="list-group-item list-group-item-dark mb-2">
                                        {{ $item->quantity }}
                                    </li>
                                @endforeach
                            </ul>

                        </td>

                <td>

                    <ul class="list-group">

                        <li class="list-group-item list-group-item-danger mb-2">
                            @php
                                $totalPrice = $order->items->sum(function ($item) {
                                    return $item->price * $item->quantity;
                                });

                            @endphp
                            {{ $totalPrice }}

                        </li>

            </ul>
                </td>




                <td><span class="badge badge-warning">{{ $order->order_status }}</span></td>
                <td>
                     @if ($order->order_status=="Working_On_It")
                    <form action="{{ route('checks.update',$order->id) }}" method="post">
                        @csrf
                        @method('put')
                    <button class="btn btn-primary btn-sm">Finished</button>
                </form>


                @endif

                @if ($order->order_status=="delivered")

                <form action="{{ route('checks.update',$order->id) }}" method="post">
                    @csrf
                    @method('put')
                <button class="btn btn-primary btn-sm" disabled>Finished</button>
            </form>
             @endif

                </td>
                </tr>
                @endforeach


            </tbody>


        </table>
    </div>


    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
        }
    </style>
@endsection
