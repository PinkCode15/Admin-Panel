@extends("layouts.employee")

@section("content")
    <div class="selectForm container">
        <h2>Add Employee</h2>
        <br> <br>
        @if(count($companies)>0)
        {{--  {!! Form::select('name', $worktypes->pluck('name'), $workedtime->worktype->id, ['class' => 'form-control']) !!}  --}}
        {!! Form::open(
            array(
                'route' => 'employee.store', 
                'class' => 'companyselectForm',  
                'files' => true)) !!}
            <div class="details" id="details">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Company Name</span>
                        <select id="inputState" name = "select" class = "size">
                            @foreach($companies as $company)
                               <option value = '{{$company -> id}}'>{{$company ->name}}</option>
                            @endforeach
                        </select>
                        {{--  {{Form::select('name',$name,['id'=>'inputState','class'=>'form-control','aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required"])}}  --}}
                    </div>  
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">First Name</span>
                    </div>
                    {{Form::text('firstname','',['class'=>'form-control','placeholder'=>"First Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                    </div>
                    {{Form::text('lastname','',['class'=>'form-control','placeholder'=>"Last Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>	
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">E-mail</span>
                    </div>
                    {{Form::email('email','',['class'=>'form-control','placeholder'=>"E-mail",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Phone no.</span>
                    </div>
                    {{Form::number('phone','',['class'=>'form-control short','placeholder'=>"Phone no.",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
            </div>
            <br>
            {{Form::submit('+ Add',['class'=>'btn btn-info addBtn'])}}
        @else
        <p>No Company has been added</p>
        @endif
    </div>
</div>   
@endsection