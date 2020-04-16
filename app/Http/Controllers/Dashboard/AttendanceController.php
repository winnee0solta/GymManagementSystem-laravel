<?php

namespace App\Http\Controllers\Dashboard;

use App\Attendances;
use App\GymMembers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {


        if ($request->has('date')) {

            $date = Carbon::parse($request->date)->toDateString();
        } else {

            $date = Carbon::today()->toDateString();
        }


        $attendances = array();

        foreach (GymMembers::all() as $member) {

            $status = 'NONE';
            $attendance =  Attendances::where('member_id', $member->id)
                ->whereDate('created_at', '=',   $date)
                ->first();

            if ($attendance) {
                if ($attendance->status) {
                    $status = 'PRESENT';
                } else {
                    $status = 'ABSENT';
                }
            }

            array_push($attendances, array(
                'member_id' => $member->id,
                'status' => $status,
                'fullname' => $member->fullname,
                'phone' => $member->phone,
                'address' => $member->address,

            ));
        }
        return view('dashboard.attendance.index', compact('attendances', 'date'));
    }

    public function setP($member_id, Request $request)
    {

        $member = GymMembers::find($member_id);
        if ($member) {

            $attendance =  Attendances::where('member_id', $member->id)
                ->whereDate('created_at', '=', Carbon::today()->toDateString())
                ->first();

            if ($attendance) {
                $attendance->status = true;
                $attendance->save();
            } else {
                Attendances::create([
                    'member_id' => $member->id,
                    'status' => true,
                ]);
            }
        }


        return redirect('/dashboard/attendance?date='. $request->date);
    }
    public function setA($member_id, Request $request)
    {

        $member = GymMembers::find($member_id);
        if ($member) {

            $attendance =  Attendances::where('member_id', $member->id)
                ->whereDate('created_at', '=', Carbon::today()->toDateString())
                ->first();

            if ($attendance) {
                $attendance->status = false;
                $attendance->save();
            } else {
                Attendances::create([
                    'member_id' => $member->id,
                    'status' => false,
                ]);
            }
        }


        return redirect('/dashboard/attendance?date='. $request->date);
    }
}
