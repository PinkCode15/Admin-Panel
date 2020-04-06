@extends("layouts.employee")

@section("content")
    <div class="selectForm container">
        <h2>Edit Employee</h2>
        <br> <br>
        @if(count($data["companies"])>0)
        {{--  {!! Form::select('name', $worktypes->pluck('name'), $workedtime->worktype->id, ['class' => 'form-control']) !!}  --}}
        {!! Form::open(
            array(
                'route' => ['employee.update',$data["employee"]->id], 
                'class' => 'companyselectForm',  
                'files' => true)) !!}
            <div class="details" id="details">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Company Name</span>
                        <select id="inputState" name = "select" class="size">
                            @foreach($data["companies"] as $company)
                               <option value = '{{$company -> id}}' {{ ($company ->id == $data["employee"]->companyId) ? 'selected' : '' }}>{{$company ->name}}</option>
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
                    {{Form::text('firstname',$data["employee"] -> firstname,['class'=>'form-control','placeholder'=>"First Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                    </div>
                    {{Form::text('lastname',$data["employee"] -> lastname,['class'=>'form-control','placeholder'=>"Last Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>	
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">E-mail</span>
                    </div>
                    {{Form::email('email',$data["employee"] -> email,['class'=>'form-control','placeholder'=>"E-mail",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Phone no.</span>
                    </div>
                    {{Form::number('phone',$data["employee"] -> phone,['class'=>'form-control short','placeholder'=>"Phone no.",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
                </div>
            </div>
            <br>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('+ Edit',['class'=>'btn btn-info addBtn'])}}
        @else
        <p>No Company has been added</p>
        @endif
    </div>
</div>   
@endsection