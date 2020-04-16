@extends('dashboard.layout.base')

@section('content')


<div class="container-fluid pb-4">




    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/members">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$member->fullname}}</li>
        </ol>
    </nav>


    <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-5">
            <div class="card">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                username
                            </td>
                            <td>
                                {{$user->username}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                Fullname
                            </td>
                            <td>
                                {{$member->fullname}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                DOB
                            </td>
                            <td>
                                {{$member->dob}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                phone
                            </td>
                            <td>
                                {{$member->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                address
                            </td>
                            <td>
                                {{$member->address}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                Emergency Contact
                            </td>
                            <td>
                                {{$member->e_phone}}
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                shift
                            </td>
                            <td>
                                {{$member->shift}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                user joined at
                            </td>

                            <td>{{  date( "m/d/Y", strtotime($user['created_at']))  }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="">
        <ul class="nav nav-justified nav-tabs nav-tabs-material" id="myTab" role="tablist">
            <li class="nav-item">
                <a aria-controls="home" aria-selected="true" class="nav-link active show" data-toggle="tab"
                    href="#FirstTab" id="First-Tab" role="tab">Plans</a>
            </li>
            <li class="nav-item">
                <a aria-controls="profile" aria-selected="false" class="nav-link" data-toggle="tab" href="#SecondTab"
                    id="Second-Tab" role="tab">Attendance</a>
            </li>
            <li class="nav-item">
                <a aria-controls="contact" aria-selected="false" class="nav-link" data-toggle="tab" href="#ThirdTab"
                    id="Third-Tab" role="tab">Contact</a>
            </li>
            <div class="nav-tabs-indicator" style="left: 0px; right: 458.5px;"></div>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div aria-labelledby="First-Tab" class="tab-pane fade active show" id="FirstTab" role="tabpanel">

                <div>
                    <div class="row justify-content-center">

                        {{-- nutrition plan  --}}

                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Nutrition Plans
                                    </h5>

                                    <form action="/dashboard/members/{{$member->id}}/nutritionplan-add" method="POST">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Sunday</label>
                                            <textarea name="sunday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for sunday">@if (!empty($nplans) && $nplans->sunday != ''&& $nplans->sunday != '-' ){{$nplans->sunday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Monday</label>
                                            <textarea name="monday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for monday">@if (!empty($nplans) && $nplans->monday != ''&& $nplans->monday != '-' ){{$nplans->monday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Tuesday</label>
                                            <textarea name="tuesday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for tuesday">@if (!empty($nplans) && $nplans->tuesday != ''&& $nplans->tuesday != '-' ){{$nplans->tuesday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Wednesday</label>
                                            <textarea name="wednesday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for wednesday">@if (!empty($nplans) && $nplans->wednesday != ''&& $nplans->wednesday != '-' ){{$nplans->wednesday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Thursday</label>
                                            <textarea name="thursday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for thursday">@if (!empty($nplans) && $nplans->thursday != ''&& $nplans->thursday != '-' ){{$nplans->thursday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Friday</label>
                                            <textarea name="friday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for friday">@if (!empty($nplans) && $nplans->friday != ''&& $nplans->friday != '-' ){{$nplans->friday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Saturday</label>
                                            <textarea name="saturday" type="text" class="form-control" rows="6"
                                                placeholder="Enter nutrition plans for saturday">@if (!empty($nplans) && $nplans->saturday != ''&& $nplans->saturday != '-' ){{$nplans->saturday}}
                                                        @endif</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-warning text-white">Update Plan</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        {{--!ends nutrition plan  --}}

                        {{-- Workout plan  --}}
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Workout Plans
                                    </h5>


                                    <form action="/dashboard/members/{{$member->id}}/workoutplan-add" method="POST">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Sunday</label>
                                            <textarea name="sunday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for sunday">@if (!empty($wplans) && $wplans->sunday != ''&& $wplans->sunday != '-' ){{$wplans->sunday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Monday</label>
                                            <textarea name="monday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for monday">@if (!empty($wplans) && $wplans->monday != ''&& $wplans->monday != '-' ){{$wplans->monday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Tuesday</label>
                                            <textarea name="tuesday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for tuesday">@if (!empty($wplans) && $wplans->tuesday != ''&& $wplans->tuesday != '-' ){{$wplans->tuesday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Wednesday</label>
                                            <textarea name="wednesday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for wednesday">@if (!empty($wplans) && $wplans->wednesday != ''&& $wplans->wednesday != '-' ){{$wplans->wednesday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Thursday</label>
                                            <textarea name="thursday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for thursday">@if (!empty($wplans) && $wplans->thursday != ''&& $wplans->thursday != '-' ){{$wplans->thursday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Friday</label>
                                            <textarea name="friday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for friday">@if (!empty($wplans) && $wplans->friday != ''&& $wplans->friday != '-' ){{$wplans->friday}}
                                                        @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Saturday</label>
                                            <textarea name="saturday" type="text" class="form-control" rows="6"
                                                placeholder="Enter workout plans for saturday">@if (!empty($wplans) && $wplans->saturday != ''&& $wplans->saturday != '-' ){{$wplans->saturday}}
                                                        @endif</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-warning text-white">Update Plan</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        {{--!ends Workout plan  --}}
                    </div>
                </div>

            </div>
            <div aria-labelledby="Second-Tab" class="tab-pane fade" id="SecondTab" role="tabpanel">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">#Date</th>
                                        <th scope="col">Attendance Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($attendances))
                                    @foreach ($attendances as $item)
                                    <tr>
                                        <td>{{$item['created_at']}}</td>
                                        <td>
                                            @if ($item['status'])
                                            <span class="badge badge-pill badge-success">PRESENT</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">ABSENT</span>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>


                        </div>


                    </div>
                </div>
            </div>
            <div aria-labelledby="Third-Tab" class="tab-pane fade" id="ThirdTab" role="tabpanel">
                <div>

                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="row justify-content-center">

        {{-- nutrition plan  --}}

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Nutrition Plans
                    </h5>

                    <form action="/dashboard/members/{{$member->id}}/nutritionplan-add" method="POST">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Sunday</label>
                            <textarea name="sunday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for sunday">@if (!empty($nplans) && $nplans->sunday != ''&& $nplans->sunday != '-' ){{$nplans->sunday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Monday</label>
                            <textarea name="monday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for monday">@if (!empty($nplans) && $nplans->monday != ''&& $nplans->monday != '-' ){{$nplans->monday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Tuesday</label>
                            <textarea name="tuesday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for tuesday">@if (!empty($nplans) && $nplans->tuesday != ''&& $nplans->tuesday != '-' ){{$nplans->tuesday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Wednesday</label>
                            <textarea name="wednesday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for wednesday">@if (!empty($nplans) && $nplans->wednesday != ''&& $nplans->wednesday != '-' ){{$nplans->wednesday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Thursday</label>
                            <textarea name="thursday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for thursday">@if (!empty($nplans) && $nplans->thursday != ''&& $nplans->thursday != '-' ){{$nplans->thursday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Friday</label>
                            <textarea name="friday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for friday">@if (!empty($nplans) && $nplans->friday != ''&& $nplans->friday != '-' ){{$nplans->friday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Saturday</label>
                            <textarea name="saturday" type="text" class="form-control" rows="6"
                                placeholder="Enter nutrition plans for saturday">@if (!empty($nplans) && $nplans->saturday != ''&& $nplans->saturday != '-' ){{$nplans->saturday}}
                                @endif</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning text-white">Update Plan</button>
                    </form>


                </div>
            </div>
        </div>
        {{--!ends nutrition plan  --}}

        {{-- Workout plan  --}}
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Workout Plans
                    </h5>


                    <form action="/dashboard/members/{{$member->id}}/workoutplan-add" method="POST">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Sunday</label>
                            <textarea name="sunday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for sunday">@if (!empty($wplans) && $wplans->sunday != ''&& $wplans->sunday != '-' ){{$wplans->sunday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Monday</label>
                            <textarea name="monday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for monday">@if (!empty($wplans) && $wplans->monday != ''&& $wplans->monday != '-' ){{$wplans->monday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Tuesday</label>
                            <textarea name="tuesday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for tuesday">@if (!empty($wplans) && $wplans->tuesday != ''&& $wplans->tuesday != '-' ){{$wplans->tuesday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Wednesday</label>
                            <textarea name="wednesday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for wednesday">@if (!empty($wplans) && $wplans->wednesday != ''&& $wplans->wednesday != '-' ){{$wplans->wednesday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Thursday</label>
                            <textarea name="thursday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for thursday">@if (!empty($wplans) && $wplans->thursday != ''&& $wplans->thursday != '-' ){{$wplans->thursday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Friday</label>
                            <textarea name="friday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for friday">@if (!empty($wplans) && $wplans->friday != ''&& $wplans->friday != '-' ){{$wplans->friday}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Saturday</label>
                            <textarea name="saturday" type="text" class="form-control" rows="6"
                                placeholder="Enter workout plans for saturday">@if (!empty($wplans) && $wplans->saturday != ''&& $wplans->saturday != '-' ){{$wplans->saturday}}
                                @endif</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning text-white">Update Plan</button>
                    </form>


                </div>
            </div>
        </div>
        {{--!ends Workout plan  --}}
    </div>

--!-->

</div>



@endsection
