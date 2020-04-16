<?php

namespace App\Http\Controllers\Dashboard;

use App\GymMembers;
use App\Http\Controllers\Controller;
use App\NutritionPlans;
use App\User;
use Illuminate\Http\Request;

class NutritionPlansController extends Controller
{
    public function store($member_id, Request $request)
    {


        $member = GymMembers::find($member_id);
        if ($member) {
            $user = User::find($member->user_id);
            if ($user) {


                if (NutritionPlans::where('member_id', $member->id)->where('user_id', $user->id)->count() > 0) {
                    $plan = NutritionPlans::where('member_id', $member->id)->where('user_id', $user->id)->first();
                    if ($request->has('sunday') && $request->sunday != '') {
                        $plan->sunday = $request->sunday;
                    } else {

                        $plan->sunday = '-';
                    }
                    if ($request->has('monday') && $request->monday != '') {
                        $plan->monday = $request->monday;
                    } else {

                        $plan->monday = '-';
                    }
                    if ($request->has('tuesday') && $request->tuesday != '') {
                        $plan->tuesday = $request->tuesday;
                    } else {

                        $plan->tuesday = '-';
                    }
                    if ($request->has('wednesday') && $request->wednesday != '') {
                        $plan->wednesday = $request->wednesday;
                    } else {

                        $plan->wednesday = '-';
                    }
                    if ($request->has('thursday') && $request->thursday != '') {
                        $plan->thursday = $request->thursday;
                    } else {

                        $plan->thursday = '-';
                    }
                    if ($request->has('friday') && $request->friday != '') {
                        $plan->friday = $request->friday;
                    } else {

                        $plan->friday = '-';
                    }
                    if ($request->has('saturday') && $request->saturday != '') {
                        $plan->saturday = $request->saturday;
                    } else {

                        $plan->saturday = '-';
                    }

                    $plan->save();
                } else {

                    $plan = new NutritionPlans();

                    $plan->user_id = $user->id;
                    $plan->member_id = $member->id;

                    if ($request->has('sunday') && $request->sunday != '') {
                        $plan->sunday = $request->sunday;
                    } else {

                        $plan->sunday = '-';
                    }
                    if ($request->has('monday') && $request->monday != '') {
                        $plan->monday = $request->monday;
                    } else {

                        $plan->monday = '-';
                    }
                    if ($request->has('tuesday') && $request->tuesday != '') {
                        $plan->tuesday = $request->tuesday;
                    } else {

                        $plan->tuesday = '-';
                    }
                    if ($request->has('wednesday') && $request->wednesday != '') {
                        $plan->wednesday = $request->wednesday;
                    } else {

                        $plan->wednesday = '-';
                    }
                    if ($request->has('thursday') && $request->thursday != '') {
                        $plan->thursday = $request->thursday;
                    } else {

                        $plan->thursday = '-';
                    }
                    if ($request->has('friday') && $request->friday != '') {
                        $plan->friday = $request->friday;
                    } else {

                        $plan->friday = '-';
                    }
                    if ($request->has('saturday') && $request->saturday != '') {
                        $plan->saturday = $request->saturday;
                    } else {

                        $plan->saturday = '-';
                    }

                    $plan->save();
                }


                return redirect('/dashboard/members/' . $member->id . '/view');
            } else {
                $member->delete();
            }
        }


        return redirect('/dashboard/members');
    }
}
