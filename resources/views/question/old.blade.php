<div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pb-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center ">
                                <!--begin::User-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    
                                </div>
                                <!--end::User-->
                                <!--begin::Menu-->
                                <div class="my-0 d-flex">
                                    <a href="javascript:;" class="bookmark" data-id="{{ $question->id }}">
                                        <span class="svg-icon  svg-icon-2x" >
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <div class="channel-badge ml-2">
                                        <a href="">{{$question->subject->name}}</a>
                                    </div>
                                    
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->

                        
                            <!--begin::Post-->
                            <div class="mb-5">
                                <!--begin::Text-->
                                <a href="">
                                    <p class="text-800  fw-bold mb-5"><strong>Question: </strong>{{$question->question}}</p>
                                </a>
                                <!--end::Text-->
                                <div class="row">
                                    @if(isset($question->question_option->option_1 ))
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5"> &#9398 {{$question->question_option->option_1 }}</p>
                                    </div>
                                    @endif
                                    @if(isset($question->question_option->option_2))
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5"> &#9399 {{$question->question_option->option_2 }}</p>
                                    </div>
                                    @endif
                                    @if(isset($question->question_option->option_3))
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5"> &#9400 {{$question->question_option->option_3}}</p>
                                    </div>
                                    @endif
                                    @if(isset($question->question_option->option_4 ))
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-normal mb-5"> &#9401 {{$question->question_option->option_4}}</p>
                                    </div>
                                    @endif
                                </div>
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">
                                    <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote"  data-id="{{ $question->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$question->vote}}</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Post-->
                        
                            
                        </div>
                        <!--end::Body-->
                    </div>



 // card toolbar
 <a href="javascript:;" class="bookmark me-2"  data-id="{{ $question->id }}" title="Bookmark">
                                <span class="svg-icon  svg-icon-2x" >
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                                </span>
                            </a>
                            <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                            </a>

                            <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{$question->vote}}</a>
                            <button type="button" class="btn btn-sm  channel-badge">
                                <a href="">{{$question->subject->name}}</a>
                            </button>                   




                            ///


                            <a href="javascript:;" class="bookmark me-2"  data-id="{{ $question->id }}" title="Bookmark">
                                <span class="svg-icon  svg-icon-2x ">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                                </span>
                            </a>
                            <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                            </a>

                            <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{$question->vote}}</a>


 {{-- subject                             --}}
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


 //comments body   
 
 <!--begin::Body-->
                    <div class="card-body pb-0">
                        <div class="mb-7 d-flex justify-content-between">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5" style="font-size: 20px"><b>Comments</b></div>
                            <!--end::Text-->
                            <div class="my-0">
                                <a type="button" class=" comment btn btn-sm btn-primary " >
                                   Add Comment
                                </a>
                                
                            </div>
                            
                        </div>
                        
                        <div class="mb-7 ps-10">
                            @foreach($question->comments as $comment)
                            <!--begin::Reply-->
                            <div class="d-flex mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="/metronic8/demo1/assets/media/avatars/300-14.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-row-fluid">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center flex-wrap mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{$comment->user->name}}</a>
                                        <span class="text-gray-400 fw-bold fs-7">{{$comment->created_at->diffForHumans()}}</span>
                                        
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Post-->
                                    <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->comment }}</span>
                                    <!--end::Post-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Reply-->
                            @endforeach
                        </div>
                      
                        <!--begin::Separator-->
                        {{-- <div class="separator mb-4"></div> --}}
                        <!--end::Separator-->
                        
                    </div>
                    <!--end::Body-->





                    {{-- ///////////bookmarked modal  --}}
                    <!--begin::Modal - Bookmark modal-->
<div class="modal fade" id="kk_modal_new_bookmark" tabindex="-1" aria-hidden="true">
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
                <form id="kk_modal_new_bookmark_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                    <input type="hidden" name="question_id">
                    <input type="hidden" name="catid">
                    
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add New Bookmark</h1>
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
                            <span class="required">Create your own bookmark type or select one</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" name="bookmark_type" list="cityname">
                            <datalist id="cityname">
                                <option value="Boston">
                                <option value="Cambridge">
                            </datalist>
                        {{-- <textarea name="description" class="form-control form-control-solid h-100px"></textarea> --}}
                        <div class="help-block with-errors bookmark_type-error"></div>
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
<!--end::Modal - Bookmark modal-->


{{-- //discussion index --}}
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-2">
                <!--begin::Add Discussion-->
                <div class="new-discussion mb-5">
                <a href="javascript:;" class="btn btn-primary text-uppercase" onclick="addNew()">New Discussion</a>
                </div>
                <!--end::Add Discussion-->
                <div class="nav">
                    <ul class="nav-item">
                        @foreach($channels as $channel)
                        <a class="nav-link" href="{{ route('discussion.channel', $channel->id) }}"><li class="mb-3">{{$channel->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Card-->
                <div class="card mb-5">
                    <!--begin::Card header-->
                    <div class="card-header border-0 ">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kk-product-table-filter="search"
                                    class="form-control form-control-solid w-350px ps-14" id="search" placeholder="Search discussion">
                                {{-- <div id="display"></div> --}}

                            </div>
                            <!--end::Search-->


                        </div>
                        <!--begin::Card title-->

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                            data-select2-id="select2-data-123-0tixx">

                            <div class="m-0">
                                <!--begin::Menu toggle-->
                                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Filter</a>
                                <!--end::Menu toggle-->
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_623176a83b3cd">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Menu separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 pt-1">
                                        <a href="{{ url('discussion', 'latest')}}" class="menu-link px-3">Latest</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ url('discussion', 'popular')}}" class="menu-link px-3" >Most Popular</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 pb-2">
                                        <a href="{{ url('discussion', 'weekago')}}" class="menu-link px-3" >Last Week</a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu 1-->
                            </div>


                        </div>

                    </div>
                    <!--end::Card header-->
                    <div id="result"></div>
                </div>
                <!--end::Card-->




                <div id="main">
                    @foreach($discussions as $discussion)
                    <!--begin::Feeds Widget 2-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pb-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::User-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        <img src="{{ asset('assets') }}/media/avatars/300-23.jpg" alt="" />

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('discussion.show', $discussion->id) }}" class="text-gray-900 text-hover-primary fs-6 fw-bolder view" data-id="{{ $discussion->id }}" style="font-size: 20px !important;">{{ Str::limit($discussion->title, 50, $end='...') }}</a>
                                        <span class="text-gray-400 fw-bold">{{$discussion->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Menu-->
                                <div class="my-0">
                                    <div class="channel-badge">
                                    <a href="{{ route('discussion.channel', $channel->id) }}">{{$discussion->channel->name}}</a>
                                    </div>

                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->


                            <!--begin::Post-->
                            <div class="mb-5">
                                <!--begin::Text-->
                                <a href="{{ route('discussion.show', $discussion->id) }}" class="view" data-id="{{ $discussion->id }}">

                                    <p class="text-gray-800 fw-normal mb-5">{!! $discussion->content !!}</p>
                                </a>
                                <!--end::Text-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">

                                    <a href="{{ route('discussion.show', $discussion->id) }}" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4 view" data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->replies->count()}}</a>
                                    <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-4"  data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->vote}}</a>

                                    <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                      <i class="fas fa-eye fa-xl"></i> {{$discussion->view}} </span>

                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Post-->


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feeds Widget 2-->
                    @endforeach
                    <div class="d-flex justify-content-end">
                        {{ $discussions->links() }}
                    </div>
                </div>
                <div id="render"></div>

            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-1">

            </div>
        </div>
    </div>
</div>
