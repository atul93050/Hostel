<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Registration Form</h2>
        <form action="{{ route('submit.register') }}" method="POST">
            @csrf

            <label for="role">Role:</label>
            <input type="text" id="role" name="role">

            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <label for="password_confirmation"></label>
            <input type="password" id="password_confirmation" name="password_confirmation">

            <button type="submit">Submit</button>
        </form>
    </div>

</body>

</html>