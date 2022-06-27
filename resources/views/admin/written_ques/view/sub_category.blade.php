<div class="col-xl-12">
    <!--begin::List Widget 3-->
    <div class="card card-xl-stretch mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark">সাব-ক্যাটেগরির তালিকা</h3>
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
               
                {{-- <a class="menu-link py-3 active" target="_blank" href="{{ route('admin.written.view.question', ['sub_category' => $written_subcat->sub_category_id ]) }}">{{$written_subcat->sub_category->name}}</a> --}}
                   
                <!--begin::Description-->
                <div class="flex-grow-1">
                    <span class="text-gray-800 text-hover-primary fw-bolder fs-5">{{ $sub_category->name }}</span>
                    <br>
                    @isset($subject_analytics)
                        @foreach($subject_analytics[$key] as $key => $subject_analytic)
                            {{-- {{ $subject_analytic->subject->name }} --}}
                            <a href="{{ route('admin.written.view.question',['sub_category' => $sub_category->id, 'subject' => $subject_analytic->subject->id ]) }}" target="_blank"><span class="badge badge-success fs-8 fw-bolder mb-2 me-2">{{ $subject_analytic->subject->name }}</span></a>
                        @endforeach
                    @endisset
                </div>
                <!--end::Description-->
                
            </div>
            <!--end:Item-->
           @endforeach
           @else
           <div class="d-flex align-items-center mb-8">
                <h4 class="text-danger"> কোন তথ্য খুজে পাওয়া যায় নাই !!!</h4>
           </div>
           @endif
        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->
</div>
