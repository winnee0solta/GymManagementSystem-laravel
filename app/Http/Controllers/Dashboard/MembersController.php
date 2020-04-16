<?php

namespace App\Http\Controllers\Dashboard;

use App\Attendances;
use App\GymMembers;
use App\GymMemberStatus;
use App\Http\Controllers\Controller;
use App\NutritionPlans;
use App\User;
use App\WorkoutPlans;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $members = array();

        foreach (GymMembers::orderBy('created_at', 'desc')->get() as $member) {

            $user = User::find($member->user_id);
            if ($user) {

                $status = GymMemberStatus::where('member_id', $member->id)
                    ->orderBy('created_at', 'desc')
                    ->first();



                array_push($members, array(
                    'member_id' => $member->id,
                    'user_id' => $user->user_id,
                    'fullname' => $member->fullname,
                    'dob' => $member->dob,
                    'phone' => $member->phone,
                    'address' => $member->address,
                    'e_phone' => $member->e_phone,
                    'weight' => $status->weight,
                    'height' => $status->height,
                    'bmi' => $status->bmi,
                    'shift' => $member->shift,
                    'username' => $user->username,
                ));
            } else {
                $member->delete();
            }
        }


        return view('dashboard.members.index', compact('members'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'e_phone' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'bmi' => 'required',
            'shift' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->type = 'public';
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();


        $member = new GymMembers();
        $member->user_id = $user->id;
        $member->fullname = $request->fullname;
        $member->dob = $request->dob;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->e_phone = $request->e_phone;
        $member->shift = $request->shift;
        $member->save();

        $status = new GymMemberStatus();
        $status->user_id = $user->id;
        $status->member_id = $member->id;
        $status->weight = $request->weight;
        $status->height = $request->height;
        $status->bmi = $request->bmi;
        $status->save();


        return redirect('/dashboard/members');
    }

    public function view($member_id)
    {
        $member = GymMembers::find($member_id);
        if ($member) {
            $user = User::find($member->user_id);
            if ($user) {



                //nutriotion plans
                $nplans = NutritionPlans::where('member_id', $member_id)->first();
                $wplans = WorkoutPlans::where('member_id', $member_id)->first();


                $memberstatus = GymMemberStatus::where('member_id', $member_id)->get();
                //attendance
                $attendances = Attendances::where('member_id', $member->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

                return view(
                    'dashboard.members.view',
                    compact(
                        'member',
                        'memberstatus',
                        'attendances',
                        'user',
                        'nplans',
                        'wplans'
                    )
                );
            } else {
                $member->delete();
            }
        }


        return redirect('/dashboard/members');
    }

    public function update($member_id, Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'e_phone' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'bmi' => 'required',
            'shift' => 'required',
            'username' => 'required',
        ]);


        $member = GymMembers::find($member_id);
        if ($member) {
            $user = User::find($member->user_id);
            if ($user) {

                $status = GymMemberStatus::where('member_id', $member->id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                if ($status) {

                    $user->username = $request->username;
                    if ($request->has('password')) {

                        $user->password = bcrypt($request->password);
                    }
                    $user->save();

                    $member->fullname = $request->fullname;
                    $member->dob = $request->dob;
                    $member->phone = $request->phone;
                    $member->address = $request->address;
                    $member->e_phone = $request->e_phone;
                    $member->shift = $request->shift;
                    $member->save();

                    $status->weight = $request->weight;
                    $status->height = $request->height;
                    $status->bmi = $request->bmi;
                    $status->save();
                } else {
                    $member->delete();
                    $user->delete();
                }
            } else {
                $member->delete();
            }
        }


        return redirect('/dashboard/members');
    }
    public function destroy($member_id)
    {



        $member = GymMembers::find($member_id);
        if ($member) {
            $user = User::find($member->user_id);
            if ($user) {

                $status = GymMemberStatus::where('member_id', $member->id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                if ($status) {

                    $status->delete();
                    $member->delete();
                    $user->delete();
                } else {
                    $member->delete();
                    $user->delete();
                }
            } else {
                $member->delete();
            }
        }


        return redirect('/dashboard/members');
    }
}
