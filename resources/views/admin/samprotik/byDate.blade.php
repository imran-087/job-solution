@extends('admin.layout.app')
@section('title', 'Samprotik-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Samprotik Question</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
           <!--begin::Card-->
            <div class="card mb-5">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <div class="row">
                        <div class="col-md-6 d-flex flex-center" style="border-right: 1px solid gray">
                            <h3 style="color:#D94540">All সাম্প্রতিক Question</h3>
                        </div>
                        <div class="col-md-6">
                            
                            <!--begin::Input group-->
                            <div class="row g-9 pb-4">
                                <!--begin::Col-->
                                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-6 col-xs-6 fv-row ">
                                    {{-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select" name="option" id="option">
                                        <option value="0" selected>Without Option</option>
                                        <option value="1">With Option</option>
                                    </select> --}}
                                    <!-- start: date filter-->
                                <span class="pe-0 text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter by option 
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.samprotik.with-option') }}" class="menu-link px-3">With option</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.samprotik.index') }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Without Option</a>
                                        </div>
                                        <!--end::Menu item-->
                                        
                                    </div>
                                    <!--end::Menu-->
                                </span>
                                <!--end::date filter--> 
                                    
                                </div>
                                <!--end:Col-->
                                
                                <!--begin::Col-->
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-6 fv-row">
                                    <form id="kk_modal_new_samprotik_form" class="form-inline"  method="POST" action="{{ route('admin.samprotik.date-filter') }}">
                                        <div class="messages"></div>
                                        {{-- csrf token  --}}
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="date" class="form-control form-control-solid" placeholder="To"
                                                name="start_date" id="date" />
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" class="form-control form-control-solid" placeholder="From"
                                                name="end_date" id="date" />
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn" ><i class="fas fa-arrow-alt-circle-right"></i></button>
                                            </div>
                                        </div>
                                    
                                    </form>
                                </div>
                                <!--end:Col-->  
                               
                                
                            </div>
                            <!--end::Input group-->
                                
                            
                        </div>
                    </div>
                    
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card--> 
            <!--begin::admin.samprotik question-->    
            <div class="row" id="samprotik_ques">
                @include('admin.samprotik.samprotik')
            </div>
            <!--end::samprotik question-->

            <div class="ajax-load text-center" style="display:none">
                <p><img src="{{ asset('assets/media/gif/loader.gif') }}"></p>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('script')
<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#samprotik_ques").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}

    //filter by with or without option
    // $(document).ready(function(){
    //     $('#option').change(function(){ 
    //         var value = $(this).val();
    //         //console.log(value)
    //         $.ajax({
    //             type:"GET",
    //             url: "{{ url('admin/question/samprotik-question?filter=')}}"+value,
    //             dataType: 'json',
    //             success:function(data){
    //                 $("#samprotik_ques").html(data.html);
    //             }
    //         });
    //     });
       
    // })
</script>
@endpush

