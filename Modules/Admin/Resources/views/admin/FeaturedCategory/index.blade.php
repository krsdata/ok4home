@extends('admin::admin.master')
@section('title', "Featured Category management")
@section('css')
 
 @stop
 
 @section('heading')
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{URL('/o4k')}}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="{{URL('/o4k/FeaturedCategory')}}"><i class="icon-list position-left"></i>Featured Category management</a></li>
           
        </ul>

    </div>

        <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Featured Category management <small>Hello, {{Auth::guard('admin')->user()->name}}!</small></h4>
        </div>

        <div class="heading-elements">
           <a type="button" href="{{ URL::to('o4k/FeaturedCategory/create')}}" class="btn bg-primary-400 btn-labeled btn-rounded legitRipple"><b><i class="icon-plus3"></i></b> Add Featured Category</a>
       </div>
    </div>
@stop
 
 
 @section('content') 
    <div class="panel panel-flat">
        @if(Session::has('val')) 
            @if(Session::get('val')==1)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="padding-right: 14px;">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{Session::get('msg')}}
                </div>
            @endif
        @endif
        <div class="panel-heading">
            <h5 class="panel-title">Featured Category List<a class="heading-elements-toggle"> <i class="icon-more"></i> </a></h5>
        </div>
        
        <div class="panel-body">
            <table class="table datatable-basic table-bordered table-hover" id="property_list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                         <th class="text-center">Actions</th>
                    </tr>
                </thead>
                    <tbody>  </tbody>
            </table> 
        </div>


    </div>

@stop
  
  
@section('js')
    <script type="text/javascript" src="{{asset('public/admin/js/plugins/tables/datatables/datatables.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('public/admin/js/custom/datatable-extend.js')}} "></script>
    <script type="text/javascript" src="{{asset('public/admin/js/pages/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Modules/Admin/Resources/assets/js/FeaturedCategoryControles.js')}}"></script>
@stop
  
