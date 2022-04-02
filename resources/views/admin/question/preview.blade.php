@extends('admin.layout.app')
@section('title', 'Question Preview')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex  flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Question</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Preview Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
       
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
       
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8" >
            <div class="col-10 mb-xl-10">
                <!--begin::Engage widget 1-->
                <div class="card h-md-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column flex-center">
                        <!--begin::Heading-->
                        <div class="mb-2">
                            <!--begin::Title-->
                            <h1 class="fw-bold text-gray-800 text-center lh-lg">
                                @if($questions->count() > 0)
                                    Question Preview
                                @else
                                    No Preview Question
                                <br><a href="{{ route('admin.question.create') }}"><span class="fw-boldest">click here to add Question </a></span>
                                @endif
                            </h1>
                            <!--end::Title-->
                            
                        </div>
                        <!--end::Heading-->
                       
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 1-->
            </div>
        </div>
        <!--end::Row-->
       
        
      
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
           

            <!--begin::Col-->
            <div class="col-xl-10 col-md-10 col-sm-12 col-xs-12" id="question">
              
                @if($questions->count() > 0)
                @foreach($questions as $key => $question)
                <!--begin::Feeds Widget 2-->    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                        @if($question->passage_id != '')
                        <h5 class="mt-5">
                            <div class="col-md-12 ">
                                <p class="text-gray-800 fw-normal" style="line-height: 22px">
                                    <span style="color: black; font-weight:600">Read the following passage and answer this Question :</span> <br>
                                    {{ $question->passage->passage }}
                                </p>
                            </div>
                        </h5>
                        @endif
                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view"  style="max-width: 1100px !important;">
                                 {{ $key+1 }}. {{$question->question}} 
                        </h3>
                       
                        <div class="card-toolbar">
                           <!--begin::Menu-->
                           <button type="button" class="btn btn-sm btn-light btn-active-light-primary fw-bold edit" data-id="{{ $question->id }}" >Edit</button>
                            
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        @if($question->question_type == 'mcq')
                        <div class="row"  style="font-size: 16px">
                            @if($question->option_1 != '' )
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($question->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_1 }}</p>
                            </div>
                            @endif
                            @if($question->option_2 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($question->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_2 }}</p>
                            </div>
                            @endif
                            @if($question->option_3 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_3}}</p>
                            </div>
                            @endif
                            @if($question->option_4 != '' )
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->option_4}}</p>
                            </div>
                            @endif
                            @if($question->option_5 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->option_5}}</p>
                            </div>
                            @endif
                        </div>
                        @elseif($question->question_type == 'samprotik')
                        <div class="row"  style="font-size: 16px">
                            @if($question->answer != '' )
                            <div class="col-md-12 reading">
                                <p class="text-gray-800 fw-normal mb-5 " > 
                                   <i class="fas fa-check fa-2xl"></i> {{$question->answer }}</p>
                            </div>
                           
                            @endif 
                        </div>
                        @elseif($question->question_type == 'written')
                        <div class="row"  style="font-size: 16px">
                            @if($question->written_answer != '' )
                            <div class="col-md-12 reading">
                                <p class="text-gray-800 fw-normal mb-5 " > 
                                   <i class="fas fa-check fa-2xl"></i> {{$question->written_answer }}</p>
                            </div>
                            @endif 
                        </div>
                        @else
                        @php
                        var_dump($question->image_option);
                            //$images['data'] = json_decode($question->image_option, true);
                            // //var_dump( $images['data'] );
                            // foreach($images['data'] as  $image){
                            //     //var_dump($image);
                            //    foreach ($image as $image_option) {
                            //       var_dump($image_option);
                            //    }
                            // }
                        @endphp
                        <div class="row"  style="font-size: 16px">
                            @if($question->option_1 != '' )
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-3 {{ ($question->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($question->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_1 }}</p>
                                    <div class="symbol symbol-45px me-2 mb-5">
                                        <span class="symbol-label">
                                            {{-- <img src="{{ asset($question->image_option[0]['option_0']) }}" class="h-50 align-self-center" alt=""> --}}
                                        </span>
                                    </div>
                            </div>
                            @endif
                            @if($question->option_2 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-3  {{ ($question->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($question->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_2 }}</p>
                                    <div class="symbol symbol-45px me-2 mb-5">
                                        <span class="symbol-label">
                                            {{-- <img src="{{ asset($question->image_option[1]['option_1']) }}" class="h-50 align-self-center" alt=""> --}}
                                        </span>
                                    </div>
                            </div>
                            @endif
                            @if($question->option_3 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-3  {{ ($question->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->option_3}}</p>
                                    <div class="symbol symbol-45px me-2 mb-5">
                                        <span class="symbol-label">
                                            {{-- <img src="{{ asset($question->image_option[2]['option_2']) }}" class="h-50 align-self-center" alt=""> --}}
                                        </span>
                                    </div>
                            </div>
                            @endif
                            @if($question->option_4 != '' )
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-3  {{ ($question->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->option_4}}</p>
                                    <div class="symbol symbol-45px me-2 mb-5">
                                        <span class="symbol-label">
                                            {{-- <img src="{{ asset($question->image_option[3]['option_3']) }}" class="h-50 align-self-center" alt=""> --}}
                                        </span>
                                    </div>
                            </div>
                            @endif
                            @if($question->option_5 != '')
                            <div class="col-md-6 reading">
                                <p class="text-gray-800 fw-normal mb-3  {{ ($question->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->option_5}}</p>
                                    <div class="symbol symbol-45px me-2 mb-5">
                                        <span class="symbol-label">
                                            {{-- <img src="/metronic8/demo1/assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt=""> --}}
                                        </span>
                                    </div>
                            </div>
                            @endif
                        </div>
                        
                        @endif

                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                        {{-- <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                            <a href="javascript:;" class="comment me-2 btn btn-sm btn-light btn-color-muted btn-active-light-info px-4 py-2"  
                            data-text="comment"  title="Comment">
                            <i class="fas fa-comment"></i>
                            </a>
                            <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                            data-id="{{ $question->id }}" data-catid="{{ $question->sub_category->category->id }}" title="Bookmark">
                            <i class="fas fa-bookmark"></i>
                            </a>
                            <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" title="like">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <i class="fas fa-heart"></i>
                            <!--end::Svg Icon-->{{$question->vote}}</a>
                            <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-2">
                                <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                            </a>
                        </div> --}}
                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        {{-- <div class="m-0">
                           
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center  collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$question->id}}" aria-expanded="false">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <i class="fas fa-caret-up fa-2xl"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <i class="fas fa-caret-down fa-2xl"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                   
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h5 class="text-gray-700 fw-bolder cursor-pointer mb-0">Description</h5>
                                <p class="badge badge-light-success fw-bolder">{{ $question->descriptions->count() }}</p>
                                <!--end::Title-->
                                
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_4_1_{{$question->id}}" class="fs-6 ms-1 collapse" style="">
                               <!--begin::Text-->
                                @foreach($question->descriptions as $description)
                                    @include('question.description')
                                @endforeach
                                <!--end::Text-->
                            </div>
                            <!--end::Content-->
                            
                        </div> --}}
                        <!--end::Section-->
                        <!--end::Accordion-->
                            
                    </div>
                </div>
                <!--end::Feeds Widget 2-->

            
                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_show_question" tabindex="-1" aria-hidden="true">
                {{-- @include('admin.question.view_question_modal') --}}
                <div id="edited_question_view_modal"></div>
                </div>
                <!--end::Modal - New Product/Service-->
                
                @endforeach
                {{-- <div class="d-flex justify-content-end">
                    {{ $questions->links() }}
                </div> --}}
                <div class="d-flex justify-content-end mb-4 mt-4">
                <button type="submit" class="btn btn-primary" id="confirm_submission" data-text="confirm">Confirm Submission</button>
                </div>
               
                @endif
            </div>
            <!--end::Col-->
            
           
        </div>
    </div>
</div>
<!---end::Post -->
@endsection

@push('script')
    <script type="text/javascript">

    $(document).ready(function(){
        //edit
        $('.edit').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/edit-question/modal')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $("#edited_question_view_modal").html(data.html);
                    $("#kk_modal_show_question").modal('show');
                }
            });
        })

        //cancel button
        $(document).on('click', '#kk_modal_new_service_cancel', function(){
            
            $("#kk_modal_show_question").modal('hide');
        })

        //update
        $(document).on('submit', '#kk_modal_new_question_form', function(e){
            e.preventDefault()
            console.log('here')
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('admin/question/edit-question/update')}}",
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
                        $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_question_form')[0].reset();
                        $("#kk_modal_show_question").modal('hide');

                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh page
                                location.reload()
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
            });
        })

        //confirm submission
        $("#confirm_submission").on('click', function(){
            var val = $(this).data('text')
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/store')}}"+'/'+val,
                dataType: 'json',
                success:function(data){
                    toastr.success(data.message);
                    window.setTimeout(function(){
                        window.location = data.redirect_url;
                    }, 1000);
                   
                }
            });

        })
    })
      
    </script>
@endpush
