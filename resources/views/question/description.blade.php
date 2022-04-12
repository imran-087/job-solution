 <div class="card mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body pb-0">
        <!--begin::Header-->
        <div class="d-flex align-items-center mb-2">
            <!--begin::User-->
            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                <div class="d-flex">
                    <!--begin::Avatar-->
                    @if($description->approval_id == Null)
                    <div class="symbol symbol-45px me-5">
                        <img src="{{ $description->admin->avatar }}" alt="">
                    </div>
                    @else
                    <div class="symbol symbol-45px me-5">
                        <img src="{{ $description->user->avatar }}" alt=""> 
                    </div>
                    @endif
                    <!--end::Avatar-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column">
                        @if($description->approval_id == Null)
                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $description->admin->name }}</a>
                        @else
                        <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $description->user->name }}</a>
                        @endif
                        <span class="text-gray-400 fw-bold">{{$description->created_at->diffForhumans()}}</span>
                    </div>
                    <!--end::Info-->
                </div>
                <div>
                    <span class=" btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2 like me-2"  data-id="{{ $description->id }}" title="like">
                        <i class="fas fa-thumbs-up like"></i>
                        {{$description->vote ?? '0'}}
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
                @if($description->status == 'active')
                    {{ $description->description  }}
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