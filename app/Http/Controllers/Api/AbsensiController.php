<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Helpers\ResponseFormatter;
use Exception;

class AbsensiController extends Controller
{
    public function absensi(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'waktu_absensi' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            
            // Handling image upload
            // check if image not empty
            if ($request->has('image')) {
                // check if image is valid
                if (!$request->file('image')->isValid()) {
                    return ResponseFormatter::error([
                        'message' => 'Invalid image format',
                    ], 'Invalid image format', 400);
                }
                // create unique name for image
                $imageName = date('mdYHis') . uniqid() . '.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $pathImage = asset('images/'.$imageName);
            }

            // check if waktu_absensi can be parsed to timestamp
            if (!strtotime($request->waktu_absensi)) {
                return ResponseFormatter::error([
                    'message' => 'Invalid waktu_absensi format',
                ], 'Invalid waktu_absensi format', 400);
            }

            $user = Auth::user();
            $today = date('Y-m-d');
            $absensi = Absensi::whereDate('created_at', $today)
                ->where('nim_mahasiswa', $user->nim)
                ->get();
            if (!(count($absensi) <= 0) && (count($absensi) > 0 && $absensi->last()->clock_in == NULL)) {
                $absensi->last()->clock_in = $request->waktu_absensi;
                $absensi->last()->status = FALSE;
                if ($request->has('image')) {
                    $absensi->last()->photo = $pathImage;
                }
                $absensi->last()->save();
                $absensi = $absensi->last();
            } else {
                Absensi::create([
                    'nim_mahasiswa' => $user->nim,
                    'clock_out' => $request->waktu_absensi,
                    'status' => TRUE,
                    'photo' => $request->has('image') ? $pathImage : NULL,
                ]);
                $absensi = Absensi::where('nim_mahasiswa', $user->nim)
                    ->whereDate('created_at', $today)
                    ->get()
                    ->last();
            }

            return ResponseFormatter::success($absensi, 'Absensi berhasil ditambahkan');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function report(Request $request)
    {
        try {
            $user = Auth::user();
            // for today only
            if ($request->has('today') && $request->query('today') == 'true') {
                $today = date('Y-m-d');
                // get today absensi
                $absensi = Absensi::whereDate('created_at', $today)
                    ->where('nim_mahasiswa', $user->nim)
                    ->get();
            } else {
                $bulan = date('m');
                $tahun = date('Y');
                if ($request->has('bulan') || $request->has('tahun')) {
                    $validator = Validator::make(
                        $request->all(),
                        [
                            'bulan' => ['required', 'numeric', 'between:1,12'],
                            'tahun' => ['required', 'numeric', 'digits:4'],
                        ]
                    );
                    if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                    };
                    $bulan = $request->bulan;
                    $tahun = $request->tahun;
                }

                // get absensi by bulan and tahun
                $absensi = Absensi::whereMonth('created_at', $bulan)
                    ->whereYear('created_at', $tahun)
                    ->where('nim_mahasiswa', $user->nim)
                    ->get();


                // for detail month query
                if ($request->has('detailMonth') && $request->query('detailMonth') == 'true') {
                    // create new array for report each month
                    $report = [];
                    // get total days in month
                    $total_days = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                    // loop for each day in month
                    for ($i = 1; $i <= $total_days; $i++) {
                        $day = [];
                        // loop for each absensi in month
                        foreach ($absensi as $absen) {
                            // check if absensi created at same day
                            if (date('d', strtotime($absen->created_at)) == $i) {
                                // add absensi to day array
                                array_push($day, $absen);
                            }
                        }
                        // add day array to report array
                        array_push($report, $day);
                    }
                    $absensi = $report;
                }
            }

            return ResponseFormatter::success($absensi, 'Berhasil mendapatkan report');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function status(Request $request)
    {
        try {
            // get token user
            $user = Auth::user();
            $today = date('Y-m-d');
            $absensi = Absensi::whereDate('created_at', $today)
                ->where('nim_mahasiswa', $user->nim)
                ->get();
            if (count($absensi) <= 0) {
                return ResponseFormatter::success([
                    'status' => FALSE,
                ], 'Berhasil mendapatkan status');
            } else {
                $status = FALSE;
                if ($absensi->last()->status == 1) {
                    $status = TRUE;
                }
                return ResponseFormatter::success([
                    'status' => $status,
                ], 'Berhasil mendapatkan status');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }
}
