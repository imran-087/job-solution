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
            @foreach($sub_categories as $sub_category)
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
                    <a href="{{ route('admin.written.test.question') }}" target="_blank" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $sub_category->name }}</a>
                </div>
                <!--end::Description-->
                
            </div>
            <!--end:Item-->
           @endforeach
        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->
</div>