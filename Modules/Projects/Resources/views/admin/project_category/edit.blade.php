@extends('admin::admin.master')
@section('title', "Admin Property Categories")
@section('css')
 
@stop
@section('breadcrumb')

<div class="breadcrumb-line">
<ul class="breadcrumb">
        <li><a href="{{ URL::to('o4k/')}}"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ URL::to('o4k/project_category')}}"><i class="icon-list position-left"></i>Property Categories</a></li>
        <li class="active">Edit</li>
</ul>
</div>
@stop
@section('heading')
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{URL('/o4k')}}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="{{URL('/o4k/project_category')}}"><i class="icon-list position-left"></i>Property Categories</a></li>
            <li class="active">Edit</li>
        </ul>

    </div>

     <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Property Categories <small>Hello, {{Auth::guard('admin')->user()->name}}!</small></h4>
        </div>

    </div>
@stop
@section('content') 

    <div class="panel panel-flat">
        <div class="showalert">
            @if(Session::has('val')) 
                @if(Session::get('val')==0)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="padding-right:14px;">×</button>
                        <h4><i class="icon fa fa-ban"> Alert!</i></h4> 
                        {{Session::get('msg')}}
                    </div>
                @endif
       
            @endif
        </div>

        <div class="panel-heading">
            <h5 class="panel-title">Edit Property Category<a class="heading-elements-toggle"> <i class="icon-more"></i> </a></h5>
        </div>
		<div class="panel-body">
		<!--- Form -->
            <form action="#" id="project_category_update" autocomplete="off" data-id="{{$project_category->id}}">
				<div class="row">
					<!---Name-->
						<input type="hidden" name="language_en" value="1">
						<input type="hidden" name="id" value="{{$project_category->id}}">
						<div class="form-group col-md-6" id="namebox_en">
							<label>Name in English</label>
							<input  id= "name_en" name="name_en" type="text" class="form-control perm_text" placeholder="Enter Name" data-lang="en"  value="{{$project_category->name}}">
							
							 <span  class="help-block"></span> 
						</div>
						<!----/* Name---->
						<!--- Slug-->
						<div class="form-group col-md-6" id="slugbox_en">
							<label>Slug</label>
								<input id="slug_en"  type="text" name="slug_en"  readonly class="form-control perm_slug" placeholder="Property Category Slug" value="{{$project_category->slug}}">
								 <span  class="help-block"></span> 
						</div>
				</div>
				@php
					$ids = $project_category->types->pluck('id')->toArray();
					$lang_ids = $project_category->types->pluck('language_id')->toArray();
					$names = $project_category->types->pluck('name')->toArray();
					$slugs = $project_category->types->pluck('slug')->toArray();
				@endphp
					@foreach($languages as $language)
						<div class="row">
							@php $key=''; $key = array_search($language->language_id,$lang_ids); @endphp
							<input type="hidden" name="language[]" value="{{$language->language_id}}" >
							<input type="hidden" name="ids[]" value="@if(!empty($project_category->types[0])){{$ids[$key]}}@endif" >
							<div class="form-group col-md-6"  id="namebox_{{$language->languages->lang_code}}">
								<label>Name in {{$language->languages->name}}</label>
								<input id="name_{{$language->languages->lang_code}}" name="name[]" type="text" class="form-control perm_text" placeholder="Enter Name" value="@if(!empty($project_category->types[0])){{$names[$key]}}@endif">
								<input   name="short_name[]" type="hidden" value='{{$language->languages->lang_code}}' class="form-control" >
								<span  class="help-block "></span> 
							</div>
							<div class="form-group col-md-6" id="slugbox_{{$language->languages->lang_code}}">
								<label>Slug</label>
								<input  type="text" id="slug_{{$language->languages->lang_code}}" name="slug[]" readonly class="form-control perm_slug" placeholder="Property Category Slug"  value="@if(!empty($project_category->types[0])){{$slugs[$key]}}@endif">
								 <span  class="help-block "></span> 
							</div>
						</div>
					@endforeach

					<div class="row">
						<!--------- Status------>
						<div class="form-group col-md-6" id="statusbox">
							<label>Status</label>
							<select class="bootstrap-select" name="status_en" id="project_category_status"data-width="100%">
								<option value="1" {{($project_category->status==1)?'selected':''}} >Active</option>
								<option value="0" {{($project_category->status==0)?'selected':''}}>Inactive</option>
							</select>
							 <span  class="help-block "></span>
						</div>

						<div class="form-group col-md-6" id="CategoryTypebox">
                                <label>Category Type</label>
                                <select class="bootstrap-select " data-width="100%"  name="CategoryType[]" id="CategoryType" multiple="true">
                                        <option disabled="true">Select Category Type</option>
                                        @php $selectedType = explode(",",$project_category->master_category_id); @endphp
                                        
                                        @foreach($CategoryType as $Type)
                                        <option value="{{$Type->id}}"  @if(in_array( $Type->id,$selectedType) ) selected @endif >{{$Type->title}}</option>
                                        @endforeach
                                </select>
                                <span  class="help-block"></span> 
                            </div>
										
					</div>


				


					 <div class="row">
						<!--------- Status------>
						<div class="form-group col-md-6" id="bedroombox">
							<label>BED ROOM </label>
							<select class="bootstrap-select" name="bedroom" id="bedroom"data-width="100%" required="true">
								<option value="1" @if($project_category->bedroom_show == '1') selected @endif   >Show</option>
								<option value="0" @if($project_category->bedroom_show == '0') selected @endif  >Hide</option>
							</select>
							 <span  class="help-block "></span>
						</div>

						<div class="form-group col-md-6" id="bathroombox">
							<label>BATH ROOM</label>
							<select class="bootstrap-select" name="bathroom" id="bathroom"data-width="100%" required="true">
								<option value="1" @if($project_category->bathroom_show == '1') selected @endif  >Show</option>
								<option value="0"  @if($project_category->bathroom_show == '0') selected @endif >Hide</option>
							</select>
							 <span  class="help-block "></span>
						</div>

						<div class="form-group col-md-6" id="buildingareabox">
							<label>BUILDING AREA & UNITS </label>
							<select class="bootstrap-select" name="buildingarea" id="buildingarea"data-width="100%" required="true">
								<option value="1" @if($project_category->bulding_area_show == '1'  ) selected @endif  >Show</option>
								<option value="0"  @if($project_category->bulding_area_show == '0'  ) selected @endif  >Hide</option>
							</select>
							 <span  class="help-block "></span>
						</div>

						<div class="form-group col-md-6" id="landareabox">
							<label>LAND AREA & UNITS </label>
							<select class="bootstrap-select" name="landarea" id="landarea"data-width="100%" required="true">
								<option value="1" @if($project_category->landarea_show == '1'  ) selected @endif  >Show</option>
								<option value="0"  @if($project_category->landarea_show == '0'  ) selected @endif  >Hide</option>
							</select>
							 <span  class="help-block "></span>
						</div>
						
										
					</div>


					 <!--Form action-->
                <div class="row">
                    <div class="col-md-12 text-right">
                       <!-- <button type="reset" class="btn btn-default legitRipple" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>-->
                        <button type="submit" id="project_category_update" class="btn btn-primary legitRipple">Update Property Category<i class="icon-paperplane position-right"></i></button>
                    </div>	
                </div>
           <!-- /* Form action -->
			</form>
		</div>
		
	</div>

@stop
  
  
  
@section('js')
   @section('js')

    <script type="text/javascript" src="{{asset('public/admin/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/pages/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Modules/Projects/Resources/assets/js/propertycategorisControles.js')}}"></script>
@stop
  
