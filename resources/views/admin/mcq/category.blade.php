@if($categories->count() > 0)
@foreach($categories as $category)
<!--begin::Item-->
<div class="timeline-item">
    <!--begin::Label-->
    <div class="timeline-label fw-normal text-muted text-gray-800 fs-6 "></div>
    <!--end::Label-->
    <!--begin::Badge-->
    <div class="timeline-badge">
        <i class="fa fa-genderless text-info fs-1"></i>
    </div>
    <!--end::Badge-->
    
    <!--begin::Text-->
    <div class="fw-bolder timeline-content cursor-pointer ps-3 border p-3 rounded getsubCategory" data-id="{{ $category->id }}" data-main_cat="{{$category->main_category->id}}">
        {{$category->name}}  
    </div>
    <!--end::Text-->
</div>
<!--end::Item-->
@endforeach
@else
<div>
    <h3 class="text-danger">No Category found</h3>
</div>
@endif