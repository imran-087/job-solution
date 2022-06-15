<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-850px">
    <!--begin::Modal content-->
    <div class="modal-content rounded">
        <!--begin::Modal header-->
        <div class="modal-header pb-0 border-0 justify-content-end">
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                            transform="rotate(-45 6 17.3137)" fill="black" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <!--begin::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <!--begin:Form-->
            <form id="kk_modal_new_add_subject_form" class="form" >
                {{-- csrf token  --}}
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3 mt-3">Add Subject into exam</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Fill up the form and submit
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                
                {{-- hidden field  --}}
                <input type="hidden" name="total_question">
                <input type="hidden" name="total">
                <input type="hidden" name="exam_id" id="exam_id">

                <div class="messages col-md-8 offset-2 mb-13"></div>
                <!--begin::Input group-->
                <div class="row g-9 mb-8">
                    <!--begin::Col-->
                    <div class="col-md-12 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Exam Name</label>
                        <input type="text" class="form-control form-control-solid" name="exam" id="exam_name" disabled>
                        
                    </div>
                    <!--end::Col-->
                </div>
                @foreach ($exam_details as $item)
                <!--begin::Input group-->
                <div class="row g-9 mb-8">
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Select subject</label>
                        <select class="form-select form-select-solid " data-control="select2"
                            data-hide-search="true" data-placeholder="Select subject" name="subject_id[]"
                            id="subject" required>
                            
                        </select>
                        <div class="help-block with-errors subject-error"></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4  fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Number of Ques. in this subject</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid number_of_question"  placeholder="Number of Question" name="number_of_question[]" value="0"/>
                        <div class="help-block with-errors number_of_question-error"></div>
                    </div>
                    <!-- end: col-->
                    <!--begin::Col-->
                    <div class="col-md-1  fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <button class="btn btn-info btn-icon btn-sm addRow" type="button"><i class="fas fa-plus"></i></button> 
                    </div>
                    <!-- end: col-->
                    <!--begin::Col-->
                    <div class="col-md-3  fv-row" id=total_question>
                        
                    </div>
                    <!-- end: col-->
                    
                </div>
                <!--end::Input group-->
                @endforeach
                <!-- append dynamic input field-->
                <div  class="newRow"></div>
                <!-- append dynamic input field -->
                
                <!--begin::Actions-->
                <div class="text-center d-flex justify-content-end py-4 px-4" >
                    <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary" style="padding: 10px 70px">
                        <span class="indicator-label">Submit</span>
                    </button>
                </div>
                <!--end::Actions-->

            </form>
            <!--end:Form-->
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
<!--end::Modal dialog-->