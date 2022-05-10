<!--begin::Card-->
<div class="card" style="margin-top:20px">
    <!--begin::Card body-->
    <div class="card-body pt-4 " style="padding-bottom: 0px !important">
         <!--begin:Form-->
        <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.samprotik.store') }}">
            <div class="messages"></div>
            {{-- csrf token  --}}
            @csrf
            @for($i = 0; $i < $number; $i++)
            <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin::Input group-->
                    <div class="row g-9 pb-4">                
                    
                        <div style="" class="mb-5"> 
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Question : {{ $i+1 }} </span>
                                </label>
                                <input type="hidden" name="category" value="{{ $category }}">
                                <input type="hidden" name="option" value="{{ $option }}">
                                <input type="hidden" name="date" value="{{ $date }}">
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                    name="question[]" required />
                                <div class="help-block with-errors title-error"></div>
                            </div>
                            <!--end::Input group-->
                            @if($option != '1')
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required fw-bolder">answer</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter answer"
                                            name="answer[]"  required/>
                                <div class="help-block with-errors answer-error"></div>
                            </div>
                            <!--end::Input group-->
                            
                            @else
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                @for($o = 0; $o < 4; $o++) 
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Option : {{ $o+1 }} </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="{{ $o+1 }}">
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                        name="option_{{$o+1}}[]"  value="{{ old('option_.*') }}" required/>
                                    </div>
                                    
                                    <div class="help-block with-errors option-error"></div>
                                </div>    
                                @endfor
                            </div>
                            @endif
                            
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
        </form>
        <!--end:Form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card--> 

      

                       