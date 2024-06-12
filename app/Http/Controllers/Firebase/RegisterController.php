<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class RegisterController extends Controller
{
    protected $database;
    protected $tablename = 'Students';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function store(Request $request)
    {
        $timezone = date_default_timezone_get();

        // Generate a 6-digit random number and ensure it's unique
        do {
            $randomNumber = mt_rand(100000, 999999);
            $ref = $this->database->getReference("{$randomNumber}");
            $snapshot = $ref->getSnapshot();
        } while ($snapshot->exists());

        $currentDateTime = date('Y-m-d H:i:s');

        $postData = [
            'last_attendance_time' => $currentDateTime,
            'major' => $request->major,
            'name' => $request->name,
            'standing' => "G",
            'starting_year' => $request->starting_year,
            'total_attendance' => "0",
            'year' => $request->year,
        ];

        // Set the data with the random number as the key
        $ref->set($postData);

        if ($ref) {
            return redirect('/testing')->with('success', 'Registration Successful');
        } else {
            return redirect('/registerStudent')->with('error', 'Registration Failed');
        }
    }
}
