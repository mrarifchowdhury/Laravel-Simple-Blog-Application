@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    @foreach ($allData as $data)
     
    <div class="row">
        <div class="col-md-11">
            <h1 class="font-weight-light">{{$data->title}} </h1>
        </div>
        <div class="col-md-1  align-self-center  border border-top-0 border-bottom-0 border-right-0 " >
            <a href="{{ route('blog.edit', $data->id) }}" class="btn btn-primary btn-sm" style="padding: 1px 6px;">Edit</a>
            <a href="#my-modal{{$data->id}}" class="btn btn-danger btn-sm rounded " data-toggle="modal" style="padding: 1px 5px;">Delete</a>
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
            <a href="{{ route('blogdetails', ['id'=>$data->id]) }}"   class="font-weight-bold text-info" style="text-decoration: none;">Read More..... </a>
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



    
    <!-- ..................................... Delete Confirmation Model ............................................... -->

    <!-- Start Delete Confirmation Model -->
    <div id="my-modal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 ">
                            <div class="row">
                                <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                            </div>
                            <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>
                            
                        </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                            <div class="row justify-content-end no-gutters">
                                <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div>


                            <div class="col-auto">
                                {{Form::open(array('route'=>['blog.destroy',$data->id],'method'=>'DELETE'))}}
                                <button type="submit" class="btn btn-danger px-4 confirm" >Delete</button>
                                {!! Form::close() !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Confirmation Model -->


    @endforeach



</div>    
@endsection
