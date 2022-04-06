 @php
     $best_description = App\Models\QuestionDescription::where('question_id', $question->id)->orderBy('vote', 'desc')->first();
     //var_dump($best_description);
 @endphp
 @if($best_description)
    <div class="card mb-5 mb-xl-8">
        <!--begin::Body-->
        <div class="card-body pb-0">
            <!--begin::Header-->
            <div class="d-flex align-items-center mb-2">
                <!--begin::User-->
                <div class="d-flex align-items-center justify-content-between flex-grow-1">
                    <div class="d-flex">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5">
                            <img src="/metronic8/demo1/assets/media/avatars/300-7.jpg" alt="">
                        </div>
                        <!--end::Avatar-->
                        
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            @if($best_description->approval_id == Null)
                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $best_description->admin->name }}</a>
                            @else
                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $best_description->user->name }}</a>
                            @endif
                            <span class="text-gray-400 fw-bold">{{$best_description->created_at->diffForhumans()}}</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <div>
                        <span class="btn btn-sm btn-success">Best Description</span>
                        <span class=" btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2 like me-2"  data-id="{{ $best_description->id }}" title="like">
                            <i class="fas fa-thumbs-up like"></i>
                            {{$best_description->vote?? '0'}}
                        </span>
                    
                    </div>
                </div>
                <!--end::User-->
                
            </div>
            <!--end::Header-->
            <!--begin::Post-->
            <div class="mb-3">
                <!--begin::Text-->
                <div class="text-gray-800 mb-5">
                    @if($best_description->status == 'active')
                        {{ $best_description->description  }}
                    @endif
                </div>
                <!--end::Text-->
            
                
            </div>
            <!--end::Post-->
            <!--begin::Separator-->
            <div class="separator "></div>
            <!--end::Separator-->
            
        </div>
        <!--end::Body-->
    </div>
@endif