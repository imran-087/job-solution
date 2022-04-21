 <!--begin::Row-->
<div class="row gy-5 g-xl-8" >
    <div class="col-xxl-10 mb-xl-10 col-md-10 col-sm-12 col-xs-12">
        <!--begin::Engage widget 1-->
        <div class="card h-md-100">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column flex-center">
                <!--begin::Heading-->
                <div class="mb-2">
                    <!--begin::Title-->
                   <a href="/subjects">All</a> >                
                    <?php $link = "" ?>
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        @if($i < count(Request::segments()) & $i > 0)
                        <?php $link .= "/" . Request::segment($i); ?>
                        <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> >
                        @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                        @endif
                    @endfor
                    
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                
            </div>
            <!--end::Body-->
        </div>
        <!--end::Engage widget 1-->
    </div>
</div>
<!--end::Row-->

{{-- <ol class="breadcrumb text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3"><a href="/home" class="pe-3">Home</a></li>
    <?php $link = "" ?>
    @for($i = 1; $i <= count(Request::segments()); $i++)
        @if($i < count(Request::segments()) & $i > 0)
        <?php $link .= "/" . Request::segment($i); ?>
         <li class="breadcrumb-item pe-3"><a href="<?= $link ?>" class="pe-3">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> </li>
        @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
        @endif
    @endfor
</ol> --}}



    
   
