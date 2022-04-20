<!--begin::Heading-->
<div class="mb-13 text-center">
    <!--begin::Title-->
    <h1 class="mb-3">Create Question</h1>
    <!--end::Title-->
    <!--begin::Description-->
    <div class="text-muted fw-bold fs-5">Fill up the form and submit
    </div>
    <!--end::Description-->
</div>
<!--end::Heading-->
<!--begin::Input group-->
<div class="row g-9 mb-8">
    <!--begin::Col-->
    <div class="col-md-3 fv-row">
        <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
        <select class="form-select form-select-solid @error('main_category') is-invalid @enderror" data-control="select2"
            data-hide-search="true" data-placeholder="Select main category" name="main_category"
            id="main_category">
            <option value="">Choose ...</option>
            
            @foreach ($main_categories as $main_category)
            <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
            @endforeach
            <option value="samprotik">Samprotik Question</option>

        </select>
        @error('main_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-3 fv-row">
        <label class="required fs-6 fw-bold mb-2">Select Category</label>
        <select class="form-select form-select-solid " data-control="select2"
            data-hide-search="true" data-placeholder="Select category" name="category"
            id="category">


        </select>
        
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-3 fv-row">
        <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
        <select class="form-select form-select-solid @error('sub_category') is-invalid @enderror" data-control="select2"
            data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
            id="sub_category">


        </select>
        @error('sub_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-3 fv-row">
        <label class="required fs-6 fw-bold mb-2">Select Subject</label>
        <select class="form-select form-select-solid @error('subject') is-invalid @enderror" data-control="select2"
            data-hide-search="true" data-placeholder="Select subject" name="subject"
            id="subject">


        </select>
        @error('subject')
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
    <div class="col-md-2 fv-row">
        <label class="required fs-6 fw-bold mb-2">Select Year</label>
        <select class="form-select form-select-solid @error('year') is-invalid @enderror" data-control="select2"
            data-hide-search="true" data-placeholder="Select year" name="year"
            id="year">
            <option value="">Choose ...</option>
            @foreach ($years as $year)
            <option value="{{ $year->id }}">{{ $year->year }}</option>
            @endforeach

        </select>
        @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-2 fv-row">
        <label class="required fs-6 fw-bold mb-2">Passage (optional)</label>
        <select class="form-select form-select-solid" data-control="select2"
            data-hide-search="true" data-placeholder="Select passage" name="passage"
            id="passage">
            <option value="">Choose ...</option>
            <option value="NULL">No passage</option>
            @foreach ($passages as $passage)
            <option value="{{ $passage->id }}">{{ $passage->title }}</option>
            @endforeach

        </select>
        <div class="help-block with-errors passage-error"></div>
    </div>
    <!--end::Col-->
    
</div>
<!--end::Input group-->