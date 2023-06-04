<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\wali_siswa;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 401);
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function changePassword(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'new_password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if ($user == null) {
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            if (!Hash::check($request->old_password, $user->password, [])) {
                return ResponseFormatter::error([
                    'message' => 'Old password is wrong',
                ], 'Old password is wrong', 400);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();

            return ResponseFormatter::success($user, 'Password changed');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $token = $request->user()->currentAccessToken()->delete();
            return ResponseFormatter::success($token, 'Token Revoked');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function getUser(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if ($user == null) {
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            if ($user->role != "mahasiswa" && $user->role != "wali_siswa") {
                $mahasiswa = Mahasiswa::where('nim', $user->nim)->first();
                $user->name = $mahasiswa->name;
                $user->detail = $mahasiswa;
            } else if ($user->role == "wali_siswa") {
                $waliSiswa = wali_siswa::where('nim', $user->nim)->first();
                $user->name = $waliSiswa->nama;
                $user->detail = $waliSiswa;
            } else {
                $user->name = '';
                $user->detail = null;
            }
            return ResponseFormatter::success($user, 'User found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if ($user == null) {
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            // update field if not null
            $user->nim = $request->nim ?? $user->nim;
            $user->role = $request->role ?? $user->role;
            $user->save();

            return ResponseFormatter::success($user, 'User updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }
}
