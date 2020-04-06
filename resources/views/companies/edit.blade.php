@extends("layouts.company")

@section("content")
    <div class="selectForm container">
        <h2>Edit Company</h2>
        <br> <br>
        {!! Form::open(
            array(
                'route' => ['company.update',$company->id] ,
                'class' => 'companyselectForm',  
                'files' => true)) !!}
        <div class="details" id="details">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Company Name</span>
                </div>
               {{Form::text('name',$company->name,['class'=>'form-control','placeholder'=>"Company Name",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">E-mail</span>
                </div>
                {{Form::email('email',$company->email,['class'=>'form-control','placeholder'=>"E-mail",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    {{Form::file('image',['class'=>"fileStyle", 'id' =>"inputGroupFile01",'accept'=>"image/*"])}}
                </div>
            </div>	
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Website</span>
                </div>
                {{Form::text('website',$company->website,['class'=>'form-control','placeholder'=>"Website",'aria-label'=>"Username", 'aria-describedby'=>"basic-addon1",'required'=>"required" ])}}
            </div>
        </div>
        <br>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('+ Edit',['class'=>'btn btn-info addBtn'])}}
    </form>
    </div>
@endsection