<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'message' => 'Tracking ID found!',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'Tracking ID not found.',
            ]);
        }
    }
}
