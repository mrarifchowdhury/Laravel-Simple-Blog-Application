@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @foreach ($allData as $data)
     
    <div class="row">
        <div class="col-md-11">
            <h1 class="font-weight-light">{{$data->title}} </h1>
        </div>

        <div class="col-md-12">
            <?php   
            $maxChar = strlen(html_entity_decode($data->blogpost));
            $blogPostText = html_entity_decode($data->blogpost);
            $blogPostTextIn500Char = substr(strip_tags($blogPostText), 0, 500);
            ?>

            <p class="pt-3"> 
                {{ $blogPostTextIn500Char }} 

                @if ($maxChar > 500 )
                <a href="{{ route('blogdetails', ['id'=>$data->id]) }}"   class="font-italic font-weight-light text-info" style="text-decoration: none;">Read More..... </a>
                @endif
            </p>
        </div>

        <div class="col-md-12">
            <p class="text-sm-left"> 
                <span class="badge badge-pill badge-warning"> {{$data->created_by}} </span> 
                <i class="badge badge-pill badge-primary">{{$data->created_at}}</i> 
            </p>
        </div>
     
    </div>

    <hr>

    @endforeach


</div>    
@endsection