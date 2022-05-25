<?php

//for unique slug

use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;

//get category
function getCategory($category_id)
{
    return Category::where('id', $category_id)->select('id', 'name')->first();
}

//get subcategory
function getSubCategory($sub_category_id)
{
    return SubCategory::where('id', $sub_category_id)->select('id', 'name')->first();
}
//get subject
function getSubject($subject_id)
{
    return Subject::where('id', $subject_id)->select('id', 'name')->first();
}
