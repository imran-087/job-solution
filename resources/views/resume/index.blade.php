@extends('layouts.app')

@section('title', 'Resume')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Resume</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Resume Management</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
         <div class="d-flex align-items-center gap-2 gap-lg-3">
            @guest
            <!--begin::Primary button-->
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary" id="readingMode" >Login</a>
            <!--end::Primary button-->
            @endguest
        </div>
    
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
         
        @include('resume.menubar')

        @if($user->detail || $user->academic_infos || $user->training_infos || $user->career_info)
        <div class="card card-flush mb-9" id="html-content-holder">
            <div class="card-body">
                @if($user->detail->count() > 0)
                <div class="row mb-9">
                    <div class="col-md-6">
                        <div class="name mb-9">
                            <h2>{{ Str::ucfirst($user->detail->first_name) }} {{ Str::ucfirst($user->detail->last_name) }}</h2>
                        </div>
                        <div class="address">
                            <p>Address : {{ $user->detail->present_address['address'] ?? 'not found' }}</p>
                        </div>
                        <div class="mobile-email">
                            <p>Mobile : {{ $user->detail->primary_mobile }}</p>
                            <p>Email : {{ $user->detail->email ?? Auth::user()->email }} </p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed ">
                                <img src="{{ asset($user->detail->photo_path) }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($user->academic_infos->count() > 0)
                <div class="row mb-9">
                    <div class="p-3 fw-bolder fs-5 mb-4" style="background: #E6E6E6;">
                        <span class="" >Academic Qualification</span>
                    </div>
                    <div class="academic-qualification">
                        <div class="table-responsive">
                            <table class="table table-rounded table-striped border gy-7 gs-7">
                            <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>Exam Title</th>
                                <th>Group/Major</th>
                                <th>Institute</th>
                                <th>Result</th>
                                <th>Passing Year</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->academic_infos as $academy)
                            <tr>
                                <td>{{ $academy->degree_name }}</td>
                                <td>{{ $academy->major }}</td>
                                <td>{{ $academy->institute_name }}</td>
                                <td>
                                    @if($academy->result == 'grade')
                                    {{ $academy->cgpa }} ( out of {{ $academy->scale }} )
                                    @else 
                                    {{ $academy->marks }}
                                    @endif
                                </td>
                                <td>{{ $academy->passing_year }}</td>
                               
                            </tr>
                           @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if($user->training_infos->count() > 0)
                <div class="row mb-9">
                    <div class="p-3 fw-bolder fs-5 mb-4" style="background: #E6E6E6;">
                        <span class="" >Training Summary</span>
                    </div>
                    <div class="training-summary">
                        <div class="table-responsive">
                            <table class="table table-rounded table-striped border gy-7 gs-7">
                            <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>Training Title</th>
                                <th>Topic</th>
                                <th>Institute</th>
                                <th>Duration</th>
                                <th>Year</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->training_infos as $training)
                            <tr>
                                <td>{{ $training->training_title }}</td>
                                <td>{{ $training->topic_covered }}</td>
                                <td>{{ $training->institute }}</td>
                                <td>{{ $training->duration }}</td>
                                <td>{{ $training->year }}</td>
                                <td>{{ $training->address }} </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if($user->career_info)
                <div class="row mb-9">
                    <div class="p-3 fw-bolder fs-5 mb-4" style="background: #E6E6E6;">
                        <span class="" >Career and Application Information</span>
                    </div>
                    <div class="job-caegory">
                        <table class="table table-flush fw-bold gy-1">
                           
                            <tbody>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Preffered job Category </td>
                                    <td class="text-gray-800 fw-bolder">
                                        @foreach($user->career_info->job_categories as $category)
                                            : &nbsp;&nbsp;{{  $category  }} &nbsp;&nbsp;
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Preffered city</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;{{  $user->career_info->preffered_city ?? 'no preffed city'  }} &nbsp;&nbsp;</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @if($user->skills->count() > 0)
                <div class="row mb-9">
                    <div class="p-3 fw-bolder fs-5 mb-4" style="background: #E6E6E6;">
                        <span class="" >Specialization:</span>
                    </div>
                    <div class="special-skill">
                        <ul>
                            @foreach($user->skills as $skill)
                            <li>{{ $skill->skill }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($user->detail->count() > 0)
                <div class="row mb-9">
                    <div class="p-3 fw-bolder fs-5 mb-4" style="background: #E6E6E6;">
                        <span class="" >Personal Details</span>
                    </div>
                    <div class="job-caegory">
                        <table class="table table-flush fw-bold gy-1">
                           
                            <tbody>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Date of Birth</td>
                                    <td class="text-gray-800 fw-bolder">
                                        : &nbsp;&nbsp;{{ $user->detail->date_of_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Gender</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;{{  $user->detail->gender  }} &nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Marital Status</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;{{  $user->detail->marital_status  }} &nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Nationality</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;{{  $user->detail->nationality  }} &nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Religion</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;{{  $user->detail->gender  }} &nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-105px w-120px">Permanent Address</td>
                                    <td class="text-gray-800 fw-bolder">: &nbsp;&nbsp;
                                        @isset($user->detail->present_address)
                                            @if($user->detail->permanent_address == 'sameaspresent')
                                            {{  $user->detail->present_address['address']  }} 
                                            @else
                                            {{  $user->detail->permanent_address['address']  }} 
                                            @endif
                                        @endisset
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
           
        </div>
        <div class="text-center m-3">
            <button class="btn btn-sm btn-info text-center" id="btnConvert1">Download</button>
            {{-- <a class="btn btn-primary btn-sm" href="{{ route('resume.pdf') }}">Export to PDF</a> --}}
        </div>
        
        @else
        <div class="card card-flush" >
            <div class="card-body d-flex justify-content-center">
                <span class="text-center border rounded py-2 px-8 fw-bolder fs-4 text-capitalize">No data found</span>
            </div>
        </div>
        @endif
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>   
<script src="{{ asset('/js/html2canvas.js') }}"></script>

<script>
        $("#btnConvert1").on('click', function () {
            html2canvas(document.getElementById("html-content-holder")).then(function (canvas) {                   
                var anchorTag = document.createElement("a");
                document.body.appendChild(anchorTag);
                // document.getElementById("previewImg").appendChild(canvas);
                anchorTag.download = "Resume";
                anchorTag.href = canvas.toDataURL(); 
                anchorTag.target = '_blank';
                anchorTag.click();
            });
});

</script>
@endpush
