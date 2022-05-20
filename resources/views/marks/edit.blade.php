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
                    <h3 class="card-title">Edit Mark</h3>
                </div>
                <!-- /.card-header -->
                <form id="form" method="post" action="{{route('marks.update',$mark->id)}}" enctype="multipart/form-data">
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
                                    <label>Student Name</label>
                                    <select name="student" class="form-control" >
                                        @foreach($students as $student)
                                        <option value="{{$student->id}}" @if($student->id==$mark->student_id) selected @endif>{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('student'))
                                    <span class="error">{{ $errors->first('student') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Term</label>
                                    <select name="term" class="form-control" >
                                        <option value="One" @if($mark->term=="One") selected @endif>One</option>
                                        <option value="Two" @if($mark->term=="Two") selected @endif>Two</option>
                                    </select>
                                    @if ($errors->has('term'))
                                    <span class="error">{{ $errors->first('term') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Maths (Mark)</label>
                                    <input type="number" name="maths" class="form-control" value="{{$mark->maths}}" placeholder="Enter maths mark">
                                    @if ($errors->has('maths'))
                                    <span class="error">{{ $errors->first('maths') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Science (Mark)</label>
                                    <input type="number" name="science" class="form-control" value="{{$mark->science}}" placeholder="Enter science mark">
                                    @if ($errors->has('science'))
                                    <span class="error">{{ $errors->first('science') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>History (Mark)</label>
                                    <input type="number" name="history" class="form-control" value="{{$mark->history}}" placeholder="Enter history mark">
                                    @if ($errors->has('history'))
                                    <span class="error">{{ $errors->first('history') }}</span>
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
<script src="{{url('assests/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script>

$(function () {
  bsCustomFileInput.init();
});
$('#form').validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
        },
        maths: {
            required: true,
            digits: true,
        },
        science: {
            required: true,
            digits: true,
        },
        history: {
            required: true,
            digits: true,
        },
    },
    messages: {
        name: {
            required: "Please enter name",
            minlength: "Please enter at least 3 characters"
        },
        maths: {
            required: "Please enter maths mark",
            email: "Please enter digits"
        },
        science: {
            required: "Please enter science mark",
            email: "Please enter digits"
        },
        history: {
            required: "Please enter history mark",
            email: "Please enter digits"
        },
    },
    errorElement: 'span'
});
</script>
@stop