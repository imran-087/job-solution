@if($questions->count() > 0)

<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="w-100px">
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" id="master" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check">
                </div>
            </th>
            <th class="min-w-700px">Question</th>
        </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
        @foreach($questions as $question)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input widget-9-check sub_chk" type="checkbox" data-id="{{ $question->id }}">
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    
                    <div class="d-flex justify-content-start flex-column">
                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $question->question }}</span>
                    </div>
                </div>
            </td>
            
        </tr>
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->
{{-- {{ $questions->links() }} --}}

@else
<div class="d-flex align-items-center">
                    
    <div class="d-flex justify-content-start flex-column">
        <span class="text-dark fw-bolder text-hover-primary fs-6">No Question found for this subject</span>
    </div>
</div>
@endif
