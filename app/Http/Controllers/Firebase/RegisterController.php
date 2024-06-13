<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Storage;

class RegisterController extends Controller
{
    protected $database;
    protected $storage;
    protected $tablename = 'Students';

    public function __construct(Database $database, Storage $storage)
    {
        $this->database = $database;
        $this->storage = $storage;
    }

    public function store(Request $request)
    {
        // Validate the request to ensure all required fields are present
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'starting_year' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'required|image|mimes:png|max:2048', // Adjust validation as necessary
        ]);

        // Check if the email already exists in the database
        $existingUser = $this->database->getReference($this->tablename)
            ->orderByChild('email')
            ->equalTo($request->email)
            ->getSnapshot()
            ->exists();

        if ($existingUser) {
            return redirect('/registerStudent')->with('error', 'A user with this email address already exists.');
        }

        // Generate a 6-digit random number and ensure it's unique
        do {
            $randomNumber = mt_rand(100000, 999999);
            $ref = $this->database->getReference("{$randomNumber}");
            $snapshot = $ref->getSnapshot();
        } while ($snapshot->exists());

        // Get the current date and time
        $currentDateTime = date('Y-m-d H:i:s');

        $postData = [
            'name' => $request->name,
            'major' => $request->major,
            'year' => $request->year,
            'starting_year' => $request->starting_year,
            'email' => $request->email,
            'last_attendance_time' => $currentDateTime,
            'standing' => "G",
            'total_attendance' => "0"
        ];

        // Upload image to Firebase Storage
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = "Images/{$randomNumber}." . $file->getClientOriginalExtension();
            $this->storage->getBucket()->upload(
                file_get_contents($file->getRealPath()),
                [
                    'name' => $filePath
                ]
            );

            // Add the image URL to the postData
            $imageReference = $this->storage->getBucket()->object($filePath);
            $postData['image_url'] = $imageReference->signedUrl(new \DateTime('2099-12-31')); // URL valid until 2099
        }

        // Set the data with the random number as the key
        $ref->set($postData);

        if ($ref) {
            return redirect('/home')->with('success', 'Registration Successful');
        } else {
            return redirect('/registerStudent')->with('error', 'Registration Failed');
        }
    }
}
