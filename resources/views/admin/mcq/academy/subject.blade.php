<div class="col-xl-12">
    <!--begin::List Widget 3-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark">Subjects</h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            @if($subjects->count() > 0)
            @foreach($subjects as $subject)
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-8">
                <!--begin::Bullet-->
                <span class="bullet bullet-vertical h-40px bg-success"></span>
                <!--end::Bullet-->
                <!--begin::Checkbox-->
                <div class="form-check form-check-custom form-check-solid mx-5">
                   
                </div>
                <!--end::Checkbox-->
                <!--begin::Description-->
                <div class="flex-grow-1">
                    <a href="{{ route('admin.academy-mcq.subject-all',['subject' => $subject->id, 'sub_category' => $subject->sub_category->id]) }}" target="_blank" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $subject->name }} &nbsp; &nbsp; <span class="text-muted fs-8">{{ $subject->sub_category->name }}</span> <span class="badge badge-light-danger fs-6 ms-5">{{ $subject->question_count }}</span></a>
                    <br>
    
                    @if($subject->children->count() > 0)
                        @foreach($subject->children as $child_subject)
                            <a href="{{ route('admin.academy-mcq.subject-all',['subject' => $child_subject->id, 'sub_category' => $subject->sub_category->id]) }}" target="_blank"><span class="badge badge-light-success fs-8 fw-bolder mb-2 me-2">{{ $child_subject->name }}</span></a>
                        @endforeach   
                    @endif
                </div>
                <!--end::Description-->
                
            </div>
            <!--end:Item-->
            @endforeach
            @else
            <div class="d-flex align-items-center mb-8">
                <h4 class="text-danger">No Subject Found !!!</h4>
            </div>
            @endif
        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->
</div>