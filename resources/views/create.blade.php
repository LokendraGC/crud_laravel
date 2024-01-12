<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .gen {
            display: flex;
            gap: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>{{ $title }}</h2>
        <form action="{{ url('/customers/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">address:</label>
            <input type="address" id="address" name="address" required>

            <label for="email">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="gender">Gender:</label>
            <div class="gen" @required(true)>
                <div>
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="other" value="other">

                    <label for="others">Others</label>
                </div>
            </div>

            {{-- <select id="gender" name="gender" required>
        <option value="male">Male</option>
        {{$customer->gender == 'male'? 'checked':'' }}
        <option value="female">Female</option>
        {{$customer->gender == 'female'? 'checked':'' }}

        <option value="other">Other</option>
        {{$customer->gender == 'other'? 'checked':'' }}

      </select> --}}

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" re required>


            <div class="container">
                <div class="form-group mt-4">
                    <label for="">Upload the file</label>
                    <input type="file" name="image" id="image" class="form-control" placeholder=""
                        aria-describedby="helpId">
                        <button type="submit">Submit</button>
                    </div>
                </div>
        </form>
    </div>

</body>

</html>
