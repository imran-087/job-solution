<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionParentInstruction;

class ParentInstructionController extends Controller
{
    public function create()
    {
        $main_categories = MainCategory::select('id', 'name')->get();
        return view('admin.written_ques.parent_instruction.create', compact('main_categories'));
    }

    // store parent Insctuction 
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sub_category' => 'required',
            'instruction_no' => 'required'
        ]);

        QuestionParentInstruction::create([
            'sub_category_id' => $request->sub_category,
            'parent_instruction_no' => $request->instruction_no,
            'parent_instruction' => $request->instruction,
            'mark' => $request->mark,
        ]);
        return redirect()->back()->with('success', 'Parent Instruction saved');
    }
}
