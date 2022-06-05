<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
      public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|min:4|max:55',
            'email' => 'email|required',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required',
            'role' => 'required',
            'date_naissance' => 'required'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone'],
            'role' => $fields['role'],
            'date_naissance' => $fields['date_naissance'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'status' => 200,
            'user' => $user,
            'token' => $token,
            'message' => 'User créé avec succès'
        ];

        return response()->json($response, 200);
    }


    public function findAll(Request $request)
    {
        try {
            $user = User::all();
            return response()->json($user);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function findCount()
    {
        $salle = User::count();
        return response()->json($salle);
    }

    public function updatePicture(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:user,id,'.$request->user()->id,
                'picture' => 'nullable|image'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'data' => []], 422);
            } else {
                $user = User::find($request->user()->id);
                $user->name = $request->name;
                $user->email = $request->email;

                if ($request->picture && $request->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('image'), $file_name);
                    $path = "public/image/$file_name";
                    $user->picture = $path;
                }
                $user->update();
                return response()->json(['status' => 'true', 'message' => 'Picture Updated!', 'data' => $user]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'false', 'message' =>$e->getMessage(),'data'=>[]],500);
        }
    }

    //Login

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //check e-mail

        $user = User::where('email', $fields['email'])->first();

        //check password

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'wrong email or password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }



    // Logout

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'logged out'
        ];
        return response()->json(['message' => 'logged out']);
    }
}
