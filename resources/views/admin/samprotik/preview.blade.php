@extends('admin.layout.app')
@section('title', 'Samprotik-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Samprotik Question</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            
            <!--begin::Card-->
            <div class="card" >
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.samprotik.store') }}">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf

                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Preview Samprotik Question Input</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">Recheck the form and submit
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin:menu -->
                        <input type="hidden" name="number" value="{{ $myForm['number'] }}">
                        <!--begin::Input group-->
                        <div class="row g-9 pb-4">
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select category" name="category" id="category">
                                    <option value="bn" 
                                        @if($myForm['category'] == 'bn')  selected @endif
                                        >
                                        Bangladesh</option>
                                    <option value="in"
                                        @if($myForm['category'] == 'in')  selected @endif
                                        >
                                        International</option>
                                    <option value="bn_in"
                                        @if($myForm['category'] == 'bn_in')  selected @endif
                                        >
                                    Bangladesh & International</option>
                                </select>
                                @error('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                               
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select"  disabled>
                                    <option selected>Not Editable</option>
                                    <option>With Option</option>
                                </select>
                                @error('option')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                               
                                <input type="date" class="form-control form-control-solid" placeholder="Pic previous date"
                                    name="date" id="date" value="{{ $myForm['date'] }}" />
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">
                                <input type="text" class="form-control form-control-solid " placeholder="Not work here"
                                    name="number" id="number" disabled/>
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Input group-->
                        <!--end:menu -->
                        
                        @for($i = 0; $i < $myForm['number']; $i++)
                        <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
                            <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                                <!--begin::Input group-->
                                <div class="row g-9 pb-4">                
                                
                                    <div> 
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column  fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Question : {{ $i+1 }} </span>
                                            </label>
                                            <input type="hidden" name="category" value="{{ $myForm['category'] }}">
                                            <input type="hidden" name="option" value="{{ $myForm['option'] }}">
                                            <input type="hidden" name="date" value="{{ $myForm['date'] }}">
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
                                                name="question[]"  value="{{ $myForm['question'][$i] }}" />
                                            <div class="help-block with-errors title-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                        @if($myForm['option'] != '1')
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column  fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required fw-bolder">answer</span>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter answer"
                                                        name="answer[]" value="{{ $myForm['answer'][$i] }}" />
                                            <div class="help-block with-errors answer-error"></div>
                                        </div>
                                        <!--end::Input group-->
                                        
                                        @else
                                        <div class="row g-9">
                                            <!--begin::Col-->
                                            {{-- @for($o = 0; $o < 4; $o++)  --}}
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Option : 1 </span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="1"
                                                    @if($myForm['answer'][$i] == '1') checked @endif
                                                    >
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                    name="option_1[]"  value="{{ $myForm['option_1'][$i] }}" />
                                                </div>
                                                
                                                <div class="help-block with-errors option-error"></div>
                                            </div>    
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Option : 2 </span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="2"
                                                     @if($myForm['answer'][$i] == '2') checked @endif
                                                    >
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                    name="option_2[]"  value="{{ $myForm['option_2'][$i] }}" />
                                                </div>
                                                
                                                <div class="help-block with-errors option-error"></div>
                                            </div>    
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Option : 3 </span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="3"
                                                    @if($myForm['answer'][$i] == '3') checked @endif
                                                    >
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                    name="option_3[]"  value="{{ $myForm['option_3'][$i] }}" />
                                                </div>
                                                
                                                <div class="help-block with-errors option-error"></div>
                                            </div>    
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Option : 4 </span>
                                                </label>
                                                <!--end::Label-->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="4"
                                                    @if($myForm['answer'][$i] == '4') checked @endif
                                                    >
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                    name="option_4[]"  value="{{ $myForm['option_4'][$i] }}" />
                                                </div>
                                                
                                                <div class="help-block with-errors option-error"></div>
                                            </div>    
                                            {{-- @endfor --}}
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
                                <span class="indicator-label">Confirm</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card--> 

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection



