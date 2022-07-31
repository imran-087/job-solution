@extends('layouts.app')

@section('title', 'Job-Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Job - {{ $sub_category->category->name ?? '' }}</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('job.home') }}" class="text-muted text-hover-primary">Job Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Questions</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb--> 
        </div>
        <!--end::Page title-->
        <!--begin::Action-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
            <!--end::Button-->
        </div>
        <!--end::Action-->
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::row-->
        <div class="row g-5 g-xl-10">
            <!--begin::col-->
            <div class="col-sm-12 col-md-8">
                <!--begin::card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column">
                            <!--begin::Content-->
                            @isset($sub_category)
                            <div class="question-header mb-9 bg-light-primary px-0 mx-0 py-5 rounded">
                                <div class=" d-flex flex-column align-items-center justify-content-center ">
                                    <h3 class="">{{$sub_category->name }} {{ $sub_category->year->year ?? '' }}</h3>
                                    <span class="text-success fs-6 fw-bolder">{{ $subject->name ?? 'All Question' }}</span>
                                </div>
                            </div>
                            @endisset
                            <!--begin::Tabs wrapper-->
                            <div class="d-flex flex-center mb-5">
                                <!--begin::Tabs-->
                                <div class="mb-5 hover-scroll-x">
                                    <div class="d-grid">
                                        <ul class="nav nav-tabs flex-center flex-nowrap text-nowrap mb-2 fw-bolder fs-5">
                                            @foreach($subjects as $subject)
                                            <li class="nav-item">
                                                <a href="{{ route('job.question', ['sub_cat' => $sub_category->id, 'subject' => $subject->subject->id]) }}" 
                                                    class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 {{ request()->get('subject') == $subject->subject->id ? 'active' : '' }} ">
                                                    {{ $subject->subject->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                            <li class="nav-item">
                                                <a href="{{ route('job.question', ['sub_cat' => $sub_category->id, 'subject' => 'all']) }}" 
                                                    class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 {{ request()->get('subject') == 'all' ? 'active' : '' }} ">
                                                    All
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Tabs-->
                            </div>
                            <!--end::Tabs wrapper-->
                            
                            @php $serial_number = 1; @endphp
                            @if($questions->count() > 0)
                            <div class="row">
                            @foreach($questions as $question)
                                <div class="col-md-12">
                                    @include('job.job_include.question_card')
                                </div>
                                @php $serial_number++ ; @endphp
                            @endforeach
                            </div>
                            @else
                            <div class="card card-bordered mb-5">
                                <div class="card-header d-flex align-items-center justify-content-center ">
                                    <h3 class="text-danger">No Question found !!!</h3>
                                </div>
                            </div>
                            @endif

                            @if($passages->count() > 0)
                            <div class="col-md-12">
                                <!--begin::apassage question-->
                                <div class="row" >
                                    @foreach($passages as $key => $passage)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-bordered mb-5">
                                                <div class="card-header p-10">
                                                    <h3 class="card-title text-gray-700  mb-0 view">
                                                        <span class="text-black fs-4 text-justify lh-base" style="text-align: justify"><span class="fs-6 text-muted fw-bold" style="color: black">Read the passage and answer the following question :</span><br><br> {!! $passage->passage !!} </span>
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                    @foreach($passage->questions as $question)
                                                    <div class="col-md-12">
                                                        @include('job.job_include.question_card')
                                                    </div>
                                                    @php $serial_number++ ; @endphp
                                                    @endforeach
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--end::passage question-->
                            </div>
                            @endif

                            <!--end::Content-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::card-->
            </div>
            <!--end::col-->
            <!--begin::col-->
            <div class="col-md-4 d-none d-md-block">
                <!--begin::card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-15">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-lg-row">
                            <!--begin::Sidebar-->
                            <div class="flex-column flex-lg-row-auto w-100  mb-10">
                                <!--begin::Catigories-->
                                <div class="mb-15">
                                    <h4 class="text-dark">{{ $sub_category->category->name }}</h4>
                                    <span class="text-muted fs-6 fw-bold">Related Exam</span>
                                    <!--begin::Menu-->
                                    <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary fs-6 fw-bold mt-7">
                                        @foreach($sub_categories as $subcategory)
                                        <!--begin::Item-->
                                        <div class="menu-item mb-1">
                                            <!--begin::Link-->
                                            <a href="{{ route('job.subject', ['sub_category' => $subcategory->id]) }}" class="menu-link text-dark text-hover-primary bg-light py-3 ">{{ $subcategory->name }}</a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        @endforeach
                                        <!--begin::Item-->
                                        <div class="menu-item mb-1">
                                            <!--begin::Link-->
                                            <a href="{{ route('job.sub-category', ['category' => $sub_category->category->id ]) }}" class="menu-link text-dark text-hover-primary bg-light py-3 ">All - {{ $sub_category->category->name }}</span></a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Catigories-->
                                <!--begin::Recent posts-->
                                <div class="m-0">
                                    <h4 class="text-dark mb-7">Recent Posts</h4>
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label" style="background-image: url('/metronic8/demo1/assets/media/stock/600x400/img-1.jpg')"></div>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">About Bootstrap Admin</a>
                                            <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">We’ve been a focused on making a the sky</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label" style="background-image: url('/metronic8/demo1/assets/media/stock/600x400/img-2.jpg')"></div>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">A yellow sofa</a>
                                            <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">We’ve been a focused on making a the sky</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label" style="background-image: url('/metronic8/demo1/assets/media/stock/600x400/img-3.jpg')"></div>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Our Camra Mega Set</a>
                                            <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">We’ve been a focused on making a the sky</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-60px symbol-2by3 me-4">
                                            <div class="symbol-label" style="background-image: url('/metronic8/demo1/assets/media/stock/600x400/img-4.jpg')"></div>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="m-0">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Time to cook and eat?</a>
                                            <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">We’ve been a focused on making a the sky</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Recent posts-->
                            </div>
                            <!--end::Sidebar-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::card-->
            </div>
            <!--end::col-->
        </div>
        <!--end::row-->
         
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->

<!--begin:Bookmark modal -->
@include('job.job_include.bookmark_modal');
<!--end:Bookmark modal -->


@endsection

@push('script')
<script type="text/javascript">
    /**start::vote**/
    $('.vote').on('click', function(){
        var id = $(this).data('id');
        var val = $(this).text();
        var click_element = $(this);
        // console.log(id);
        // console.log(val);
       
        $.ajax({
            type:"GET",
            url: "{{ url('question/vote')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
                if(data.success){
                    click_element.html(`<i class="fas fa-heart"></i>`+(parseInt(val)+1))
                    //toastr.success(data.message);
                }else{
                    //toastr.warning(data.message);
                }
            }
        })
    });
    /**end::vote**/

    /**start::Question viewcount**/
    $('.view').on('click', function(){
        var id = $(this).data('id');
        //console.log(id);

        $.ajax({
            type:"GET",
            url: "{{ url('question/view-count')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
                
            }
        })
    });
    /**end::Question viewcount**/

    /**end::Question Bookmark**/
    //add new
    $('.bookmark').on('click', function() {
        var id = $(this).data('id');
        var catid = $(this).data('catid');
        // console.log(id);
        // console.log(catid);
        //$(this).children().addClass('svg-icon-primary');
        $('.with-errors').text('');
        $('#kk_modal_new_bookmark_form')[0].reset();

        //append category_id and question_id into bookmark form
        $('input[name="question_id"]').val(id);
        $('input[name="catid"]').val(catid);
        $('#kk_modal_new_bookmark').modal('show');
    });

    //cancel button
    $('#kk_modal_new_service_cancel').on('click', function(){
        $('.with-errors').text('');
        $('.indicator-label').show();
        $('.indicator-progress').hide();
        $('#kk_modal_new_bookmark_form')[0].reset();
        $('#kk_modal_new_bookmark').modal('hide');
    })

    //new bookmark save
    $('#kk_modal_new_bookmark_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('');
        $('.indicator-label').hide();
        $('.indicator-progress').show();
       
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('question/bookmark')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_bookmark_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_bookmark_form')[0].reset();
                    $("#kk_modal_new_bookmark").modal('hide');

                }

                $('.indicator-progress').hide();
        
            }
        });

    })
    /**end::Question Bookmark**/

</script>
@endpush
