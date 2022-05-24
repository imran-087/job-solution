//old code
// public function index()
// {
// $main_categories = MainCategory::all();
// $years = Year::all();
// return view('admin.written_ques.index', compact('main_categories', 'years'));
// }

// public function create(Request $request)
// {
// //dd($request->all());

// $number = $request->number;
// $type = $request->type;
// $view = view('admin.written_ques.input_layout', compact('number', 'type'))->render();

// return response([
// 'html' => $view
// ]);
// }

// //Written Question store
// public function store(Request $request)
// {
// //dd($request->all());
// // $request->validate([
// // 'main_category' => ['required'],
// // 'sub_category' => ['required'],
// // 'subject' => ['required'],
// // 'year' => [$request->main_category == 3 ? 'nullable' : 'required'],
// // 'question.*' => ['required'],
// // 'question_no.*' => ['required'],
// // 'answer.*' => ['required'],

// // ]);
// if ($request->instruction_no) {
// $instruction = QuestionInstruction::create([
// 'question_parent_instruction_id' => $request->parent_instruction,
// 'main_category_id' => $request->main_category,
// 'sub_category_id' => $request->sub_category,
// 'subject_id' => $request->subject,
// 'year_id' => $request->year,
// 'instruction_no' => $request->instruction_no,
// 'instruction' => $request->instruction,
// 'created_user_id' => Auth::guard('admin')->user()->id
// ]);
// }


// //question save
// foreach ($request->question as $key => $value) {

// if (\strlen($value) > 1) {
// if ($request->main_category == 3) {
// $year = null;
// } else {
// $year = $request->year;
// }
// //question save
// $question = new WrittenQuestion();

// if ($request->instruction_no) {
// $question->question_instruction_id = $instruction->id;
// }
// if ($request->parent_instruction_no) {
// $question->question_parent_instruction_id = $request->parent_instruction_no[$key];
// }
// $question->subject_id = $request->subject;
// $question->sub_category_id = $request->sub_category;
// $question->main_category_id = $request->main_category;
// $question->year_id = $year;
// $question->mark = $request->mark[$key];
// $question->question = $request->question[$key];
// $question->question_no = $request->question_no[$key];
// $question->question_or = $request->question_or[$key];
// $question->answer = $request->answer[$key];
// $question->status = 'active';
// $question->created_user_id = Auth::guard('admin')->user()->id;
// $question->slug = Str::slug(Str::limit($request->question[$key], 80));
// //dd($question->slug);
// $question->save();
// }
// }
// return redirect()->back()->with('success', 'Question created successfully');
// }

// public function show(Request $request)
// {
// $sub_categories = WrittenQuestion::with('sub_category')->groupBy('sub_category_id')->get();
// $load = 'false';
// $parent_instructions = null;
// $exam_detail = null;
// $without_parent_questions = null;
// //dd($questions);
// if ($request->has('sub_category')) {
// //dd('here');
// $exam_detail = SubCategory::find($request->sub_category);
// $parent_instructions = QuestionParentInstruction::with('written_questions', 'question_instruction')->where('sub_category_id', $request->sub_category)->get();
// $without_parent_questions = WrittenQuestion::where([
// 'sub_category_id' => $request->sub_category,
// 'question_parent_instruction_id' => null,
// 'question_instruction_id' => null,
// ])->get();
// $load = 'true';
// }
// //dd($parent_instructions);
// return view('admin.written_ques.view_question', compact('parent_instructions', 'without_parent_questions', 'sub_categories', 'exam_detail', 'load'));
// }

// public function edit($id, $type)
// {
// if ($type == 'parent_instruction') {
// $question = QuestionParentInstruction::where('id', $id)->first();
// //dd($question);
// $view = view('admin.written_ques.edit', compact('question', 'type'))->render();

// return response([
// 'html' => $view
// ]);
// } else if ($type == 'instruction') {
// $question = QuestionInstruction::where('id', $id)->first();
// //dd($question);
// $view = view('admin.written_ques.edit', compact('question', 'type'))->render();

// return response([
// 'html' => $view
// ]);
// } else if ($type == 'question') {
// $question = WrittenQuestion::where('id', $id)->first();
// //dd($question);
// $view = view('admin.written_ques.edit', compact('question', 'type'))->render();

// return response([
// 'html' => $view
// ]);
// }
// }

// public function update(Request $request)
// {
// //dd($request->all());
// if ($request->type == 'question') {
// $written_question = WrittenQuestion::find($request->question_id);

// $written_question->question = $request->question;
// $written_question->answer = $request->answer;

// if ($written_question->update()) {
// return response()->json([
// 'success' => true,
// 'message' => 'Question updated'
// ], 200);
// } else {
// return response()->json([
// 'error' => true,
// 'message' => 'Failed!'
// ]);
// }
// } elseif ($request->type == 'instruction') {
// $question_instruction = QuestionInstruction::find($request->question_id);

// $question_instruction->instruction = $request->question;

// if ($question_instruction->update()) {
// return response()->json([
// 'success' => true,
// 'message' => 'Child Instruction updated'
// ], 200);
// } else {
// return response()->json([
// 'error' => true,
// 'message' => 'Failed!'
// ]);
// }
// }
// if ($request->type == 'parent_instruction') {
// $question_parent_instruction = QuestionParentInstruction::find($request->question_id);

// $question_parent_instruction->parent_instruction = $request->question;

// if ($question_parent_instruction->update()) {
// return response()->json([
// 'success' => true,
// 'message' => 'Parent instruction updated'
// ], 200);
// } else {
// return response()->json([
// 'error' => true,
// 'message' => 'Failed!'
// ]);
// }
// }
// }