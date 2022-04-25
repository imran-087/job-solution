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
            <form id="kk_modal_new_question_form" class="form" enctype="multipart/form-data">
                <div class="messages"></div>
                {{-- csrf token  --}}
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Question Description</h1>
                    <!--end::Title-->
                   
                </div>
                <!--end::Heading-->
                <input type="hidden" name="description_id" value="{{ $description->id }}">
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Question</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" 
                        name="question" value="{{ $description->question->question }}" disabled/>
                </div>
                <!--end::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Description</span>
                    </label>
                    <div class="col-md-12 mb-5">
                        <textarea name="description" id="kt_docs_ckeditor_classic" class="form-control form-control-solid h-100px">{!! $description->description !!}</textarea>
                    </div>
                   
                </div>
                <!--begin::Actions-->
                <div class="text-center">
                    <a href="javascript:;" onclick="reject({{ $description->id }})" class="btn btn-danger">
                        <span class="indicator-label">Reject</span>
                    </a>
                    <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                        <span class="indicator-label">Accept</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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

<script type="text/javascript">
    var myEditor;
    ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic'))
    .then(editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
</script>