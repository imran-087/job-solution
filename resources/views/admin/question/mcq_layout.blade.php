@if(isset($question))
@for($i = 0; $i < $question; $i++) 
    <div style="border:1px solid green; border-radius:5px; padding: 20px" class="mb-5">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">Question : {{ $i+1 }} </span>
            </label>
            <input type="hidden" name="type" value="{{ $type }}">
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="question[]" />
            <div class="help-block with-errors title-error"></div>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="required fs-6 fw-bold mb-2">Answer</label>
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                    data-placeholder="Select correct answer" name="answer[]">
                    @for($o = 0; $o < $option; $o++) <option value="{{$o+1}}"> Option {{$o+1}}
                        </option>
                        @endfor
                </select>
                @error('answer')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Label-->

            </div>
            <!--end::Col-->
        </div>
         <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            @for($o = 0; $o < $option; $o++) 
            <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Option : {{ $o+1 }} </span>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                    name="option_{{$o+1}}[]" />
                <div class="help-block with-errors title-error"></div>
                @if($type == 'image')
                <input type="file" class="form-control-file" id="exampleInputFile" name="image[]" multiple>
                @endif
            </div>    
            @endfor
        </div>
      
    </div>
@endfor
@endif
