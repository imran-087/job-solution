<div class="col-xl-12">
    <!--begin::List Widget 3-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark">Sub Categories</h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            @if($sub_categories->count() > 0)
            @foreach($sub_categories as $key => $sub_category)
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
                    <a href="{{ route('admin.question.all-question',['sub_category' => $sub_category->id]) }}" target="_blank" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $sub_category->name }} <span class="badge badge-light-danger fs-6 ms-5">{{ $sub_category->question_count }}</span></a>
                    <br><br>
                    @isset($subject_analytics)
                    {{-- {{ $subject_analytics[$key] }} --}}
                        @foreach($subject_analytics[$key] as $key => $subject_analytic)
                            {{-- {{ $subject_analytic->subject->name }} --}}
                            <a href="{{ route('admin.question.all-question',['sub_cat' => $sub_category->id, 'subject' => $subject_analytic->subject->id]) }}" target="_blank"><span class="badge badge-success fs-8 fw-bolder mb-2 me-2">{{ $subject_analytic->subject->name }}<span class="badge badge-light-info ms-2">{{ $subject_analytic->total }}</span></span></a>
                        @endforeach
                    @endisset
                </div>
                <!--end::Description-->

            </div>
            <!--end:Item-->
           @endforeach
           @else
           <div class="d-flex align-items-center mb-8">
            <h4 class="text-danger">No sub category found !!!</h4>
           </div>
           @endif
        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->
</div>
