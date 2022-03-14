<!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-5 pb-0">
                
                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder mb-2">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('/my-dashboard*') ? 'active': '' }}" href="{{route('user-dashboard.index', [Auth::user()->id])}}">Overview</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('user-dashboard.profile-settings', [Auth::user()->name]) }}">Settings</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('user-dashboard.bookmark', [Auth::user()->id]) }}">Bookmark</a>
                    </li>
                    <!--end::Nav item-->
                    
                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->