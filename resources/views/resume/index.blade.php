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

        <div class="card mb-9">
            <div class="card-body">
                 <div class="container my-2 ">
                    <h2 class=" text-primary text-uppercase font-weight-bold">
                      {{$user->detail->first_name ?? '' .' '. $user->detail->last_name ?? ''}}
                    </h2>
                    <p>
                      @isset($user->detail->present_address) address : {{ $user->detail->present_address['address'] ?? '' }} @endisset
                    </p>
                    <div class="row">
                      <div class="col-10 " >
                          <P class="mb-2" ><i class="fas fa-phone-alt"></i> {{ $user->detail->primary_mobile ?? '' }}</P>
                          <p class="mb-2" ><i class="fas fa-envelope"></i> {{ $user->detail->email ?? '' }}</p>
                          
                      </div>
                      <div class="col-sm-2">
                          <img class="img-thumbnail" style= "margin-bottom: .25rem;" src="{{ asset($user->detail->photo_path) }}" height="140" width="140" alt="my photo">
                      </div>
        <div>
            <hr style="width:100%;left;margin-top:15px; opacity: .50;">
        </div>
        
        <div class="mb-8">
            <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Carirrer Obejct:</h5>
                <p>{{ $user->career_info->objective }}</p> 
        </div> 
        <div class="mb-8">
            <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2 ">Career Summary:</h5>
                <p>{{ $user->career_info->career_summary }}</p> 
        </div> 
        <div class="mb-8">
            <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Special Qualification:</h5>
                <p>{{ $user->career_info->special_qualification}}</p> 
        </div> 
        <div>
            <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Employment History:</h5>
                <p><span style="font-weight: bold";>Total Year of Experience :</span> 2.6 yrs</p> 
                <span style="font-weight: bold";>1.	Administrator (2.5 yrs):</span><p>(April, 2018 - October, 2020)</p>
                <span style="font-weight: bold";>SATT IT</span><p>Rajshahi</p>
                <span style="font-weight: bold";>Area of Expertise</span><p>Computer Operator (0.8 yr), Data Entry Operator (Both English & Bengali) (0.8 yr), wordpress customization (0.8 yr)</p>
                <span style="font-weight: bold";>Duties/Responsibilities</span><p style="text-align:justify">I managed the deployment, monitoring, maintenance, development, Upgrade, and supported of all IT systems, including servers, PCs, Operating systems, and software applications. I specially supervised all the academic sections also inputted data in the admission and job assistant system.</p>
                <p style= "margin-bottom: .40rem;"><i class="far fa-hand-point-right"></i> Presales & Post sales support as per project requirements</p>
                <p style= "margin-bottom: .40rem;"><i class="far fa-hand-point-right"></i> Presales & Post sales support as per project requirements</p>
                    <p style= "margin-bottom: .40rem;"><i class="far fa-hand-point-right"></i> Presales & Post sales support as per project requirements</p>
                    <p style= "margin-bottom: .40rem;"><i class="far fa-hand-point-right"></i> Presales & Post sales support as per project requirements</p>
                    <p style= "margin-bottom: .40rem;"><i class="far fa-hand-point-right"></i> Presales & Post sales support as per project requirements</p>
                    <div>
                        <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Academic Qualification:</h5>
                        <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th>Exam Title</th>
                                <th>Concentration/Major</th>
                                <th>Institute</th>
                                <th>Result</th>
                                <th>Pas.Year</th>
                                <th>Duration</th>
                                <th>Achievement</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Master of Science (MSc</th>
                                <td>Geography and Environment</td>
                                <td>Rajshahi College</td>
                                <td>3.50</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"B"</td>

                              </tr>
                              <tr>
                                <td>Bachelor of Science (BSc)</th>
                                <td>Science</td>
                                <td>Rajshahi College</td>
                                <td>3.50</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"B"</td>
                              </tr>
                              <tr>
                                <td>HSC</th>
                                <td>Science</td>
                                <td>Rajshahi Board</td>
                                <td>3.50</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"B"</td>
                              </tr>
                              <tr>
                                <td>SSC</th>
                                <td>Geography and Environment</td>
                                <td>Rajshahi Board</td>
                                <td>3.50</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"B"</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <div>
                        <h5 style="background-color: #E6E6E6;" class="text-black py-1 px-2">Training Summary:</h5>
                        <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th>Training Title</th>
                                <th>Topic</th>
                                <th>Institute</th>
                                <th>Country</th>
                                <th>Location</th>
                                <th>Year</th>
                                <th>Duration</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Database Programming</th>
                                <td>Programming</td>
                                <td>Technical Board</td>
                                <td>5</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"A+"</td>

                              </tr>
                              <tr>
                                <td>Graphic Design</th>
                                <td>Fine Art</td>
                                <td>Rajshahi College</td>
                                <td>3.50</td>
                                <td>2017</td>
                                <td>1</td>
                                <td>"B"</td>
                              </tr>
                              
                            </tbody>
                          </table>
                    </div>
                    <div>
                        <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Professional Qualification:</h5>
                        <table class="table table-bordered text-center">
                            <thead>
                              <tr>
                                <th>Certification</th>
                                <th>Institute</th>
                                <th>Location</th>
                                <th>From</th>
                                <th>To</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Database Programming</th>
                                <td>Programming</td>
                                <td>Technical Board</td>
                                <td>5</td>
                                <td>2017</td>

                              </tr>
                              <tr>
                                <td>Graphic Design</th>
                                <td>Fine Art</td>
                                <td>Rajshahi College</td>
                                <td>3.50</td>
                                <td>2017</td>
                              </tr>
                              
                            </tbody>
                          </table>
                    </div>
                    <div>
                        <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Career and Application Information:</h5>
                        <div class="row">
                            <div class="col-12">
                                
                                <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <td>Looking For</td>
                                        <td>: Mid Level Job</td>
                                      </tr>
                                      <tr>
                                        <td>Available For</td>
                                        <td>: Full Time</td>
                                      </tr>
                                      <tr>
                                        <td>Expected Salary</td>
                                        <td>: 25000b</td>
                                      </tr>
                                      <tr>
                                        <td>Preferred Job Category</td>
                                        <td>: NGO/Development, Data Entry/Operator/BPO, Data Entry/Computer Operator, Graphic Designer</td>
                                      </tr>
                                      <tr>
                                        <td>Preferred District</td>
                                        <td>: Bogura, Dhaka, Natore, Rajshahi</td>
                                      </tr>
                                    </tbody>
                                  </table>

                                  <div>
                                    <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Specialization:</h5>
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th class="text-center">Fields of Specialization</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>1. Digital Marketing (Social Media Marketing)<br>2. Graphics</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <div>
                                    <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Language Proficiency:</h5>
                                    <table class="table table-bordered text-center">
                                        <thead>
                                          <tr>
                                            <th>Language</th>
                                            <th>Reading</th>
                                            <th>Writing</th>
                                            <th>Speaking</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                          <tr>
                                            <td>English </th>
                                            <td>High </td>
                                            <td>High</td>
                                            <td>Medium </td>
                                          </tr>
                                          <tr>
                                            <td>Bengali </th>
                                                <td>High </td>
                                                <td>High</td>
                                                <td>High </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div>

                                        <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2">Personal Details :</h5>
                        <div class="row">
                            <div class="col-12">
                                
                                <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <td>Father's Name</td>
                                        <td>: Md Taz Uddin</td>
                                      </tr>
                                      <tr>
                                        <td>Mother's Name</td>
                                        <td>: Rowshan Ara Begam</td>
                                      </tr>
                                      <tr>
                                        <td>Date of Birth</td>
                                        <td>: 22/11/1992</td>
                                      </tr>
                                      <tr>
                                        <td>Gender</td>
                                        <td>: Maler</td>
                                      </tr>
                                      <tr>
                                        <td>Marital Status</td>
                                        <td>: Married</td>
                                      </tr>
                                      <tr>
                                        <td>Nationality</td>
                                        <td>: Bangladeshi</td>
                                      </tr>
                                      <tr>
                                        <td>National Id No.</td>
                                        <td>: 8423545121</td>
                                      </tr>
                                      <tr>
                                        <td>Religion</td>
                                        <td>: Islam</td>
                                      </tr>
                                      <tr>
                                        <td>Permanent Address</td>
                                        <td>: Vill: Shyampur Molla Para, P.O: Shyampur (6212),P.S: katakhali,Dist: Rajshahi., Paba, Rajshahi</td>
                                      </tr>
                                      <tr>
                                        <td>Current Location</td>
                                        <td>: Rajshahi</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                      </div>
                                </div>   
                            </div>
                            </div>
                        </div> 
                        
                        <h5 style="background-color: #E6E6E6; "class=" text-black py-1 px-2"> Reference (s) :</h5>
                        <div class="row">
                            <div class="6">
                                
                                <table class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th style="text-decoration:underline">Reference: 01</th>
                                      <th style="text-decoration:underline">Reference: 02</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                      <tr>
                                        <td>Name</td>
                                        <td>: 	Md. Johirul Islam </td>
                                        <td>Md. Reyazul Haque</td>
                                      </tr>
                                      <tr>
                                        <td>Organization</td>
                                        <td>: Rajshahi College, Rajshahi</td>
                                        <td> Rajshahi College, Rajshahi</td>
                                      </tr>
                                      <tr>
                                        <td>Designation</td>
                                        <td>: Assistant Professor</td>
                                        <td> Assistant Professor</td>
                                      </tr>
                                      <tr>
                                        <td>Address</td>
                                        <td>: Dhaka</td>
                                        <td> Dhaka</td>
                                      </tr>
                                      <tr>
                                        <td>Phone (Off.)</td>
                                        <td>: +880191XXXXX</td>
                                        <td> +880191XXXXX</td>
                                      </tr>
                                      <tr>
                                        <td>Phone (Res.)</td>
                                        <td>: 880191XXXXX</td>
                                        <td> 880191XXXXX</td>
                                      </tr>
                                      <tr>
                                        <td>Mobile</td>
                                        <td>: +8801558311526  </td>
                                        <td> +8801558311526  </td>
                                      </tr>
                                      <tr>
                                        <td>E-Mail</td>
                                        <td>: Islam@gmail.com</td>
                                        <td> Islam@gmail.com</td>
                                      </tr>
                                      <tr>
                                        <td>Relation</td>
                                        <td>: Academic  </td>
                                        <td> Academic  </td>
                                      </tr>
                                      <tr>
                                        <td>Current Location</td>
                                        <td>: Rajshahi</td>
                                        <td>: Rajshahi</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                      </div>
                                </div>   
                            </div>
                            </div>
                        </div> 
                    <hr style="height:30px; color:rgb(11, 9, 9)">
        </div> 
        </div>
       </div>
    </div>
    
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

