@if($questions->count() > 0)
<!--begin::Body-->
<div class="card-body py-3">
    <!--begin::Tables Widget 9-->
    <div class="card card-xl-stretch ">
        <!--begin::Header-->
        <div class="card-header border-0 ">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Select Questions</span>
                <span class="text-muted mt-1 fw-bold fs-7">Over {{$questions->count()}} Question</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="Click to add Question">
            <div class="card card-flush bg-light mb-0"
                    data-kt-sticky="true"
                    data-kt-sticky-name="docs-sticky-summary"
                    data-kt-sticky-offset="{default: false, xl: '100px'}"
                    data-kt-sticky-width="{lg: '100px', xl: '150px'}"
                    data-kt-sticky-left="auto"
                    data-kt-sticky-top="100px"
                    data-kt-sticky-animation="false"
                    data-kt-sticky-zindex="95"
                >
                <div id="checbox-calucator">
                    <p>Total = {{ $exam_detail->number_of_question }}  </p>
                        <p>Selectd =  {{ collect($exam_detail->question_ids)->count() }}  </p>
                        <p>Remaining = {{$exam_detail->number_of_question - collect($exam_detail->question_ids)->count() }} </p>
                        
                </div>
               
            </div>
         
            <button type="submit" id="kk_add_question" class="btn btn-primary add_question" style="padding: 7px 30px" disabled="disabled">
                                <span class="indicator-label" >Add Question</span>
            </button>
            {{-- <a href="javascript:;" class="btn btn-sm btn-primary add_question" id="kk_add_question">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->Add</a> --}}
        </div>
        
        </div>
        
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
             <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="required fs-6 fw-bold mb-2">Select passage</label>
                <select class="form-select form-select-solid " data-control="select2"
                    data-hide-search="true" id="passage_id"  required>
                    <option value="0">No Passage</option>
                    
                    @foreach($passages as $passage)
                    <option value="{{ $passage->id }}">{{ $passage->title }}</option>
                    @endforeach
                </select>
                <div class="help-block with-errors subject-error"></div>
            </div>
            <!--end::Col-->
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <input type="hidden" name="number_of_question" id="number_of_question" value="{{ $exam_detail->number_of_question }}">
                <input type="hidden" name="numb_of_question_in_question_ids" id="numb_of_question_in_question_ids" value="{{ collect($exam_detail->question_ids)->count() }}">

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
                                    <input class="form-check-input widget-9-check sub_chk" type="checkbox" data-id="{{ $question->id }}" 
                                    @isset($exam_detail->question_ids)
                                    @foreach ($exam_detail->question_ids as $item)
                                        {{ $item['question_id'] == $question->id ? 'checked' : '' }}
                                    @endforeach
                                    @endisset
                                    >
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

            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
</div>

@else
<div class="d-flex align-items-center">
                    
    <div class="d-flex justify-content-start flex-column">
        <span class="text-dark fw-bolder text-hover-primary fs-6">No Question found for this subject</span>
    </div>
</div>
@endif
