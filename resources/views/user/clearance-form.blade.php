@extends('./layouts/user')

@section('navbar-brand')
    Clearance Form
@endsection

@section('content')
    <div class="border">
        <div class="text-center pt-2 font-weight-light"> <span class="text-left">Kindly fill the clearance form below with correct details</span> &emsp; <a href="{{route('get.clearance')}}" class="btn btn-danger">Download Clearance</a> </div>
        <form class="p-2 text-body" method="POST" action="">
            @csrf
            <fieldset class="p-2 border" style="background-color: #fdfdfd">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="studentName">Student Name</label>
                        <input type="text" readonly class="form-control" value="{{auth()->user()->name}}" id="studentName" required>
                    </div>

                    <div class="col-md-6">
                        <label for="studentName">Level</label>
                        <select name="level" class="form-control" id="inputState">
                            <option value="National Diploma">National Diploma</option>
                            <option value="Higher National Diploma"> Higher National Diploma</option>
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-4">
                        <label for="accBalance">Fees Balance</label>
                        <input type="number" class="form-control" id="accBalance" required>
                    </div> --}}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="admNumber">Matriculation Number</label>
                        <input type="text" readonly class="form-control" value="{{auth()->user()->regNumber}}" id="admNumber" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="startYear">Admission Year</label>
                        <input type="date" name="startyear" class="form-control" id="startYear" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="endYear">Completion Year</label>
                        <input type="date"  name='endyear' class="form-control" id="endYear" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" readonly class="form-control" value="{{auth()->user()->email}}" id="email" required>
                    </div>
  
                    <div class="form-group col-md-4">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" readonly placeholder="0712-345-678" value="{{auth()->user()->phoneNumber}}" pattern="[0-9]{11}" class="form-control -[0-9]{3}-[0-9]{3}" id="phoneNumber" required>
                    </div>

                    <div class="form-group col-md-4 text-wrap">
                        <label for="course">Department</label>
                        <select id="inputState" name="department" class="form-control">
                        <option class="form-control text-wrap" selected>Computer Science</option>
                        <option class="form-control" selected>Computer Engineering</option>
                        <option class="form-control" selected>Accountancy</option>
                        <option class="form-control" selected>Office Technology Management</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
