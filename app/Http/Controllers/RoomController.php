<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController
{
    public function roomRegistration()
    {
        return view('registration');
    }

    public function roomRegisterd(Request $req)
    {
        // var_dump($req);
        // Validation
        $roomDetails = $req->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'location' => 'required|string|max:255',
                'amenities' => 'nullable|string',
                'available' => 'required|in:yes,no',
            ],
            [
                'title.required' => 'Title is Required!!',
                'price.required' => 'Price is Required!!',
                'price.numeric' => 'Price must be a number!!',
                'location.required' => 'Location is Required!!',
                'available.required' => 'Availability is Required!!'
            ]
        );

        // Room Creation
        $room = Room::create([
            // 'owner_id' => Auth::id()? Auth::id() : null, // Logged-in user ko owner banayenge
            'title' => $roomDetails['title'],
            'description' => $req->input('description')??null,
            'price' => $roomDetails['price'],
            'location' => $roomDetails['location'],
            'available' => $roomDetails['available'] === 'yes' ? true : false, // Convert 'yes'/'no' to boolean
            'amenities' => json_encode(explode(',', $req->input('amenities'))), // Convert comma-separated string to JSON
        ]);

        // Success/Error Handling
        if ($room) {
            echo "<script>alert('Successfull!!1...'); 
            window.location.href='/registration'</script>";
            return redirect()->back()->with('success', 'Room Registered Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to Register Room!');
        }
    }
}
