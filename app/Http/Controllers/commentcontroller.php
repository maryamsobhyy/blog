<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class commentcontroller extends Controller
{
    public function store(request $request)
    {
        // To validate data
        $validatedData = $request->validate([
            'comment' => 'required|string|max:1000',

        ]);
        $blog_id=$request->blog_id;
        // To save photo in folder in project
        comment::create([
            'blog_id' => $blog_id,
            'comment' => $request->comment,
            ]);
            session()->flash('Add', 'The Comment added sucessfully');
            return redirect()->route('allblogs');

    }
}
