<ul>
        @foreach ($questions as $key => $subject) 
        <li id="{{ $subject->id }}" class="{{ ($subject->children()->count() > 0 ? 'jstree-closed' : '') }}">
                
                {{ $subject->question }}
        </li>
        @endforeach
</ul>