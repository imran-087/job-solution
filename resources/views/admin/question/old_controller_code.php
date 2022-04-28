 public function previewQuestion()
 {
 $questions = PreviewQuestion::all();
 return view('admin.question.preview', compact('questions'));
 }

 public function editPreviewQuestion($id)
 {
 $question = PreviewQuestion::find($id);
 $passages = Passage::all();
 //dd($question);
 $view = view('admin.question.edit_question_modal', compact('question', 'passages'))->render();

 return response([
 'html' => $view
 ]);
 }

 //update question
 public function updatePreviewQuestion(Request $request)
 {
 //dd($request->all());
 $question = PreviewQuestion::find($request->id);

 $question->passage_id = $request->passage ?? '';
 $question->question = $request->question;

 if ($request->type == 'written') {
 $question->written_answer = $request->written_answer;
 } elseif ($request->type == 'mcq') {
 $question->option_1 = $request->option_1;
 $question->option_2 = $request->option_2;
 $question->option_3 = $request->option_3;
 $question->option_4 = $request->option_4;
 $question->option_5 = $request->option_5;
 $question->answer = $request->answer;
 } elseif ($request->type == 'samprotik') {
 $question->answer = $request->answer;
 }

 if ($question->update()) {
 return response()->json([
 'success' => true,
 'message' => __('Question updated!')
 ], 200);
 } else {
 return response()->json([
 'error' => true,
 'message' => __('Failed!.')
 ]);
 }
 }

 public function storeQuestion($val)
 {
 if ($val == 'confirm') {
 $previewQuestions = PreviewQuestion::all();
 //dd($previewQuestions->count());
 foreach ($previewQuestions as $request) {
 // $hello = (json_encode($request->image_option));
 // dump($hello);
 // dd(json_decode($hello));
 $question = new Question;
 $question->subject_id = $request->subject_id;
 $question->sub_category_id = $request->sub_category_id;
 $question->main_category_id = $request->main_category_id;
 $question->year_id = $request->year_id;
 $question->passage_id = $request->passage_id;
 $question->question_type = $request->question_type;
 $question->hard_level = $request->hard_level;
 $question->mark = $request->mark;
 $question->question = $request->question;
 $question->future_editable = $request->future_editable;
 $question->lock_status = $request->lock_status;
 $question->status = $request->status;
 $question->created_user_id = $request->created_user_id;
 // $question->slug = $request->slug;

 $question->save();

 $question_option = new QuestionOption();

 $question_option->question_id = $question->id;

 if ($request->question_type == 'written') {
 $question_option->written_answer = $request->written_answer;
 } elseif ($request->question_type == 'samprotik') {
 $question_option->answer = $request->answer;
 } else {
 $question_option->option_1 = $request->option_1 ?? '';
 $question_option->option_2 = $request->option_2 ?? '';
 $question_option->option_3 = $request->option_3 ?? '';
 $question_option->option_4 = $request->option_4 ?? '';
 $question_option->option_5 = $request->option_5 ?? '';
 $question_option->answer = $request->answer;
 //dd(($request->image_option));
 $question_option->image_option = $request->image_option ?? '';
 }

 $question_option->save();

 //tag
 if ($request->main_category_id != '') {
 $question->pivotsubject()->sync($request->subject_id);
 $question->save();
 // $tag = Tag::create([
 // 'subject_id' => $request->subject_id,
 // 'question_id' => $question->id,
 // ]);
 }
 }

 PreviewQuestion::truncate();

 return response()->json(
 [
 'success' => true,
 'message' => 'Question created Successfully',
 "redirect_url" => route('admin.question.index')
 ],
 200
 );
 }
 }

 // public function store(Request $request)
 // {
 // //dd($request->all());
 // //multiple image question
 // if ($request->hasfile('image')) {
 // //dd('ok');
 // foreach ($request->file('image') as $key => $file) {
 // //dd('option_'.$key);
 // // dump($file);
 // // echo "<br>";
 // $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
 // // dump($name);
 // // echo "<br>";
 // $path = public_path() . '/uploads/Img/QuestionImage/';
 // $file->move($path, $name);
 // $image_path = 'uploads/Img/QuestionImage/' . $name;
 // $Imgdata[] = [
 // 'option_' . $key => $image_path
 // ];
 // //dump($Imgdata);
 // if (count($request->question) > 1) {
 // $chunk_image = array_chunk($Imgdata, ceil(count($Imgdata) / 2));
 // }

 // //dump($chunk_image);
 // //dump($chunk_image[1]);
 // }
 // } //else {
 // // //dd('not ok');
 // // $chunk_image = 'NULL';
 // // }

 // //dd(json_encode($chunk_image));

 // //question save
 // foreach ($request->question as $key => $value) {
 // if (\strlen($value) > 1) {
 // //question save
 // $question = new Question;
 // $question->subject_id = $request->subject;
 // $question->sub_category_id = $request->sub_category;
 // $question->main_category_id = $request->main_category;
 // $question->year_id = 1;
 // $question->passage_id = $request->passage;
 // $question->question_type = $request->type;
 // $question->hard_level = 1;
 // $question->mark = 1;
 // $question->question = $request->question[$key];
 // $question->future_editable = 1;
 // $question->lock_status = 'lock';
 // $question->status = 1;
 // $question->created_user_id = Auth::guard('admin')->user()->id;
 // $question->slug = Str::slug($request->question[$key]);

 // $question->save();


 // //question option and answer save
 // $question_option = new QuestionOption();

 // $question_option->question_id = $question->id;

 // if ($request->type == 'written') {
 // $question_option->written_answer = $request->written_answer[$key];
 // } else {
 // $question_option->option_1 = $request->option_1[$key] ?? '';
 // $question_option->option_2 = $request->option_2[$key] ?? '';
 // $question_option->option_3 = $request->option_3[$key] ?? '';
 // $question_option->option_4 = $request->option_4[$key] ?? '';
 // $question_option->option_5 = $request->option_5[$key] ?? '';
 // $question_option->answer = $request->answer[$key];

 // if (isset($chunk_image)) {
 // $question_option->image_option = json_encode($chunk_image[$key]);
 // } else if (isset($Imgdata)) {
 // $question_option->image_option = json_encode($Imgdata);
 // }
 // }

 // $question_option->save();

 // //tag
 // $tag = Tag::create([
 // 'subject_id' => $request->subject,
 // 'question_id' => $question->id,
 // ]);
 // }
 // }

 // Session::flash('success', 'Question created successfully');
 // return redirect()->route('admin.question.index');
 // }