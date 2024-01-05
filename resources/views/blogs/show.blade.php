@extends('layouts.master')
@section('css')
@endsection
@section('title')
   Show your Blog
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Blogs</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Blog_details  </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- row -->
    <div class="row mb-4">
        <div class="col-md-6 offset-md-6 text-right">
            <form action="{{route('like')}}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                <button name="like" type="submit" style="border-radius: 10px; background-color:blue; padding: 5px;">
                    <img src="{{ asset('assets/img/th (4).jpg') }}" alt="Like" width="30px">
                </button>

            </form>

            <form action="{{route('dislike')}}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                <button type="submit" style="border-radius: 10px; background-color:blue; padding: 5px;">
                    <img src="{{ asset('assets/img/OIP.jpg') }}" alt="Dislike" width="30px">
                </button>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Blog ID  </label>
                                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                     value="{{ $blogs->id }}" required
                                    readonly>
                            </div>

                            <div class="col">
                                <label>Blog Title</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $blogs->title }}" required readonly>
                            </div>

                            <div class="col">
                                <label>Blog content </label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $blogs->title }}" required readonly>
                            </div>

                        </div>

                        {{-- 2 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">Blog Image</label>
                                <img src="{{ asset('images/'.$blogs->image) }}" alt="Image">

                            </div>
                            <div class="col">
                                <label>User name </label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ auth()->user()->name }}" required readonly>
                            </div>





                        </div>



                    </form>
                </div>

            </div>
            <form action="" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="blog_id" value="{{ $blogs->id }}">

                <div class="form-group">
                    <label for="comment">Add a Comment if you have</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit Your Comment</button>
            </form>

            </div>


        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>


@endsection
