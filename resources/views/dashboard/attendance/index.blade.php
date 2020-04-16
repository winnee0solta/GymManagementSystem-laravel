@extends('dashboard.layout.base')

@section('content')

{{-- @php
    $mytime = Carbon\Carbon::now();
    echo $mytime->toDateString();
@endphp
<input name="dob" required type="date" class="form-control" placeholder="Enter DOB" value="{{$mytime->toDateString()}}">
--}}



<div class="row justify-content-center">
    <div class="col-12 col-md-5">

        <div class="card">
            <div class="card-body">
                <form action="/dashboard/attendance" method="get">
                    <div class="form-group">
                        <label>Date</label>
                        <input name="date" required type="date" class="form-control" placeholder="Enter Date"
                            value="{{$date}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Show Attendace Sheet</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-4 mb-5">
    <div class="col-12 col-md-8">

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Attendance Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($attendances))
                            @foreach ($attendances as $item)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$item['fullname']}}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['address']}}</td>
                                <td>{{$item['status']}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/attendance/{{$item['member_id']}}/present?date={{$date}}"
                                            data-toggle="tooltip" data-placement="bottom" title="Make Present"
                                            class="btn btn-float btn-success btn-sm" type="button">
                                            <i class="material-icons">check</i>
                                        </a>
                                        <a href="/dashboard/attendance/{{$item['member_id']}}/absent?date={{$date}}"
                                            data-toggle="tooltip" data-placement="bottom" title="Make Absent"
                                            class="btn btn-float btn-danger btn-sm ml-1" type="button">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </div>
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
</div>



@endsection
