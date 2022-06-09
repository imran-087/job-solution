@if($sub_categories->count() > 0)
@foreach($sub_categories as $category)
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
    <div class="fw-bolder timeline-content cursor-pointer ps-3 border p-3 rounded getsubject" data-id="{{ $category->id }}" >
        {{$category->name}}  
    </div>
    <!--end::Text-->
</div>
<!--end::Item-->
@endforeach
@else
<div>
    <h4 class="text-danger">Not found</h4>
</div>
@endif