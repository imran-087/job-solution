    @if($questions->count() > 0)
        @foreach($questions as $question)
        <tr>
            <td>
                <span >{{ $loop->index+1 }}</span>
            </td>
        
            <td class="">
                <span class="fw-bolder">{{$question->question}}</span>
            </td>
            
            <td>
                <span class="badge badge-success">{{ $question->descriptions->count() }}</span>
            </td>
            <!--begin::Action=-->
            <td class="">
                <a href="javascript:;" class="btn btn-sm btn-light btn-active-color-primary me-3 addDescription" data-id="{{ $question->id }}" >Add Description</a>
                
            </td>
            <!--end::Action=-->
        </tr>
        @endforeach
    @else
    <tr>
        <td></td>
        <td class="fw-bolder" style="color: red">No Question Found</td>
        <td></td>
        <td></td>
    </tr>
    @endif
