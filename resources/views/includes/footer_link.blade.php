	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
	<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="{{ asset('assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="{{ asset('assets') }}/js/widgets.bundle.js"></script>
	<script src="{{ asset('assets') }}/js/custom/widgets.js"></script>
	<script src="{{ asset('assets') }}/js/custom/apps/chat/chat.js"></script>
	<script src="{{ asset('assets') }}/js/custom/intro.js"></script>
	<script src="{{ asset('assets') }}/js/custom/utilities/modals/upgrade-plan.js"></script>
	<script src="{{ asset('assets') }}/js/custom/utilities/modals/create-app.js"></script>
	<script src="{{ asset('assets') }}/js/custom/utilities/modals/users-search.js"></script>

	<script src="{{ asset('assets') }}/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
	<!--end::Page Custom Javascript-->

	<!--begin::jsTree Bundle(used by all pages)-->
	<script src="{{ asset('assets') }}/plugins/custom/jstree/jstree.bundle.js"></script>
	<!--End::jsTree  -->

	<!--Toastr Notification -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	@include('admin.include.toastr')

	<!--swipe slider -->
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


	<!---- own js ---->
	<script src="{{ asset('js/custom.js') }}"></script>
	

	<!--- CK Editor --->
	{{-- <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace('ckeditor');
	</script> --}}

	<script type="text/javascript">
    var myEditor;

    ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic')
        //image upload in ckeditor
        // ckfinder:{
        //     uploadUrl: '{{ route('ckeditor.upload'). '?_token='.csrf_token() }}'
        // },
    )
    .then(editor => {
        //console.log( 'Editor was initialized', editor );
        myEditor = editor;
    })
    .catch(error => {
        
    });
	
	</script>
	
	
	@stack('script')