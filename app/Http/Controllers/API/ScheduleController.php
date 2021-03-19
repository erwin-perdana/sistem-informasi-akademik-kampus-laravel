<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);

        if($id)
        {
            $schedule = Schedule::with(['matkul','ruangan','dosen'])->find($id);

            if($schedule)
                return ResponseFormatter::success($schedule,'Data schedule berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }
    }
}
