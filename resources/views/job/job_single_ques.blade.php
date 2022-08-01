@extends('layouts.app')

@section('title', 'Job-Single-Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Single Question</h1>
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
                    @if($question->passage_id != '0')
                    <div class="card-header p-10">
                        <h3 class="card-title text-gray-700  mb-0 view">
                            <span class="text-black fs-4 text-justify lh-base" style="text-align: justify"><span class="fs-6 text-muted fw-bold" style="color: black">Read the passage and answer the following question :</span><br><br> {!! $question->passage->passage !!} </span>
                        </h3>
                    </div>
                    @endif
                    <!--begin::Body-->
                    <div class="card-body ">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column">
                            <!--end::Content-->
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="card card-bordered mb-5">
                                        <div class="card-header">
                                            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                <a href="{{ route('job.single-question',['ques_id' => $question->id]) }}"><span >{{$question->question}} </span> </a>
                                            </h3>
                                            <div class="card-toolbar">
                                                <!--begin::button-->
                                                <button type="button" class="btn btn-sm btn-light btn-active-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                                                <!--end::button-->
                                                <!--begin::menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                                    <!--begin::Heading-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Options</div>
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="javascript:;" class="menu-link px-3 editQuestion" data-id="{{ $question->id }}">Edit Question</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $question->id }}" >Add Description</a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    {{-- <div class="menu-item px-3 my-1">
                                                        <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}" class="menu-link px-3">View Comment</a>
                                                    </div> --}}
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{-- question image start--}}
                                            <div class="text-center mb-3">
                                                @if($question->question_type == 'image')
                                                @isset($question->question_option->image_question)
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_question) }}" class="h-150 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                @endisset
                                                @endif
                                            </div>
                                            {{-- question image end  --}}

                                            <div class="row"  style="font-size: 16px">
                                                <div class="col-md-6">
                                                    <p class="{{ $question->question_option->answer == 1 ? 'text-success' : 'text-gray-800'}} fw-bold " >
                                                        <span>
                                                            <i class="{{ $question->question_option->answer == 1 ? 'fas fa-check-circle text-success fa-2xl' : 'fas fa-dot-circle fa-2xl'}}"></i>
                                                        </span> {{$question->question_option->option_1 }}
                                                    </p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="{{ $question->question_option->answer == 2 ? 'text-success' : 'text-gray-800'}} fw-bold " >
                                                        <span>
                                                            <i class="{{ $question->question_option->answer == 2 ? 'fas fa-check-circle text-success fa-2xl' : 'fas fa-dot-circle fa-2xl'}}"></i>
                                                        </span> {{$question->question_option->option_2}}
                                                    </p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="{{ $question->question_option->answer == 3 ? 'text-success' : 'text-gray-800' }} fw-bold">
                                                        <span>
                                                            <i class="{{ $question->question_option->answer == 3 ? 'fas fa-check-circle text-success fa-2xl' : 'fas fa-dot-circle fa-2xl'}}"></i>
                                                        </span> {{$question->question_option->option_3 }}
                                                    </p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                @isset($question->question_option->option_4)
                                                <div class="col-md-6">
                                                    <p class="{{ $question->question_option->answer == 4 ? 'text-success' : 'text-gray-800'}} fw-bold " >
                                                        <span>
                                                            <i class="{{ $question->question_option->answer == 4 ? 'fas fa-check-circle text-success fa-2xl' : 'fas fa-dot-circle fa-2xl'}}"></i>
                                                        </span> {{ $question->question_option->option_4 }}
                                                    </p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endisset
                                                @isset($question->question_option->option_5)
                                                <div class="col-md-6">
                                                    <p class="{{ $question->question_option->answer == 5 ? 'text-success' : 'text-gray-800'}} fw-bold " >
                                                        <span>
                                                            <i class="{{ $question->question_option->answer == 5 ? 'fas fa-check-circle text-success fa-2xl' : 'fas fa-dot-circle fa-2xl'}}"></i>
                                                        </span> {{ $question->question_option->option_5 }}
                                                    </p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endisset
                                            </div>

                                            {{-- Sart:: Question Tag --}}
                                            @foreach($question->subjects as $tag)
                                                <span class="badge badge-success fs-8 mb-3 tag">{{ $tag->name }}</span>
                                            @endforeach
                                            {{-- end:: Question Tag --}}

                                            {{-- <div class="row">
                                                <!--end::Input group-->
                                                @if($question->descriptions->count() > 0)
                                                    @foreach($question->descriptions as $description)
                                                    <span class="text-muted d-flex justify-content-between">
                                                        <span>added by <span class="text-uppercase text-black fw-bolder fs-7">{{ $description->created_by->name }}</span></span>
                                                        <span> {{ $description->created_at  }}</span>
                                                    </span>
                                                    <span class="text-gray-800 fw-bold ml-4 cursor-pointer update-des" data-description_id={{ $description->id }} style="text-align: justify">{{ $description->description }}</span>
                                                    @endforeach
                                                @endif

                                                <!-- start: update description -->
                                                <div class="d-flex flex-column mt-2 fv-row update-form">

                                                </div>
                                                <!-- end: description update -->


                                                <!-- Start: description add -->
                                                <span class="add-description cursor-pointer" data-question_id="{{ $question->id }}"><i class="fas fa-plus-circle fa-2xl"></i> <span class="fw-bolder fs-5">Description</span> </span>
                                                <div class="d-flex flex-column mt-2 fv-row add-des-form">

                                                </div>
                                                <!-- end: description add -->
                                            </div> --}}



                                        </div>
                                        <div class="card-footer py-3 my-0">
                                           <div class="d-flex justify-content-between align-items-center">
                                                <div class="description">
                                                    <h5>Description</h5>
                                                </div>
                                                <div class="activity">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"
                                                        data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Bookmark">
                                                            <i class="fas fa-bookmark"></i>
                                                        </a>
                                                        <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Like">
                                                            <i class="fas fa-heart"></i>{{$question->vote}}
                                                        </a>
                                                        <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Total view">
                                                            <i class="fas fa-eye fa-xl"></i> {{$question->view_count}}
                                                        </span>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Content-->
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
@include('job.job_include.bookmark_modal')
<!--end:Bookmark modal -->

<!--begin::Modal - New Description-->
@include('job.job_include.add_description_modal')
<!--end::Modal - New Description-->


<!--begin::Modal - Edit Question-->
<div class="modal fade" id="kk_edit_question_modal" tabindex="-1" aria-hidden="true">
    <div id="edit_question_data"></div>
</div>
<!--end::Modal - Edit Question-->

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
        $('.messages').empty();
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
                    var alertBox = '<div class="alert alert-danger alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_bookmark_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_bookmark_form')[0].reset();
                    $("#kk_modal_new_bookmark").modal('hide');

                    toastr.success(data.message);
                }

                $('.indicator-progress').hide();
                $('.indicator-label').show();
            }
        });

    })
    /**end::Question Bookmark**/

    /**begin::Question Edit**/
    //edit Question
    $('.editQuestion').on('click', function() {
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            type:"GET",
            url: "{{ url('/question/edit-question')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
                $("#edit_question_data").html(data.html);
                $("#kk_edit_question_modal").modal('show');
            }
        });
    });

    //edit question cancel button
    $(document).on('click', '#kk_modal_new_service_cancel', function(){
        $("#kk_edit_question_modal").modal('hide');
    })

    //update edited question
    $(document).on('submit', '#kk_modal_question_update_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('');
        $('.indicator-label').hide();
        $('.indicator-progress').show();

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('/question/edit-question/update')}}",
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
                    $('#kk_modal_question_update_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_question_update_form')[0].reset();
                    $("#kk_edit_question_modal").modal('hide');

                    toastr.success(data.message);

                }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

            }
        });
    })
    /**end::Question Edit**/

    /**begin::Description **/

    $('.addDescription').on('click', function() {
        var id = $(this).data('id');
        //console.log(id);

        $('.with-errors').text('');
        $('#kk_modal_new_question_des_form')[0].reset();

        $('input[name="question_id"]').val(id);
        $('#kk_modal_new_question_des').modal('show');
    });


    //new description save
    $('#kk_modal_new_question_des_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('');
        $('.indicator-label').hide();
        $('.indicator-progress').show();

        var formData = new FormData(this);
        formData.append('description', myEditor.getData());
        $.ajax({
            type:"POST",
            url: "{{ url('description/question-description/store')}}",
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
                    $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_question_des_form')[0].reset();
                    $("#kk_modal_new_question_des").modal('hide');

                    toastr.success(data.message);
                }

                $('.indicator-label').show();
                $('.indicator-progress').hide();
                $('#kk_modal_new_service_submit').removeAttr('disabled');

            }
        });

    })
    /**end::Description**/

</script>
@endpush
