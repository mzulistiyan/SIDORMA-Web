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
use App\Models\Alumni;
use App\Models\Berita;
use App\Models\wali_siswa;
use Exception;
use App\Actions\Fortify\PasswordValidationRules;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    use PasswordValidationRules;

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

    public function changePassword(Request $request)
    {
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

    //update alumni
    function updateAlumni(Request $request, string $id_alumni)
    {
        try {
            $alumni = Alumni::find($id_alumni);
            if ($alumni == null) {
                return ResponseFormatter::error([
                    'message' => 'Alumni not found',
                ], 'Alumni not found', 404);
            }
            $alumni->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jurusan' => $request->jurusan,
                'tahun_angkatan' => $request->tahun_angkatan,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'pekerjaan' => $request->pekerjaan,
            ]);

            return ResponseFormatter::success($alumni, 'Alumni updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    //register
    public function registerAlumni(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'nim' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required', 'string', 'max:255'],
                'tahun_angkatan' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules()
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            User::create([
                'email' => $request->email,
                'nim' => $request->nim,
                'password' => Hash::make($request->password),
            ]);


            Alumni::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jurusan' => $request->jurusan,
                'tahun_angkatan' => $request->tahun_angkatan,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'pekerjaan' => $request->pekerjaan,

            ]);

            $alumni = User::where('email', $request->email)->first();

            return ResponseFormatter::success([
                'token_type' => 'Bearer',
                'alumni' => $alumni
            ], 'Registrasi Success');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
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

    public function getAllAlumni()
    {
        try {
            $alumnis = Alumni::all();
            return ResponseFormatter::success($alumnis, 'Alumni found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Internal Server Error', 500);
        }
    }

    public function getAllBerita()
    {
        try {
            $beritas = Berita::all();

            foreach ($beritas as $berita) {
                $berita->sampul = asset('images/' . $berita->sampul);
            }
            return ResponseFormatter::success($beritas, 'Berita found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Internal Server Error', 500);
        }
    }

    public function createBerita(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required',
                'isi' => 'required',
                'author' => 'required',
                'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $berita = new Berita;
            $berita->judul = $validatedData['judul'];
            $berita->isi = $validatedData['isi'];
            $berita->author = $validatedData['author'];

            if ($request->hasFile('sampul')) {
                $image = $request->file('sampul');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/' . $filename);
                Image::make($image->getRealPath())->save($path);
                $berita->sampul = $filename;
            }

            $berita->save();

            return ResponseFormatter::success('Create Berita Success');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }
    public function getAlumni(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            $alumni = Alumni::where('nim', $user->nim)->first();
            $user->name = $alumni->name;
            $user->detail = $alumni;

            return ResponseFormatter::success($user, 'User found');
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
            } else if ($user->role == "alumni") {
                $alumni = Alumni::where('nim', $user->nim)->first();
                $user->name = $alumni->name;
                $user->detail = $alumni;
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
