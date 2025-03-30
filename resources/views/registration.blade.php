<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Listing Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <h2>Room Listing Form</h2>
    <form action="{{ route('room.registration') }}" method="POST">
        @csrf
        <!-- <label for="room_id">Room ID:</label> -->
        <!-- <input type="text" id="room_id" name="room_id"> -->

        <!-- <label for="owner_id">Owner ID:</label> -->
        <!-- <input type="text" id="owner_id" name="owner_id"> -->

        <label for="title">Title:</label>
        <input type="text" id="title" name="title">

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="3"></textarea>

        <label for="price">Price (₹):</label>
        <input type="number" id="price" name="price">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location">

        <label for="amenities">Amenities (comma separated):</label>
        <input type="text" id="amenities" name="amenities">

        <label for="available">Available:</label>
        <select id="available" name="available">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <!-- <label for="is_verified">Verified:</label>
        <select id="is_verified" name="is_verified">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select> -->

        <!-- <label for="created_at">Created At:</label> -->
        <!-- <input type="datetime-local" id="created_at" name="created_at"> -->

        <button type="submit">Submit</button>
    </form>

</body>
</html>

