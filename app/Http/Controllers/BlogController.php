<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\like;
use App\Models\comment;
use Illuminate\Http\Request;
use App\Exports\invoiceexport;
use Maatwebsite\Excel\Facades\Excel;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=blog::get();
        return view('blogs.index',compact('blogs'));

    }
    public function create()
    {
    return view('blogs.create');
    }
    public function store(request $request)
    {
        // TO know who is login and create this blog
        $user_id=auth()->user()->id;

        // To validate data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
        // To save photo in folder in project
        $file = $request->photo;
        $originalName = $file->getClientOriginalName();
        $photo_name=time().'.'.$originalName;
        $path='images';
        $request->photo->move($path,$photo_name);

        blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $photo_name,
            'user_id' => $user_id,


            ]);
            session()->flash('Add', 'The Blog added sucessfully');
            return redirect()->route('allblogs');

    }
    public function like(request $request)
    {
        // TO know who is login and create this blog
        $user_id=auth()->user()->id;

        $blog_id=$request->blog_id;
        like::create([
            'status' => "Like",
            'user_id' => $user_id,
            'blog_id' => $blog_id,
            ]);
            session()->flash('Add', 'You like this blog,we are blessed ');
            return redirect()->route('allblogs');

    }
    public function dislike(request $request)
    {
        // TO know who is login and create this blog
        $user_id=auth()->user()->id;

        $blog_id=$request->blog_id;
        like::create([
            'status' => "dislike",
            'user_id' => $user_id,
            'blog_id' => $blog_id,
            ]);
            session()->flash('Add', 'You Dislike this blog , we are Sad ');
            return redirect()->route('allblogs');

    }
    public function print(Request $request,$id)
        {
           $id=$request->id;
           $blogs=blog::where('id',$id)->first();
           return view ('blogs.printblog',compact('blogs'));

        }
    public function delete(Request $request)
        {
            $id=$request->blog_id;
            $blogs=blog::find($id);
            $imagePath = public_path('images/' . $blogs->image);
            if (file_exists($imagePath)) {
            unlink($imagePath);
        }
            $blogs->delete();
            session()->flash('delete', 'The Blog Deleted sucessfully');
            return back();
        }
        public function export()
    {
        return Excel::download(new invoiceexport, 'Blogs.xlsx');
    }
    public function show($id)
    {
        $blogs=blog::find($id);
        return view('blogs.show',compact('blogs'));
    }
    public function edit($id)
    {
        $blogs=blog::find($id);


        return view('blogs.edit',compact('blogs'));
    }
    public function update(Request $request,$id)
    {
        $blogs=blog::find($id);
        $blogs->update([
            'title' => $request->blog_title,
            'content' => $request->blog_content,

            ]);
        session()->flash('Add', 'Blog updated sucessfully');
        return redirect()->route('allblogs');

    }
}
