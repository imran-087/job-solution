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
		<!--end::Page Custom Javascript-->

		<!--Toastr Notification -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		@include('admin.include.toastr')

		<!---- own js ---->
		<script src="{{ asset('js/custom.js') }}"></script>


		<!--- CK Editor --->
		<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

		{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
		<!--end::Javascript-->
		{{-- <script>
			 @if(Session::has('success'))
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
						toastr.success("{{ session('success') }}");
				@endif

				@if(Session::has('error'))
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
						toastr.error("{{ session('error') }}");
				@endif

				@if(Session::has('info'))
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
						toastr.info("{{ session('info') }}");
				@endif

				@if(Session::has('warning'))
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
						toastr.warning("{{ session('warning') }}");
				@endif
		</script> --}}

		@stack('script')