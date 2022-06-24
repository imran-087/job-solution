<div class="modal-dialog modal-dialog-centered mw-900px">
    <!--begin::Modal content-->
    <div class="modal-content">
        <!--begin::Modal header-->
        <div class="modal-header">
            <!--begin::Modal title-->
            <h2>Exam Details</h2>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <!--end::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body py-lg-10 px-lg-10">
           <div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Options-->
                    <div id="kt_create_new_payment_method">
                        <!--begin::Option-->
                        <div class="py-1">
                            <!--begin::Body-->
                            <div id="kt_create_new_payment_method_1" class="fs-6 ps-10 collapse show" style="">
                                <!--begin::Details-->
                                <div class="d-flex flex-wrap py-5">
                                    <!--begin::Col-->
                                    <div class="flex-equal me-5">
                                        <table class="table table-flush fw-bold gy-1">
                                            <tbody><tr>
                                                <td class="text-muted min-w-125px w-125px">Exam Name</td>
                                                <td class="text-gray-800">{{ $exam->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Category</td>
                                                <td class="text-gray-800">{{ $exam->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Sub Category</td>
                                                <td class="text-gray-800">{{ $exam->sub_category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Examineer</td>
                                                <td class="text-gray-800">{{ $exam->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Exam Type</td>
                                                <td class="text-gray-800">{{ $exam->exam_type == 'user' ? 'Free' : 'Paid' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Exam Mode</td>
                                                <td class="text-gray-800">{{ $exam->exam_mode }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Exam Status</td>
                                                <td class="text-gray-800">{{ $exam->exam_status }}</td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="flex-equal">
                                        <table class="table table-flush fw-bold gy-1">
                                            <tbody><tr>
                                                <td class="text-muted min-w-125px w-125px">Total Question</td>
                                                <td class="text-gray-800">{{ $exam->number_of_question }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Total Mark</td>
                                                <td class="text-gray-800">{{ $exam->total_mark }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Cut Mark</td>
                                                <td class="text-gray-800">{{ $exam->cut_mark }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Negative Mark</td>
                                                <td class="text-gray-800">{{ $exam->negative_mark }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Exam Price</td>
                                                <td class="text-gray-800">{{ $exam->exam_price ?? '0' }} &nbsp;Tk. </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Discount</td>
                                                <td class="text-gray-800">{{ $exam->discount_price ?? '0' }} (%)</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Required Point</td>
                                                <td class="text-gray-800">{{ $exam->required_point }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Duration</td>
                                                <td class="text-gray-800">{{ $exam->duration }} Min.</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Starting Time</td>
                                                <td class="text-gray-800">{{ Carbon\Carbon::parse($exam->exam_starting_time)->format('g:i:s A') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted min-w-125px w-125px">Sarting Date</td>
                                                <td class="text-gray-800">{{ Carbon\Carbon::parse($exam->exam_starting_time)->format('d-m-Y ') }}</td>
                                            </tr>
                                            
                                            
                                        </tbody></table>
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-12">
                                        <p class="text-muted ">Exam Subject & Question No.</p>
                                        @php  $examDetails = App\Models\ExamDetail::where('exam_id', $exam->id)->get(); @endphp
                                        @foreach ($examDetails as $examsubject) 
                                        <div class="badge badge-success me-2 mb-2"> {{ $examsubject->subject->name  }} &nbsp; &nbsp; <span class="badge badge-circle badge-danger"> {{ $examsubject->question_ids ? collect($examsubject->question_ids)->count() : '0' }}    </span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Details-->
                                
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Option-->
                        <div class="separator separator-dashed"></div>
                        
                    </div>
                    <!--end::Options-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>