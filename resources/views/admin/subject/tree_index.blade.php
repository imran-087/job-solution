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
            <div class="card card-xl-stretch">
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <input type="text"  class="form-control form-control-solid w-250px " id="search_subject" placeholder="search subject">
                        </div>
                        <div class="col-md-3 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Filter by category"  id="main_category">
                                <option value="">Select category</option>
                                @foreach($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4 fv-row">
                             <button class="btn btn-success btn-sm float-right px-7" type="button" onclick="jstree_save();">
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
                success: function(data) {
                    if(data.success){
                        toastr.success(data.message);
                        location.reload();
                    }else{
                        toastr.error(data.message);
                    }
                }
            });
        }
           
    </script>
@endpush
