<ul>
        @foreach ($subjects as $key => $subject) 
        <li id="{{ $subject->id }}" class="{{ ($subject->children()->count() > 0 ? 'jstree-closed' : '') }}">
                
                {{ $subject->name }}
        </li>
        @endforeach
</ul>