@extends('index')

@section('styles')
<link rel="stylesheet" href="{{url('assests/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('assests/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@stop

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-end mr-1">
            <div class="col-sm-6">
                <div class="text-right">
                    <a href="{{route('marks.create')}}" class="btn btn-primary btn-sm">Add New</a>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Marks List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="app-msgs">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <table id="students-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Maths</th>
                                <th>Science</th>
                                <th>History</th>
                                <th>Term</th>
                                <th>Total Marks</th>
                                <th>Created On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($marklists as $mark)
                        <tr>
                            <td>{{$mark->id}}</td>
                            <td>{{$mark->student->name}}</td>
                            <td>{{$mark->maths}}</td>
                            <td>{{$mark->science}}</td>
                            <td>{{$mark->history}}</td>
                            <td>{{$mark->term}}</td>
                            <td>{{$mark->maths+$mark->science+$mark->history}}</td>
                            <td>{{date("M d, Y h:i a",strtotime($mark->created_at))}}</td>
                            <td>
                                <a href="{{route('marks.edit',$mark->id)}}" class="d-inline-block mr-1" title="Edit"><i class="far fa-edit"></i></a>
                                <a href="{{route('marks.delete',$mark->id)}}" class="d-inline-block" title="Delete" onclick="return confirm('Are you sure you want to delete this item')"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
<script src="{{url('assests/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assests/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('assests/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('assests/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#students-table').DataTable({
            "responsive": true,
            "bLengthChange": false,
            "language": {
                searchPlaceholder: 'Student Name'
            },
            "columnDefs": [ {
                "targets": [0,2,3,4,5,6,7,8],
                "searchable": false
            } ]
        });
    });
</script>
@stop