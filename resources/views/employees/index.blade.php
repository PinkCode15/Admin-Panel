@extends("layouts.employee")

@section("content")
    <div class="btns text-center ">
        <a href="/employee/addEmployee"><button type="button" class="btn btn-info view">Add Employee</button></a>
        <button type="button" class="btn btn-info click  view" onclick="createAccount()">Show Employees</button>
    </div>
</div>
<br>
<br>
    <div id="create-account" class="account">
        <div class="popUp">
            <button id="close" onclick="closeAccount()">X</button><h3 class="shifth3">Select Company</h3>
            @if(count($companies)>0)
            {!! Form::open(
                array(
                    'route' => 'employee.store', 
                    'class' => 'companyselectForm',  
                    'files' => true)) !!}
            <div class="selecting size" id="selecting">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Company Name</span>
                        <select id="inputState" name = "selectc">
                            @foreach($companies as $company)
                                <option value = '{{$company -> id}}'>{{$company ->name}}</option>
                            @endforeach
                        </select>
                        {{--  {{Form::select('name',$name,['id'=>'inputState','class'=>'form-control','aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required"])}}  --}}
                    </div>
                </div>
                {{Form::submit('OK',['class'=>'btn btn-info'])}}  
                @else
                <br>
                <p class="zero">No company</p>
                @endif
            </div>
        </div>
    </div>
@endsection