<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

            <!--begin::dashboard  -->
            <div class="menu-item">
                <a class="menu-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"  >
                    <span class="menu-icon">
                       <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title fs-6 ">Dashboard</span>
                </a>
            </div>
            <!--end::dashboard  -->
            
            <!--begin::main menu  -->
            <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Main Menu</span>
            </div>
            </div>

            <!--begin::categories  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Categories</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="{{ route('admin.main-category.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Main Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/sub-category*') ? 'active' : '' }}" href="{{ route('admin.sub-category.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sub Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/institutes*') ? 'active' : '' }}" href="{{ route('admin.institute.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Institution</span>
                        </a>
                    </div>
                   
                </div>
            </div>
            <!--end::categories  -->

            <!--begin::subject  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Subject</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                   <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="{{ url('admin/category/subject') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Subject</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Subject</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::subject  -->

            <!--begin::MCQ  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">MCQ Question</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="{{ route('admin.academy.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="{{ route('admin.question.category') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/create-question*') ? 'active' : '' }}" href="{{ route('admin.question.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/question-index*') ? 'active' : '' }}" href="{{ route('admin.question.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested MCQ</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Description</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::MCQ  -->

            <!--begin::Written Question  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Written Question</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/written-question*') ? 'active' : '' }}" href="{{ route('admin.written.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/written-question/view*') ? 'active' : '' }}" href="{{ route('admin.written.view.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Description</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::Writen Question  -->

            <!--begin::Current Affairs  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/samprotik-question*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Current Affairs</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/samprotik-question/create*') ? 'active' : '' }}" href="{{ route('admin.samprotik.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/samprotik-question*') ? 'active' : '' }}" href="{{ route('admin.samprotik.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/samprotik-tag*') ? 'active' : '' }}" href="{{ route('admin.samprotik-tag.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Samprotik Tag</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Current Affairs  -->

            <!--begin::Passage  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Passage</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                   <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/passage*') ? 'active' : '' }}" href="{{ route('admin.passage.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Passage</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Passage</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::Passage  -->

            
            <!--begin::Video Library  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Video Library</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                   <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/passage*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Video</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Video</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::video library  -->

            <!--begin::PDF Book Library  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">PDF Book Library</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                   <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/passage*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All PDF</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested pdf</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::PDF Book library  -->

            <!--begin::Description Management  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Description Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/add-question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Description</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Description</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/pending-question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.pending') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Description</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::Description  -->


            <!--begin::Tag Management  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Tag Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/add-tag-on-question*') ? 'active' : '' }}" href="{{ route('admin.question.tag') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Tag</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/add-tag-on-question*') ? 'active' : '' }}" href="{{ route('admin.question.tag') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Tag</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/pending-question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.pending') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Tag</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::Tag  -->


            {{-- Exam Menu Start  --}}
            <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Exam</span>
            </div>
            </div>

            <!--begin::exam management -->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="currentColor"></path>
                                <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Exam Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="390" style="display: none; overflow: hidden;">
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam/create*') ? 'active' : '' }}" href="{{ route('admin.exam.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Exam</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/create*') ? 'active' : '' }}" href="{{ route('admin.exam-details.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Subject</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/add-question*') ? 'active' : '' }}" href="{{ route('admin.exam-details.question') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-result*') ? 'active' : '' }}" href="{{ route('admin.exam-result.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam Result</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam/create*') ? 'active' : '' }}" href="{{ route('admin.exam.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Exam</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/create*') ? 'active' : '' }}" href="{{ route('admin.exam-details.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Subject</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/add-question*') ? 'active' : '' }}" href="{{ route('admin.exam-details.question') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-result*') ? 'active' : '' }}" href="{{ route('admin.exam-result.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam Result</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam/create*') ? 'active' : '' }}" href="{{ route('admin.exam.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Exam</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/create*') ? 'active' : '' }}" href="{{ route('admin.exam-details.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Subject</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/add-question*') ? 'active' : '' }}" href="{{ route('admin.exam-details.question') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-result*') ? 'active' : '' }}" href="{{ route('admin.exam-result.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam Result</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam List</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam/create*') ? 'active' : '' }}" href="{{ route('admin.exam.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Exam</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/create*') ? 'active' : '' }}" href="{{ route('admin.exam-details.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Subject</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-details/add-question*') ? 'active' : '' }}" href="{{ route('admin.exam-details.question') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/exam-result*') ? 'active' : '' }}" href="{{ route('admin.exam-result.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Exam Result</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Exam</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Exam</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!-- end::exam management -->


            {{-- Exam Menu End  --}}

            {{-- begin::Forum Menu Start  --}}
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Forum</span>
                </div>
            </div>

            <!--begin::Forum  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Forum Question</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/question-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Description</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::Forurm  -->

            <div class="menu-item">
                <a class="menu-link {{ request()->is('admin/forum/channel*') ? 'active' : '' }}" href="{{ route('admin.channel.index') }}" >
                    <span class="menu-icon">
                       <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Channel</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->is('admin/forum/discussion*') ? 'active' : '' }}" href="{{ route('admin.discussion.index') }}" >
                    <span class="menu-icon">
                       <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Discussion</span>
                </a>
            </div>
            {{--end::forum Menu end  --}}

            {{-- begin::blog&notice  --}}
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Blog and Notice</span>
                </div>
            </div>

            <!--begin::blog  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Blog</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/question-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Blog</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Blog</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::blog  -->

            <!--begin::notice  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Notice</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Academy</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Admission</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Job</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/category-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Special Skill</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/question-index*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Notice</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/subject*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Requested Notice</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!--end::notice  -->

            <!--begin::news  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Daily Short news</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All News</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category/main-category*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">News Category</span>
                        </a>
                    </div>
                   
                </div>
            </div>
            <!--end::news  -->

            {{--end::blog&notice  --}}

            {{-- begin::role_permision  --}}
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Role & Permission</span>
                </div>
            </div>

            <!--begin::user  -->
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/category*') ? 'show menu-accordion' : '' }}">
                
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('admin/user-management/user-list*') ? 'active' : '' }}" href="{{ route('admin.user-management.index') }}" >
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('admin/role*') ? 'active' : '' }}" href="{{ route('admin.role.index') }}" >
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Role</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('admin/role*') ? 'active' : '' }}" href="#" >
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Permission</span>
                    </a>
                </div>
            </div>
            <!--end::blog  -->

            {{-- end::role&permission --}}

            <!--begin::setting menu -->
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
                </div>
            </div>

            <!--begin::Settings-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="currentColor"></path>
                                <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Settings</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="390" style="display: none; overflow: hidden;">
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Site Setting</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/settings*') ? 'active' : '' }}" href="{{ route('admin.setting.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">General</span>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Page Setting</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/page/create*') ? 'active' : '' }}" href="{{ route('admin.page.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Page</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/pages*') ? 'active' : '' }}" href="{{ route('admin.pages') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">All Pages</span>
                                </a>
                            </div> 
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Resume Metadata</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/skill/index*') ? 'active' : '' }}" href="{{ route('admin.skill.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Skills</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/functional-job-cartegory/index*') ? 'active' : '' }}" href="{{ route('admin.functional-job-category.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Functional Job Category</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/industrial-job-cartegory/index*') ? 'active' : '' }}" href="{{ route('admin.industrial-job-category.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Industrial Job Category</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/major-subject/index*') ? 'active' : '' }}" href="{{ route('admin.major-subject.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Major Subject</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/education-degree/index*') ? 'active' : '' }}" href="{{ route('admin.education-degree.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Education Degree</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Address</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/country/index*') ? 'active' : '' }}" href="{{ route('admin.country.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Country</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/state/index*') ? 'active' : '' }}" href="{{ route('admin.state.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">State</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/city/index*') ? 'active' : '' }}" href="{{ route('admin.city.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">City</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/upazila/index*') ? 'active' : '' }}" href="{{ route('admin.upazila.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Upazila</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/post/index*') ? 'active' : '' }}" href="{{ route('admin.post.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                <span class="menu-title ms-2">Post Office</span>
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Payment</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/bookmark-type*') ? 'active' : '' }}" href="{{ route('admin.bookmark-type.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Bookmark Type</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/year*') ? 'active' : '' }}" href="{{ route('admin.year.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Year</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/points*') ? 'active' : '' }}" href="{{ route('admin.point.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Points</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/packages*') ? 'active' : '' }}" href="{{ route('admin.package.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Packages</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/packages*') ? 'active' : '' }}" href="#" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Notification</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/packages*') ? 'active' : '' }}" href="#" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Queue</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/packages*') ? 'active' : '' }}" href="#" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Schedule Command</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!-- end::Setting -->

            <!--begin:: Other Menu -->
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Other</span>
                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/exam*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Others</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/points*') ? 'active' : '' }}" href="{{ route('admin.point.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Points</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/packages*') ? 'active' : '' }}" href="{{ route('admin.package.index') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Packages</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/subject/subject-tree*') ? 'active' : '' }}" href="{{ route('admin.subject.tree') }}" >
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Subject Tree</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end::other menu-->

            
            {{-- trashed  --}}
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/description*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Trashed</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
        
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/trashed/question-trashed*') ? 'active' : '' }}" href="{{ route('admin.trashed.question') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Question Trashed</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/trashed/description-trashed*') ? 'active' : '' }}" href="{{ route('admin.trashed.description') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Description Trashed</span>
                        </a>
                    </div>
 
                </div>
            </div>

           
            
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Converter</span>
                </div>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->is('admin/forum/channel*') ? 'active' : '' }}" href="{{ route('admin.image.samprotik') }}" >
                    <span class="menu-icon">
                       <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Samprotik to Image</span>
                </a>
            </div>


             {{-- old question management --}}
            {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="currentColor"></path>
                                <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Question Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="390" style="display: none; overflow: hidden;">
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">MCQ Question</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/question/create-question*') ? 'active' : '' }}" href="{{ route('admin.question.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/question/mcq-question*') ? 'active' : '' }}" href="{{ route('admin.question.category') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View Question</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/academy/mcq-question*') ? 'active' : '' }}" href="{{ route('admin.academy.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Academy Question</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Written Question</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/question/written-question*') ? 'active' : '' }}" href="{{ route('admin.written.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"><i class="fas fa-plus me-3"></i> Add Question</span>
                                </a>
                            </div>
                           <div class="menu-item">
                                <a class="menu-link {{ request()->is('admin/question/written-question/view*') ? 'active' : '' }}" href="{{ route('admin.written.view.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> <i class="fas fa-eye me-3"></i> View Question</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/question-index*') ? 'active' : '' }}" href="{{ route('admin.question.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Question</span>
                        </a>
                    </div>
                    
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/question/edited-question*') ? 'active' : '' }}" href="{{ route('admin.question.edited-question') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Edited Question</span>
                        </a>
                    </div>
                </div>
            </div> --}}

            
            {{-- old description  --}}
            {{-- <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/description*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Description Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
        
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/add-question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Description</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Description</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/description/pending-question-description*') ? 'active' : '' }}" href="{{ route('admin.question-description.pending') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Pending Description</span>
                        </a>
                    </div>
                    
                    
                </div>
            </div> --}}

            
            {{-- old exam management  --}}
            {{-- <div data-kt-menu-trigger="click" class="menu-item {{ request()->is('admin/exam*') ? 'show menu-accordion' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Exam Management</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion  menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam*') ? 'active' : '' }}" href="{{ route('admin.exam.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Exam List</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam/create*') ? 'active' : '' }}" href="{{ route('admin.exam.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Create Exam</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam-details/create*') ? 'active' : '' }}" href="{{ route('admin.exam-details.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Subject</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam-details/add-question*') ? 'active' : '' }}" href="{{ route('admin.exam-details.question') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Question</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/exam-result*') ? 'active' : '' }}" href="{{ route('admin.exam-result.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Exam Result</span>
                        </a>
                    </div>
                   
                </div>
            </div> --}}

           
            
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--begin::Footer-->
<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
   
    <a class="btn btn-custom btn-primary w-100" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
        <span class="btn-label">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Sign-out.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
                        <rect fill="#000000" opacity="0.3"
                            transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                            x="13" y="6" width="2" height="12" rx="1" />
                        <path
                            d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
            {{ __('Logout') }}
        </span>
    </a>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    
</div>
<!--end::Footer-->
