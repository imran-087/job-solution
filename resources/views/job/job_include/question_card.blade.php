<div class="card card-bordered mb-5">
    <div class="card-header">
        
        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
            <a href="{{ route('job.single-question',['ques_id' => $question->id]) }}"><span > {{ $serial_number }}. {{$question->question}} </span> </a>
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
                <div class="menu-item px-3 my-1">
                    <a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}" class="menu-link px-3">View Comment</a>
                </div>
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
                <p class="{{ $question->question_option->answer == 3 ? 'text-success' : 'text-gray-800'}} fw-bold">
                    <span >
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
                    <span >
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
                <p class="{{ $question->question_option->answer == 5 ? 'text-success' : 'text-gray-800'}} fw-bold ">
                    <span >
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
    <div class="card-footer py-2 my-0">
        <div class="d-flex justify-content-between align-items-center">
            <div class="description">
                <a href="{{ route('job.single-question',['ques_id' => $question->id]) }}" class="fs-5 fw-bold text-dark text-hover-primary">
                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/metronic/releases/2022-07-14-092914/core/html/src/media/icons/duotune/arrows/arr028.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M12.9 10.7L3 5V19L12.9 13.3C13.9 12.7 13.9 11.3 12.9 10.7Z" fill="currentColor"/>
                    <path d="M21 10.7L11.1 5V19L21 13.3C22 12.7 22 11.3 21 10.7Z" fill="currentColor"/>
                    </svg>
                    </span>
                    <!--end::Svg Icon-->Description
                </a>
            </div>
            <div class="activity">
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                    data-id="{{ $question->id }}" data-catid="{{ $sub_category->category->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Bookmark">
                        <i class="fas fa-bookmark"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Like">
                        <i class="fas fa-heart"></i>{{ $question->vote }}
                    </a>
                    <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Total view">
                        <i class="fas fa-eye fa-xl"></i> {{ $question->view_count }} 
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>