@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
 <div class="row  ">
    <div class="col-md-7 text-center">
        @if ( Auth::user()->name == 'Admin')
        <div class="row">
            <div class="col-md-6 "> 
                <div class="rounded shadow pt-4 pb-4 text-center">
                    <p style="font-size: 20px;">Total Blogs Posted : 
                        <a href="{{ route('allblogs') }}" class="text-decoration-none">
                            <span class="text-primary" style="font-size: 40px;"> {{ count($blog) }} </span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rounded shadow pt-4 pb-4 text-center">
                    <p style="font-size: 20px;">Total User : 
                        <span class="text-primary" style="font-size: 40px;"> {{ count($user) }} </span>
                    </p>
                </div>
            </div>
        </div> 
        @endif
        <div class="row">
            <div class="col-md-6 ">
                <a href="{{route('addblogs')}}" style="text-decoration:none; hover" >
                <div class="rounded shadow pt-2 pb-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="" style="font-size: 60px;">&plus;</span>
                        <span class="pl-2 pt-3" style="font-size: 20px;">Add Blog</span>
                    </div>
                </div> 
                </a>
            </div>   
            <div class="col-md-6 ">
                <a href="{{route('allblogs')}}" style="text-decoration:none; hover" >
                <div class="rounded shadow pt-4 pb-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="" style="font-size: 50px;">&#9943;</span>
                        <span class="pl-2 pt-2" style="font-size: 20px;">View All Blogs</span>
                    </div>
                </div>  
                </a>  
            </div>    
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="rounded shadow pt-4 pb-4">
                    @if ( Auth::user()->name == 'Admin')
                        <p class="text-center text-capitalize">Last 7 Blog Post</p>

                        @foreach ($last7BlogsByAll as $last7BlogpostByAll)
                        <p class="pl-3 pr-1"> 
                            <a href="{{ route('blogdetails', $last7BlogpostByAll->id ) }}" class="text-decoration-none">
                            <span class="text-gray font-italic"> {{ $last7BlogpostByAll->title}} </span> </a>
                            <span class="font-weight-light"> created by </span> 
                            <span class="text-gray "> {{ $last7BlogpostByAll->created_by}}  </span>
                        </p> 
                        @endforeach  

                    @else
                        <p class="text-center text-capitalize">Your Last 7 Blog Post</p>

                        @foreach ($last7BlogsByUser as $last7BlogpostByUser)
                        <p class="pl-3"> 
                            <a href="{{ route('blogdetails', $last7BlogpostByUser->id ) }}" class="text-decoration-none">
                            <span class="text-gray font-italic"> {{ $last7BlogpostByUser->title}} </span> </a>
                            <span class="font-weight-light"> created by </span> 
                            <span class="text-gray "> {{ $last7BlogpostByUser->created_by}}  </span>
                        </p> 
                        @endforeach       

                    @endif
                </div>     
            </div>
        </div>
        @if ( Auth::user()->name == 'Admin')
            <div class="row pt-4">
                <div class="col-md-12">
                    <div class="rounded shadow pt-4 pb-4">
                        <p class="text-center text-capitalize">Blog History (Last 7 Days)</p>
                
                        @foreach ($blog7days as $blogs7days)
                        <p class="pl-3 pr-2 text-left"> 
                            <a href="{{ route('blogdetails', $blogs7days->id ) }}" class="text-decoration-none">
                            <span class="text-gray font-italic"> {{ $blogs7days->title}} </span> </a>
                            <span class="font-weight-light"> created by </span> 
                            <span class="text-gray "> {{ $blogs7days->created_by}}  </span>
                        </p> 
                        @endforeach            
                        
                    </div>
                </div>
            </div>
        @endif
    </div>
 </div>



 

</div>    
@endsection
