<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Sample Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .main {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .search {
            margin-right: 20px;
            padding-right: 200px;
            border-radius: 7px;
        }

        .links {
            margin-left: 150px;
            margin-top: 20px;
        }
    </style>
</head>

<body class="mb-4">
    <div class="p-4">
        <a class="btn btn-success m-4" href="{{ url('/customers/create') }}">Add Customer</a>
    </div>

    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession

    <div class="main">
        <form action="">
            <div class="form-group col-7 d-flex ">
                <input class="search" type="search" name="search" value="{{ $search }}"
                    placeholder="search here" id="" class="form-control">
                <button class="btn btn-primary">Search</button>
            </div>

        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Images</th>
                    <th>Date of Birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <div>

                                <img src="{{ asset('uploads/images/' . $customer->image) }}" width="50px"
                                    height="50px" alt="Customer Image">
                            </div>

                        </td>
                        <td>{{ $customer->dob }}</td>
                        <td>
                            @if ($customer->status == '1')
                                Active
                            @else
                                InActive
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('customer.edit', ['id' => $customer->id]) }}"><span
                                    class="badge badge-primary"></span>Edit</a>
                            <a href="{{ url('/customers/delete') }}/{{ $customer->id }}"><span
                                    class="badge badge-primary"></span>Delete</a>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </div>
    <div class="links">
        {{-- {{ $customers->links() }} --}}
    </div>

</body>

</html>
