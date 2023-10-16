@extends('layouts.dashboard')

@section('content')

<div class="container mt-4">
    <h3>Date Range</h3>
    <form method="post" class="mb-3">
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

        <select id="userSelect" name="userSelect" class="form-control my-3">
            <option value="">Please select user</option>
            <option value="John Doe">John Doe</option>
            <option value="Jane Smith">Jane Smith</option>
            <option value="Ahmed Samir">Ahmed Samir</option>
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
            <tr data-user="John Doe">
                <td rowspan="4">101</td>
                <td rowspan="4">John Doe</td>
                <td rowspan="4">2023-10-01</td>
                <td>Product 1</td>
                <td>$10.00</td>
                <td>2</td>
                <td rowspan="4">$65.00</td>
                <td rowspan="4"><span class="badge badge-warning">Working on it</span></td>
                <td rowspan="4">
                    <button class="btn btn-primary btn-sm">Finished</button>
                </td>
            </tr>
            <tr data-user="John Doe">
                <td>Product 2</td>
                <td>$15.00</td>
                <td>3</td>
            </tr>
            <tr data-user="John Doe">
                <td>Product 3</td>
                <td>$25.00</td>
                <td>4</td>
            </tr>
            <tr data-user="John Doe">
                <td>Product 4</td>
                <td>$12.00</td>
                <td>5</td>
            </tr>
            <tr data-user="Jane Smith">
                <td rowspan="4">102</td>
                <td rowspan="4">Jane Smith</td>
                <td rowspan="4">2023-10-06</td>
                <td>Product 5</td>
                <td>$30.00</td>
                <td>3</td>
                <td rowspan="4">$210.00</td>
                <td rowspan="4"><span class="badge badge-success">Delivered</span></td>
                <td rowspan="4">
                    <button class="btn btn-primary btn-sm" disabled>Finished</button>
                </td>
            </tr>
            <tr data-user="Jane Smith">
                <td>Product 6</td>
                <td>$18.00</td>
                <td>2</td>
            </tr>
            <tr data-user="Jane Smith">
                <td>Product 7</td>
                <td>$22.00</td>
                <td>3</td>
            </tr>
            <tr data-user="Jane Smith">
                <td>Product 8</td>
                <td>$15.00</td>
                <td>5</td>
            </tr>
            <tr data-user="Ahmed Samir">
                <td rowspan="4">103</td>
                <td rowspan="4">Ahmed Samir</td>
                <td rowspan="4">2023-10-11</td>
                <td>Product 9</td>
                <td>$30.00</td>
                <td>3</td>
                <td rowspan="4">$210.00</td>
                <td rowspan="4"><span class="badge badge-success">Delivered</span></td>
                <td rowspan="4">
                    <button class="btn btn-primary btn-sm" disabled>Finished</button>
                </td>
            </tr>
            <tr data-user="Ahmed Samir">
                <td>Product 10</td>
                <td>$18.00</td>
                <td>2</td>
            </tr>
            <tr data-user="Ahmed Samir">
                <td>Product 11</td>
                <td>$22.00</td>
                <td>3</td>
            </tr>
            <tr data-user="Ahmed Samir">
                <td>Product 12</td>
                <td>$15.00</td>
                <td>5</td>
            </tr>
        </tbody>
    </table>
</div>


<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #ddd;
    }
</style>

@endsection
