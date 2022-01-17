<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Blog;
use Validator;
use Response;
use Session;


class BlogController extends Controller
{  
    
    public function index()
    {   
              $data['allData'] =  Blog::select('*')
                                        ->orderBy('created_at', 'desc')
                                        ->get();  
              return view('index', $data);
    }

    public function addform()
    {   
        if ( Auth::check() ) 
        {
            return view('blogs.add');
        } 
        else {
            return redirect('/login');
        }
    }

    public function show($id)
    {
        //
    }

    public function store(Request $rqst)
    {   
        if ( Auth::check() ) 
        {
            $validator = Validator::make($rqst->all(), [
                'title' => 'required',
                'blogpost' => 'required',
            ]);

            if($validator->fails()){
                $plainErrorText = "";
                $errorMessage = json_decode($validator->messages(), True);
                foreach ($errorMessage as $value) { 
                    $plainErrorText .= $value[0].". ";
                }
                Session::flash('status', $plainErrorText);
                return redirect()->back()->withErrors($validator)->withInput();
            }


        // Insert Data Way One

            // Blog::insert([
            //   'title' => $rqst->title,
            //   'blogpost' => $rqst->blogpost,
            //   'created_by' => Auth::user()->name
            // ]);

        // Insert Data Way Two

            // $blogs = new Blog;
            // $blogs->title = $rqst ->title;
            // $blogs->blogpost = $rqst->blogpost;
            // $blogs->created_by = Auth::user()->name;
            // $blogs->save();

        // Insert Data Way Three

            Blog::create([
              'title' => $rqst->title,
              'blogpost' => $rqst->blogpost,
              'created_by' => Auth::user()->name
            ]);
        
            
        return back()->with('status','Product Insert Successfully');

        } 

        else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        $data['editdata'] = Blog::findOrfail($id);
        return view('blogs.editBlog', $data);


        // return response()->json($data['editdata']);
    }

    public function update(Request $request, $id)
    { 
        $data = Blog::findOrfail($id);
        
        $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'blogpost' => 'required',
                ]);

        if($validator->fails()){
            $plainErrorText = "";
            $errorMessage = json_decode($validator->messages(), True);
            foreach ($errorMessage as $value) { 
                $plainErrorText .= $value[0].". ";
            }
            Session::flash('flash_message', $plainErrorText);
            return redirect()->back()->withErrors($validator)->withInput()->with('status_color','warning');
        }
                
        $input = $request->all();

        try{
          $bug=0;
          $data->update($input);
        }
        catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Information Successfully Updated !');
            return redirect()->back()->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
        }
    }


    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        
        try{
          $bug=0;
          $action = $data->delete();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Data Successfully Deleted !');
            return redirect()->route('Dashboard')->with('status_color','danger');
        }
        else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
        }
    }

    public function eachBlogDetails($id){

 
        $data= Blog::findOrfail($id);

       return view('blogs.eachBlogDetails',compact('data'));

    // return view('blogs.eachBlogDetails',compact('id','data'));
       
    // return view('blogs.eachBlogDetails')->with(['id'=> $id]);


    }

}
