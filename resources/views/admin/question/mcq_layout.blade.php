@if(isset($question))
@for($i = 0; $i < $question; $i++) 
    <div style="border:1px solid green; border-radius:5px; padding: 20px" class="mb-5">
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-10 fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Question : {{ $i+1 }} </span>
                </label>
                <input type="hidden" name="type" value="{{ $type }}">
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid @error('question.*') is-invalid @enderror" placeholder="Enter Question" name="question[]" value="{{ old('question.*') }}"/>
                @error('question.*')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--begin::Col-->
            <div class="col-md-2 fv-row" >
                <!--begin::Label-->
                <label class="required fs-6 fw-bold mb-2">Answer</label>
                <select class="form-select form-select-solid  @error('answer.*') is-invalid @enderror" data-control="select2" 
                    data-placeholder="select answer " name="answer[]" >
                    <option value=""></option>
                    @for($o = 0; $o < $option; $o++)
                    <option value="{{$o+1}}"> Option {{$o+1}}</option>
                    @endfor
                </select>
                @error('answer.*')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--end::Col-->
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
                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                    name="option_{{$o+1}}[]"  value="{{ old('option_.*') }}"/>
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
