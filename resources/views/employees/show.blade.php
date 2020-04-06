@extends("layouts.employee")

@section("content")

<div class="container more">
    <h3>Employee List for {{$data["selectedC"]}}</h3>
    <br>
    <div class="row list">
        @if(count($data["employeesP"])>0)
        @foreach($data["employeesP"] as $employee)
            <div class="col-md-3 list-under">
                <div class="nameno">
                <p class="detsName">Name: <b>{{$employee->firstname}}{{$employee->lastname}}</b></p>
                <p class="detsNo">E-mail: <b>{{$employee->email}}</b></p>
                <p class="detsNo">Phone number: <b>{{$employee->phone}}</b></p>
                </div>
                <div class="others">
                    <a href="/employee/{{$employee->id}}/edit"><button type="button" class="btn btn-info btn-edit">Edit</button></a>
                    {{--  <a href="/employee/addEmployee"><button type="button" class="btn btn-info ">Delete</button></a>  --}}
                    <a>{!!Form::open(['action' => ['EmployeesController@destroy',$employee->id],'method' => 'POST'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger '])}}
                    {!!Form::close()!!}</a>
                </div>
            </div>
        @endforeach
    </div
        @else
        <p class="none">No Employee</p>
        @endif
</div>
</div>
@endsection 

{{--  <div class="container more">
    <h3>Employee List for {{$data["selectedC"]}}</h3>
    <br>
    <div class="list">
        @if(count($data["employeesP"])>0)
        @foreach($data["employeesP"] as $employee)
        <div class="col">
            <div class="nameno">
                <p class="detsName">Name: <b>{{$employee->firstname}}{{$employee->lastname}}</b></p>
                <p class="detsNo">E-mail: <b>{{$employee->email}}</b></p>
                <p class="detsNo">Phone number: <b>{{$employee->phone}}</b></p>
                <div class="others">
                    <a href="/employee/addEmployee"><button type="button" class="btn btn-info">Edit</button></a>
                    <a href="/employee/addEmployee"><button type="button" class="btn btn-info ">Delete</button></a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>No Employee</p>
        @endif
    </div>
</div>
@endsection  --}}