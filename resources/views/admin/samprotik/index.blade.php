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
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5">
                <!--begin::Card body-->
                <div class="card-body pt-10 pb-10 ">
                    <div class="card text-center">
                        <div class="card-body ">
                            <h3 class="card-title">স্যাট একাডেমি - সাম্প্রতিক প্রশ্নোত্তর </h3>
                            <h5 class="card-title">বাংলাদেশ ও আন্তর্জাতিক বিষয়াবলি</h5>
                        </div>
                        <span class="mb-5">
                            <!--begin::Input group-->
                            <div class="row g-9 pb-4">
                                <!--begin::Col-->
                                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-6 col-xs-6 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select option" name="option" id="option">
                                        <option></option>
                                        <option value="1">With Option</option>
                                        <option value="0">Without Option</option>
                                    </select>
                                    
                                </div>
                                <!--end:Col-->

                                <!--begin::Col-->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                        data-placeholder="Filter by date" name="date" id="date-filter">
                                        <option></option>
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="last_30_days">Last 30 Days</option>
                                        <option value="lastmonth">Last Month</option>
                                        <option value="thismonth">This Month</option>
                                    </select>

                                </div>
                                <!--end:Col-->

                                <!--begin::Col-->
                                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 col-xs-4 fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                        data-placeholder="Filter category"  id="category">
                                        <option></option>
                                        <option value="bn">বাংলাদেশ</option>
                                        <option value="in">আন্তর্জাতিক</option>
                                        <option value="bn_in">বাংলাদেশ ও আন্তর্জাতিক</option>
                                    </select>

                                </div>
                                <!--end:Col-->

                            </div>
                            <!--end::Input group-->
                        </span>
                    </div>
                    <!--begin::admin.samprotik question-->
                    <div class="row" id="samprotik_ques">
                        @include('admin.samprotik.samprotik')
                    </div>
                    <!--end::samprotik question-->
                    
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('script')
<script type="text/javascript">

    $(document).ready(function(){

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
                url:"?page="+page,
                success:function(data)
                {
                    $('#samprotik_ques').html(data.html);
                }
            });
        }

    });

    $(document).ready( function(){
        //option filter
        $('#option').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik/option-filter') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    option: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            });
        })

        //date filter
        $('#date-filter').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik-filter-by-date') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    value: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            })
        })

        //category
        $('#category').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik-filter-category') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    category: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            });
        })
    })

    //show description form
    $(document).on('click', '.add-description', function(){
        $('div.update-form').html('');
        $('.update-des').show();

        var question_id = $(this).data('question_id');
        //console.log(question_id);
        var html = '';

        html += '<input type="hidden" name="question_id" value="'+ question_id +'"';
        html += '<span id="kk_add_description_form" class="form">';
        html +=    '<div class="col-md-12 mb-5">';   
        html +=          '<textarea name="description" id="textareaDescription" class="form-control form-control-solid h-100px"></textarea>';
        html +=     '</div>';
        html +=      '<div class="d-flex justify-content-end">';
        html +=            '<button type="submit" id="kk_add_description" class="btn btn-primary btn-sm">add</button>';
        html +=       '</div>';
        html +=   '</span>';
        html +=   '<button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_add_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>';
       
        $(this).closest('div').find('.add-des-form').html(html);
    })

    //cancel button of add
    $(document).on('click', '.kk_modal_new_add_cancel', function(){
        $(this).parent('div.add-des-form').html('');
    })

    //add description --save
    $(document).on('click', '#kk_add_description', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')

        var thisaddbtn = $(this);

        var question_id = $('input[name=question_id]').val();
        var description = $('#textareaDescription').val();
        // console.log(question_id);
        // console.log(description);

        $.ajax({
            type:"POST",
            url: "{{ url('admin/samprotik-description/store')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                question : question_id,
                description : description
            },
           dataType: "json",
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                }else{
                    toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.add-des-form').html('');
                    location.reload();
                }

            }
        });
    })

   
                       
    //show update description form
    $(document).on('click', '.update-des', function(){
        $(this).hide();
        $('div.add-des-form').html('');

        var description_id = $(this).data('description_id');
        var description = $(this).text();
        // console.log(description_id);
        // console.log(description);

        var html = '';

        html += '<input type="hidden" name="description_id" value="'+ description_id +'"';
        html += '<span id="kk_update_description_form" class="form">';
        html +=    '<div class="col-md-12 mb-5">';   
        html +=          '<textarea name="description" id="textareaDescription" class="form-control form-control-solid h-100px">'+ description +'</textarea>';
        html +=     '</div>';
        html +=      '<div class="d-flex justify-content-end">';
        html +=            '<button type="submit" id="kk_update_description" class="btn btn-primary btn-sm">update</button>';
        html +=       '</div>';
        html +=   '</span>';
        html +=   '<button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_update_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>';
       

        $(this).closest('div').find('.update-form').html(html);
    })

    //cancel button of update
    $(document).on('click', '.kk_modal_new_update_cancel', function(){
        $(this).parent('div.update-form').html('');
        $('.update-des').show();
    })


    //update description --save
    $(document).on('click', '#kk_update_description', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')

        var thisaddbtn = $(this);

        var description_id = $('input[name=description_id]').val();
        var description = $('#textareaDescription').val();
        // console.log(description_id);
        // console.log(description);
      
        $.ajax({
            type:"POST",
            url: "{{ url('admin/samprotik-description/update')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                description_id : description_id,
                description : description
            },
           dataType: "json",
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                }else{
                    toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.update-form').html('');
                    thisaddbtn.parent().parent("div").find('.update-des').show();
                    location.reload();
                }

            }
        });
    })


    //get tag
    $(document).on('keyup', '.get-tag', function() {
        var timeout = null;
        var question_id = $(this).data('question_id');
        var this_input = $(this);

        //request send after .5s delay
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            var val = $(this).val();

            if (val == "") {
                $('.tag').html('');
            }
            //If val is not empty.
            else {

                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/samprotik-tag/get-tag')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        //Assigning value of "val" into "search" variable.
                        question_id : question_id,
                        data : val
                    },
                    //If result found, this funtion will be called.
                    success: function(data) {
                        //console.log(data)
                        this_input.closest('div').find('.tag').html(data);

                    }
                });
            }
        }, 500);

    });

    //add tag
    $(document).on('click', '.add-tag', function(){
        var sid = $(this).data('sid');
        var qid = $(this).data('qid');

        // console.log(sid)
        // console.log(qid)
        var this_input = $(this);

        //AJAX is called.
        $.ajax({
            type: "POST",
            url: "{{ url('admin/samprotik-question/add-tag')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                //Assigning value of "val" into "search" variable.
                subject_id: sid,
                question_id : qid,
            },
            //If result found, this funtion will be called.
            success: function(data) {
                if(data.success){
                    toastr.success(data.message);
                    $('.tag').html('');
                    $('.get-tag').val(''); 
                                                                       
                }
                else{
                    toastr.error(data.message)
                }
            }
        });
    })

    //delete Question
    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want delete this?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Confirm",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((function (o) {
            if(o.value){ //if agree
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/question/samprotik-question/delete') }}"+'/'+id,
                    data: {},
                    success: function (res)
                    {
                        if(res.success){
                            Swal.fire({
                                text: res.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                location.reload();
                            }))
                        }
                    }
                });

            }else{ //if cancel
                Swal.fire({
                    text: "Item has not been deleted",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                })
            }

        }))
    })

</script>

@endpush

