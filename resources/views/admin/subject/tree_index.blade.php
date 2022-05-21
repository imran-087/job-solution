@extends('admin.layout.app')
@section('title', 'Question')

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
                    <li class="breadcrumb-item text-muted">Question Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">All Question</li>
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
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
             {{-- <div class="row">
                <!--begin::Categories-->
                <div class="col-xl-3">
                    <!--begin::List Widget 5-->
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Categories</span>
                                <span class="text-muted fw-bold fs-7">{{$data->count()}} Types</span>
                            </h3>
                        
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Timeline-->
                            <div class="timeline-label mb-5">
                                @foreach($data as $main_category)
                                <!--begin::Item-->
                                <div class="timeline-item">
                                   <div class="timeline-label fw-normal text-muted text-gray-800 fs-6 "></div>
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-warning fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    
                                    <!--begin::Text-->
                                    <div class="fw-bolder timeline-content cursor-pointer ps-3 border p-3 rounded " data-id="{{ $main_category->id }}" >
                                        {{$main_category->name}}  
                                    </div>
                                    <!--end::Text-->
                                    @php
                                        $categories = App\Models\Category::with('sub_categories')->where('main_category_id', 2)->get();
                                    @endphp
                                    <!--begin::Text-->
                                    @if($main_category->id == '2')
                                    @foreach($categories as $category)
                                    @foreach($category->sub_categories as $sub_category)
                                    <div class="fw-bolder timeline-content cursor-pointer ps-3 border p-3 rounded " data-id="{{ $sub_category->id }}" >
                                        {{$sub_category->name}}  
                                    </div>
                                    @endforeach
                                    @endforeach
                                    <!--end::Text-->
                                    @endif
                                </div>
                                <!--end::Item-->
                                @endforeach
                            </div>
                            <!--end::Timeline-->
                        </div>
                        <!--end: Card Body-->
                    
                    </div>
                    <!--end: List Widget 5-->
                </div>
                <!--end::Categories-->

                <!--begin::SubCategories-->
                <div class="col-md-9">
                    <!--begin::render sub cmain_category-->    
                   
                </div>
                <!--end::SubCategories-->
            </div> --}}
            <div class="card card-xl-stretch">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <input type="text"  class="form-control form-control-solid w-250px " id="search_subject" placeholder="search subject">
                        </div>
                        <div class="col-xl-3 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Filter by category"  id="main_category">
                                <option ></option>
                                @foreach($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                             <button class="btn btn-success float-right ml-1" type="button" onclick="jstree_save();">
                                <i class="fas fa-check"></i><strong> Save</strong>
                            </button>
                        </div>
                    </div>
                    <div id="jstree">
                        
                    </div>
                </div>
            </div>
            
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


@endsection


@push('script')
   
    <script>

        $('#jstree').jstree({
            'core' : {
                'data' : {
                    'url' : '{{route('admin.subject.tree')}}',
                    'data' : function (node) {
                        return { 'id' : node.id };
                    }
                },
                "check_callback" : true,
            },
            "plugins" : [ "search", "dnd", "contextmenu" ],
            'search': {
                show_only_matches: true
            },
            
        });
        var to = false;
        $('#search_subject').keyup(function () {
            if(to) { clearTimeout(to); }
            to = setTimeout(function () {
            var v = $('#search_subject').val();
            $('#jstree').jstree(true).search(v);
            }, 250);
        });

        //category filter
          $('#main_category').change(function(){
            let oTree =  $('#jstree').jstree(true);
            let val = $(this).val();
            //console.log(val);
            oTree.settings.core.data = {
                url: "{{route('admin.subject.tree')}}",
                data : function (node) {
                        return { 'id' : node.id, 'main_category_id': val };
                    }
            };
            oTree.refresh()
           
        })

        function jstree_save () {
        // Get the current state of the tree structure with get_json. (I don't need the atr, li properties and state property.)
        
            var treeData =$("#jstree").jstree(true).get_json('#',{no_a_attr:true,no_li_attr:true,no_state:true});
            $.ajax({
                url: '{{route('admin.subject.store_tree')}}',
                type: 'POST',
                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { 
                    '_token' : "{{ csrf_token() }}",
                    data: treeData 
                },
            });
        }
           
    </script>
@endpush
