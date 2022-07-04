<div class="card mb-9 text-center">
    <div class="card-body text-center">
        
        <a href="{{ route('resume.personal') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder  {{  Request::routeIs('resume.personal') ? 'active' : '' }}"><i class="fas fa-user fa-2xl"></i>Personal</a>
        <a href="{{ route('resume.education') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder  {{  Request::routeIs('resume.education') ? 'active' : '' }}"><i class="fas fa-graduation-cap fa-2xl"></i>Education/Training</a>
        <a href="{{ route('resume.employment') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder {{  Request::routeIs('resume.employment') ? 'active' : '' }}"><i class="fas fa-briefcase fa-2xl"></i>Employment History</a>
        <a href="{{ route('resume.other_info') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder  {{  Request::routeIs('resume.other_info') ? 'active' : '' }}"><i class="fas fa-list fa-2xl"></i>Other Information</a>
        <a href="{{ route('resume.photo') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder  {{  Request::routeIs('resume.photo') ? 'active' : '' }}"><i class="fas fa-camera fa-2xl"></i>Photograph</a>
        <a href="{{ route('resume.view.index') }}" class="btn btn-light btn-active-color-primary me-3 py-3 fs-6 fw-bolder  {{  Request::routeIs('resume.photo') ? 'active' : '' }}"><i class="fas fa-eye fa-2xl"></i>View Resume</a>
    </div>
</div>