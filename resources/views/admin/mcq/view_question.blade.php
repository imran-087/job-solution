@extends('admin.layout.app')
@section('title', 'MCQ-Question')

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
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary ">Back</a>
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
            
            <!--begin::admin.all mcq question-->    
            <div class="row" id="all_question">
                @include('admin.mcq.all-question')
            </div>
            <!--end::admin.all mcq question-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('script')
{{-- <script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#all_question").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script> --}}

<script type="text/javascript">

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
        html +=           '<div class="help-block with-errors description-error"></div>'
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
            url: "{{ url('admin/description/question-description/store')}}",
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
        html +=           '<div class="help-block with-errors description-error"></div>'
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
            url: "{{ url('admin/question-description/update')}}",
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
                    url: "{{ url('admin/question/delete') }}"+'/'+id,
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

    //######## TAG ADD ##########
    //search tag
    $(document).ready(function() {
        var timeout = null;
        $(document).on('keyup', '.search_tag', function() {
            var question_id = $(this).data('question_id');
            var subject_id = $(this).data('subject_id');
            
            var this_input = $(this);
            //console.log(id)

            clearTimeout(timeout);
            timeout = setTimeout(() => {
                var val = $(this).val();
                    if (val == "") {
                    $('.result').html('');
                }
            //If val is not empty.
            else {
                //AJAX is called.
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/question/tag/search')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        //Assigning value of "val" into "search" variable.
                        search: val,
                        question_id : question_id,
                        subject_id : subject_id,
                    },
                    //If result found, this funtion will be called.
                    success: function(data) {
                        //console.log(data)
                        this_input.closest('div').find('.result').html(data);
                        //this_input.closest('#result').hide()
                        //$('#result').html(data);

                    }
                });
            }
            }, 700);

        });
    })

    //add tag
    $(document).ready(function(){
        $(document).on('click', '.add', function(){
            var sid = $(this).data('sid')
            var qid = $(this).data('qid')

            //AJAX is called.
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/question/tag/tag-added')}}",
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
                            $('.result').html('');
                            $('.search_tag').val('');
                            location.reload();
                        }
                        else{
                            toastr.error(data.message);
                        }
                        
                    }
                });
        })
    })

    //tag delete btn show on hover
    $(".tag").hover(
        function () {
            $(this).find('.X').removeClass("d-none");
        },
        function () {
            $(this).find('.X').addClass("d-none");
        }
    );

    //delete tag
    $(document).on('click', '.X', function(){
        var id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want delete this tag?",
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
                    url: "{{ url('admin/question/tag/tag-delete') }}"+'/'+id,
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


