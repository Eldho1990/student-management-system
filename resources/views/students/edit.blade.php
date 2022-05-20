@extends('index')

@section('styles')
    <style>
        .form-control.error{
            border-color: #dc3545;
        }
        .error{
            color:#dc3545;
        }
    </style>
@stop

@section('content')

<section class="content-header"></section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Student</h3>
                </div>
                <!-- /.card-header -->
                <form id="form" method="post" action="{{route('students.update',$student->id)}}" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div id="app-msgs">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$student->name}}" placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control" value="{{$student->age}}" placeholder="Enter Age">
                                    @if ($errors->has('age'))
                                    <span class="error">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div>
                                        <input type="radio" name="gender" value="M" @if($student->gender=="M") checked @endif> Male &nbsp;&nbsp;
                                        <input type="radio" name="gender" value="F" @if($student->gender=="F") checked @endif> Female
                                    </div>
                                    @if ($errors->has('gender'))
                                    <span class="error">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Reporting Teacher</label>
                                    <select name="teacher" class="form-control" >
                                        @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" @if($teacher->id==$student->teacher_id) selected @endif> {{$teacher->name}} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('designation'))
                                    <span class="error">{{ $errors->first('designation') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
<script src="{{url('assests/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('assests/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$('#form').validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
        },
        email: {
            required: true,
            email: true,
        },
    },
    messages: {
        name: {
            required: "Please enter name",
            minlength: "Please enter at least 3 characters"
        },
        age: {
            required: "Please enter age",
            email: "Please enter digits"
        },
    },
    errorElement: 'span'
});
</script>
@stop