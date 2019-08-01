@extends("layouts.company")

@section("content")

<div class="container more">
    <h3>Company List</h3>
    <br>
    <div class="row list">
        @if(count($companies)>0)
        @foreach($companies as $company)
            <div class="col-md-3 list-under">
             <img style = "width:30%;height:40%;" src ="/storage/logos/{{$company->logo}}">
                <div class="nameno">
                    <p class="detsName"><b>{{$company->name}}</b></p>
                    <p class="detsNo"><b>{{$company->email}}</b></p>
                    <p class="detsNo"><b>{{$company->website}}</b></p>
                </div>
                <div class="hide"></div>
                <div class="others">
                    <a href="/company/{{$company->id}}/edit"><button type="button" class="btn btn-info btn-edit">Edit</button></a>
                    {{--  <a href="/employee/addEmployee"><button type="button" class="btn btn-info ">Delete</button></a>  --}}
                    <a>{!!Form::open(['action' => ['CompaniesController@destroy',$company->id],'method' => 'POST'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger '])}}
                    {!!Form::close()!!}</a>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <p class="none">No Company has been added</p>
    @endif
</div>
@endsection 


{{--      
<div class="container more">
    <h3>Company List</h3>
    <div class="list">
        @if(count($companies)>0)
        @foreach($companies as $company)
        <div class="col">
            <div><i class="fa fa-user fa-4x ico detsIcon"></i></div>
            <div class="nameno">
                <p class="detsName"><b>{{$company->name}}</b></p>
                <p class="detsNo"><b>{{$company->email}}</b></p>
                <p class="detsNo"><b>{{$company->website}}</b></p>
            </div>
            <div class="others">
                <a href="/employee/addEmployee"><button type="button" class="btn btn-info">Edit</button></a>
                <a href="/employee/addEmployee"><button type="button" class="btn btn-info ">Delete</button></a>
            </div>
        </div>
        @endforeach
        @else
        <p>No Company</p>
        @endif
    </div>
</div>
@endsection  --}}