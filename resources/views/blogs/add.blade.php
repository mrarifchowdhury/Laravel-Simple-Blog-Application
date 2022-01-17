

@extends('layouts.app')

@section('content')

<section class="blog-post">
    <div class="container"> 
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="form-wrapper">
                    <div class="row ">
                        <div class="col-md-12">
                            <h4 class="float-left pb-3">Post Your Blog </h4>
                           @if (session('status'))
                            <p class="p-1 pl-4 pr-4 card  text-success text-uppercase float-right font-weight-bolder"> {{ session('status')}}</p>                      
                           @endif
                        </div>
                    </div>

                    <form action="{{route('blog.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control font-weight-bolder" placeholder="Title" name="title"> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="blogpost" id="summernote"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary">Add Blog</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection



@section('SummernoteScriptAndCss')


<!-- Summernote Scripts & Css-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Blog Description',
        tabsize: 2,
        height: 500
    });

</script>


@endsection
