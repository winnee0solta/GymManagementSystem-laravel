@extends('dashboard.layout.base')

@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Members</li>
    </ol>
</nav>


<div class="mb-3">

    <button type="button" class="btn btn btn-warning text-white" data-toggle="modal" data-target="#newMemberModal">
        Add New Member
    </button>
</div>


<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Emergence Contact</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Height</th>
                        <th scope="col">Bmi</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($members))
                    @foreach ($members as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['fullname']}}</td>
                        <td>{{$item['dob']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['address']}}</td>
                        <td>{{$item['e_phone']}}</td>
                        <td>{{$item['weight']}}</td>
                        <td>{{$item['height']}}</td>
                        <td>{{$item['bmi']}}</td>
                        <td>{{$item['shift']}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/dashboard/members/{{$item['member_id']}}/view"
                                    class="btn btn-float btn-success btn-sm" type="button">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="/dashboard/members/{{$item['member_id']}}/edit"
                                    class="btn btn-float btn-dark btn-sm ml-1" data-toggle="modal"
                                    data-target="#editMemberModal-{{$item['member_id']}}" type="button">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="/dashboard/members/{{$item['member_id']}}/remove"
                                    class="btn btn-float btn-danger btn-sm ml-1" type="button">
                                    <i class="material-icons">delete</i>
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

@endsection


@section('modal')
<!-- add member Modal -->
<div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/members/add" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Fullname</label>
                        <input name="fullname" required type="text" class="form-control" placeholder="Enter Fullname">
                    </div>
                    <div class="form-group">
                        <label>DOB</label>
                        <input name="dob" required type="date" class="form-control" placeholder="Enter DOB">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="phone" required type="text" class="form-control" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" required type="text" class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact Phone</label>
                        <input name="e_phone" required type="text" class="form-control" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label>Current Weight</label>
                        <input name="weight" required type="text" class="form-control" placeholder="Enter Weight">
                    </div>
                    <div class="form-group">
                        <label>Current Height</label>
                        <input name="height" required type="text" class="form-control" placeholder="Enter Height">
                    </div>
                    <div class="form-group">
                        <label>Current BMI (Body Mass Index)</label>
                        <input name="bmi" required type="text" class="form-control" placeholder="Enter Bmi">
                    </div>
                    <div class="form-group">
                        <label>Shift</label>
                        <select name="shift" required class="form-control">
                            <option value="morning" selected>Morning</option>
                            <option value="day">Day</option>
                            <option value="evening">Evening</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" required type="text" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" required type="password" class="form-control"
                            placeholder="Enter password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- add member Modal -->


<!-- edit member Modal -->

@if (!empty($members))
@foreach ($members as $item)
<div class="modal fade" id="editMemberModal-{{$item['member_id']}}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel-{{$item['member_id']}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/members/{{$item['member_id']}}/edit" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Fullname</label>
                        <input name="fullname" required type="text" class="form-control" placeholder="Enter Fullname"
                            value="{{$item['fullname']}}">
                    </div>
                    <div class="form-group">
                        <label>DOB</label>
                        <input name="dob" required type="date" class="form-control" placeholder="Enter DOB"
                            value="{{$item['dob']}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="phone" required type="text" class="form-control" placeholder="Enter Phone"
                            value="{{$item['phone']}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" required type="text" class="form-control" placeholder="Enter Address"
                            value="{{$item['address']}}">
                    </div>
                    <div class="form-group">
                        <label>Emergency Contact Phone</label>
                        <input name="e_phone" required type="text" class="form-control" placeholder="Enter Phone"
                            value="{{$item['e_phone']}}">
                    </div>
                    <div class="form-group">
                        <label>Current Weight</label>
                        <input name="weight" required type="text" class="form-control" placeholder="Enter Weight"
                            value="{{$item['weight']}}">
                    </div>
                    <div class="form-group">
                        <label>Current Height</label>
                        <input name="height" required type="text" class="form-control" placeholder="Enter Height"
                            value="{{$item['height']}}">
                    </div>
                    <div class="form-group">
                        <label>Current BMI (Body Mass Index)</label>
                        <input name="bmi" required type="text" class="form-control" placeholder="Enter Bmi"
                            value="{{$item['bmi']}}">
                    </div>
                    <div class="form-group">
                        <label>Shift</label>
                        <select name="shift" required class="form-control">
                            @if ($item['shift'] == 'morning' )
                            <option value="morning" selected>Morning</option>
                            @else
                            <option value="morning">Morning</option>
                            @endif
                            @if ($item['shift'] == 'day' )
                            <option value="day" selected>Day</option>
                            @else
                            <option value="day">Day</option>
                            @endif
                            @if ($item['shift'] == 'evening' )
                            <option value="evening" selected>Evening</option>
                            @else
                            <option value="evening">Evening</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" required type="text" class="form-control" placeholder="Enter username"
                            value="{{$item['username']}}">
                    </div>
                    <div class="form-group">
                        <label>Password (optional)</label>
                        <input name="password" type="password" class="form-control"
                            placeholder="New password">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endforeach
@endif

<!-- edit member Modal -->
@endsection
