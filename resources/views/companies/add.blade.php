@extends("layouts.company")

@section("content")
    <div class="selectForm container">
        <h2>Add Company</h2>
        <br> <br>
        {!! Form::open(
            array(
                'route' => 'company.store', 
                'class' => 'companyselectForm',  
                'files' => true)) !!}
        <div class="details" id="details">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Company Name</span>
                </div>
               {{Form::text('name','',['class'=>'form-control','placeholder'=>"Company Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
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
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    {{Form::file('image',['class'=>"fileStyle", 'id' =>"inputGroupFile01",'required'=>"required", 'accept'=>"image/*"])}}
                </div>
            </div>	
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Website</span>
                </div>
                {{Form::text('website','',['class'=>'form-control','placeholder'=>"Website",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
            </div>
        </div>
        <br>
        {{Form::submit('+ Add',['class'=>'btn btn-info addBtn'])}}
    </form>
    </div>
@endsection