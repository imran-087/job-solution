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
                <h4 class="badge badge-light me-2">Total input by {{Auth::user()->name}} : <span class="text-danger fs-5">{{$questions->count()}} </span></h4>
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
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card" style="margin-top:20px">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.samprotik.preview') }}">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Samprotik Question Input</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">Fill up the form and submit
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin:menu -->
                        <!--begin::Input group-->
                        <div class="row g-9 pb-4">
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                {{-- <label class="required fs-6 fw-bold mb-2">Question Type</label> --}}
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select category" name="category" id="category">
                                    <option value="bn" selected>Bangladesh</option>
                                    <option value="in">International</option>
                                    <option value="bn_in">Bangladesh & International</option>
                                </select>
                                @error('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                {{-- <label class="required fs-6 fw-bold mb-2">Question Type</label> --}}
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select" name="option" id="option">
                                    <option value="0" selected>Without Option</option>
                                    <option value="1">With Option</option>
                                </select>
                                @error('option')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                               
                                <input type="date" class="form-control form-control-solid" placeholder="Pic previous date"
                                    name="date" id="date" />
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                <!--begin::Label-->
                                {{-- <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Number of Question</span>
                                </label> --}}
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Number of Question"
                                    name="number" id="number" />
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Input group-->
                        <!--end:menu -->

                        <!--start::samprotik question input--> 
                        <div id="samprotik"></div>     
                        <!--end::samprotik question input--> 

                        </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card--> 

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#kk_modal_new_samprotik_form').on( "keypress", function(event) {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                //console.log('here')
                var category =  $("#category").find(':selected').val();
                var option =  $("#option").find(':selected').val();
                var number = $('#number').val();
                var date = new Date($('#date').val());
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                date = ([day, month, year].join('-'));
           
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/question/samprotik-question/input')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        category: category,
                        option : option,
                        number : number,
                        date : date
                    },
                    //If result found, this funtion will be called.
                    success: function(data) {
                        $('#samprotik').html(data.html)
                    }
                });
            }
        });
    })
</script>
@endpush
  


        

      

                       