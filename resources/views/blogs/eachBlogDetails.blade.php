@extends('layouts.app')



@section('content')
    
<div class="container">

      
    <div class="row">
        <div class="col-md-11">
            <h1 class="">{{ $data->title }} </h1>
        </div>

        <div class="col-md-12">
            <p>{!! $data->blogpost!!}</p>
        </div>
        <div class="col-md-12">
            <p class="text-sm-left"> 
                <span class="badge badge-pill badge-warning"> {{$data->created_by}} </span> 
                <i class="badge badge-pill badge-primary">{{$data->created_at}}</i> 
            </p>
        </div>
  
        
    </div>


</div>

@endsection