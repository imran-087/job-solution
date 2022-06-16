<ul>
        @foreach ($subjects as $key => $subject) 
        <li id="{{ $subject->id }}" class="{{ ($subject->children()->count() > 0 ? 'jstree-closed' : '') }}">
                
                {{ $subject->name }} &nbsp; <span class="fs-8">{{ $subject->sub_category->name ?? 'jobs' }}</span>
        </li>
        @endforeach
</ul>