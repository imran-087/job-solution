@extends('landing_layout.l_app')

@section('main-content')

    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2 pt-10 pb-20">
        <!--begin::Container-->
        <div class="container p-5 rounded" style="box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx mb-5 mt-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}" style="color: #47BE7D">{{ Str::ucfirst($page->page_name) }}</h3>
                <!--end::Title-->
                <span><hr></span>
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-10 " >
                <div class="px-13 page">
                    <!--begin::content-->
                    {!! $page->content !!}
                    <!--end::content-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    
@endsection

@push('styles')
<style type="text/stylesheet">
    
</style>
@endpush