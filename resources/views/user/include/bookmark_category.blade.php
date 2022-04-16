 @php
    $bookmark_categories = App\Models\BookmarkType::where('created_user_id', Auth::id())->orWhere('created_user_id', 0)->get();
   // dump($bookmark_categories->count())
 @endphp
 <div class="card">
    <!--begin::Body-->
    <div class="card-body p-lg-15">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-275px  me-lg-20">
                
                <!--begin::Catigories-->
                <div class="mb-15">
                    <h4 class="text-black mb-5">Bookmark Category</h4>
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-bold">
                        @foreach($bookmark_categories as $category)
                        <!--begin::Item-->
                        <div class="menu-item mb-3">
                            <!--begin::Link-->
                            <a class="menu-link py-3 active" href="{{ route('user.bookmark.bookmark-type',['type_id' => $category->id]) }}">{{$category->type_name}}</a>

                            {{-- <a href="#" class="menu-link py-3 active">Bootstrap Admin</a> --}}
                            <!--end::Link-->
                        </div>
                        <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Catigories-->
                
                
            </div>
            <!--end::Sidebar-->
            
        </div>
        <!--end::Layout-->
        
    </div>
    <!--end::Body-->
</div>