<!--start:Form-->
{{-- <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.question.preview-store') }}">
    <div class="messages"></div>
    {{-- csrf token  --}}
   
   @if($type == 'passage')
    <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:5px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4"> 
                <div style="" class="mb-5"> 
                     <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                         <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required text-uppercase fw-bolder" style="font-size: 16px">Passage </span>
                            </label>
                            <input type="hidden" name="type" value="{{ $type }}">
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-2 @error('title') is-invalid @enderror" placeholder="Enter passage title" name="title" value="{{ old('title') }}"/>

                            <textarea type="text" id="kt_docs_ckeditor_classic" class="form-control form-control-solid h-100px @error('passage') is-invalid @enderror" placeholder="Enter passage" name="passage" ></textarea>
                           
                            @error('passage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- end: col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif
    
    @for($i = 0; $i < $number; $i++)
    <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:5px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4"> 
                <div style="" class="mb-5"> 
                     <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required text-uppercase fw-bolder" style="font-size: 16px">Question : {{ $i+1 }} </span>
                            </label>
                            <input type="hidden" name="type" value="{{ $type }}">
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid @error('question.*') is-invalid @enderror" placeholder="Enter Question" name="question[]" value="{{ old('question.*') }}"/>
                            @if($type == 'image')
                            <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="question_image[]" multiple>
                            @endif
                            @error('question.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- end: col-->
                        
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        @for($o = 0; $o < $option; $o++) 
                        <div class="col-md-3 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Option : {{ $o+1 }} </span>
                            </label>
                            <!--end::Label-->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="{{ $o+1 }}">
                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                name="option_{{$o+1}}[]"  value="{{ old('option_.*') }}"/>
                            </div>
                        
                            @if($type == 'image')
                            <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                            @endif
                        </div>    
                        @endfor
                    </div>
                </div> 
            </div>
            <!--end::Input group-->
        </div>
    </div>
    @endfor
    <!--begin::Actions-->
    <div class="text-center d-flex justify-content-end py-4 px-4" >
        <button type="submit" class="btn btn-primary" style="padding: 10px 70px">
            <span class="indicator-label">Submit</span>
        </button>
    </div>
    <!--end::Actions-->
{{-- </form>
<!--end:Form--> --}}

<script type="text/javascript">
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


      

                       



