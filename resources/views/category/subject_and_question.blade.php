@extends('layouts.app')
@section('title', 'Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
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
                <li class="breadcrumb-item text-dark">Category</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Subject</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Question</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
            <button class="btn btn-sm btn-primary" id="readingMode" >Reading Mode</button>
            <button class="btn btn-sm btn-danger d-none" id="testMode">Self Test Mode</button>
            <!--end::Primary button-->
        </div>
     
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
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-4" style="max-height: 80vh !important;">
                <!--begin::List Widget 6-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Subjects</h3>
                        
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0">
                        <!--begin::Item-->
                        <a href="{{ route('jobs.sub-category.subject.all-question', [$sub_category->slug, $category->slug]) }}" class="cursor-pointer">
                            <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-warning me-5">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="{{ route('jobs.sub-category.subject.all-question', [ $category->slug, $sub_category->slug]) }}" class="fw-bolder text-gray-800 text-hover-primary fs-6">All Question</a>
                                <span class="text-muted fw-bold d-block">{{ $sub_category->name }}</span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1">{{ $sub_category->question->count() }}</span>
                            <!--end::Lable-->
                            </div>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        @foreach($subjects as $subject)
                        <a href="{{ route('jobs.category.sub-category.subject.question', [$category->slug, $sub_category->slug, $subject->slug]) }}" class="cursor-pointer">
                            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-success me-5">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="{{ route('jobs.category.sub-category.subject.question', [$category->slug, $sub_category->slug, $subject->slug]) }}" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $subject->name }}</a>
                                {{-- <span class="text-muted fw-bold d-block">Due in 2 Days</span> --}}
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-info py-1">{{$subject->question->count()}}</span>
                            <!--end::Lable-->
                            </div>
                        </a>
                        @endforeach
                        <!--end::Item-->
                        
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 6-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-8" id="question">
              
                @foreach($questions as $key => $question)
                <!--begin::Feeds Widget 2-->    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                       
                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 600px !important;">
                                <a href="{{ route('question.single-question', $question->id) }}"> {{ $key+1 }}. {{$question->question}} </a>
                        </h3>
                       
                        <div class="card-toolbar">
                           <!--begin::Menu-->
                           <button type="button" class="btn btn-sm btn-light btn-active-light-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                            
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Question</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('question.edit-question', $question->id) }}" class="menu-link px-3">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3" onclick="addNew()" >Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <h3 class="card-title text-black-700 fw-bolder cursor-pointer mb-5">{{$question->question}}</h3> --}}
                        <!--end::Text-->
                        <div class="row"  style="font-size: 16px">
                            @if(isset($question->question_option->option_1 ))
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 " > 
                                   <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_1 }}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_1 }}</p>
                            </div>
                            @endif
                            @if(isset($question->question_option->option_2))
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_2 }}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_2 }}</p>
                            </div>
                            @endif
                            @if(isset($question->question_option->option_3))
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$question->question_option->option_3}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_3}}</p>
                            </div>
                            @endif
                            @if(isset($question->question_option->option_4 ))
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_4}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_4}}</p>
                            </div>
                            @endif
                            @if(isset($question->question_option->option_5 ))
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$question->question_option->option_5}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$question->question_option->option_5}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('jobs',
                                    [$question->sub_category->category->slug, $question->sub_category->slug, $question->subject->slug]
                                ) }}">{{$question->subject->name}}</a>
                            </button>              
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$question->sub_category->name}}</a>
                            </button>  
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('jobs', $question->sub_category->category->slug) }}">{{$question->sub_category->category->name}}</a>
                            </button>            
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$question->sub_category->category->main_category->name}}</a>
                            </button>            
                        </div>
                        <div class="d-flex justify-content-end "> 
                            <a href="javascript:;" class="btn btn-sm  btn-success me-3 view-ans" id="" data-id="{{ $question->id }}">view ans</a>
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                        <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                                    <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                                    data-id="{{ $question->id }}" data-catid="{{ $question->sub_category->category->id }}" title="bookmark">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                                <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                    <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                                </a>

                                <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" title="like">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <i class="fas fa-heart"></i>
                                <!--end::Svg Icon-->{{$question->vote}}</a>
                        </div>
                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        <div class="m-0">
                           
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center  collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$question->id}}" aria-expanded="false">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
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
    
                                @foreach($question->descriptions as $description)
                                <!--begin::Text-->
                                {{-- <div> <span class="text-gray-500 fw-bolder cursor-pointer mb-0">Added by</span>  <span class="badge badge-light-success fw-bolder">{{ $creator->name }}</span></div> --}}
                                <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10 mt-2">
                                    @if($description->status == 'active')
                                        {{ $description->description  }}
                                    @endif
                                </div>
                                @endforeach
                                <!--end::Text-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Separator-->
                            {{-- <div class="separator separator-dashed"></div> --}}
                            <!--end::Separator-->
                        </div>
                        <!--end::Section-->
                         <!--end::Accordion-->
                            
                    </div>
                </div>
                <!--end::Feeds Widget 2-->

                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_new_question_des" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content rounded">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <!--begin:Form-->
                                <form id="kk_modal_new_question_des_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    {{-- csrf token  --}}
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Add New Question Description</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Question Descrption</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                                        <div class="help-block with-errors description-error"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end:Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Product/Service-->

                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $questions->links() }}
                </div>
            </div>
            <!--end::Col-->
           
        </div>
    </div>
</div>
<!---end::Post -->
@endsection

@push('script')
    <script type="text/javascript">
        
        // add new
        function addNew(){
            $('input[name="question_des_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_question_des_form')[0].reset();
            $('#kk_modal_new_question_des').modal('show')
        }
        
        
        //new category save
        $('#kk_modal_new_question_des_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
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

                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
          });

        })
            
        //vote
        $('.vote').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/vote')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        showConfirmButton: false
                        
                    })
                    setTimeout(function() {
                        location.reload();  //Refresh page
                    }, 1000);
                }
            })
        });

        //view count
        $('.view').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/view-count')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    
                }
            })
        });

        //bookmarks
        $('.bookmark').on('click', function(){
            var id = $(this).data('id')
            var catid = $(this).data('catid')
           
            $(this).children().addClass('svg-icon-primary');
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/bookmark')}}"+'/'+id+'/'+catid,
                dataType: 'json',
                success:function(data){
                    if(data.success){
                        Swal.fire({
                        text: data.message,
                        icon: "success",
                        
                    })
                    }else{
                        Swal.fire({
                        text: data.message,
                        icon: "error",
                        
                        })
                    }
                   
                    
                }
            })
        });

        //reading mode
        $(document).ready(function(){
            $('#readingMode').on('click', function(e){
                e.preventDefault();
                $('.test').addClass('d-none')
                $('.reading').removeClass('d-none')
                $(this).addClass('d-none')
                $('#testMode').removeClass('d-none')
        
            })
            $('#testMode').on('click', function(e){
                e.preventDefault();
                $('.test').removeClass('d-none')
                $('.reading').addClass('d-none')
                $('#readingMode').removeClass('d-none')
                $(this).addClass('d-none')
               
            })
        })

        $(document).ready(function(){
            $('.view-ans').on('click', function(e){
                e.preventDefault()
                var id = $(this).data('id')
                console.log(id)
                $(this).closest('.card-body').find('reading').removeClass('d-none');
            })
        })

    </script>
@endpush
