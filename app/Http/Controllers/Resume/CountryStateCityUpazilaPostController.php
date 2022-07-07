<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use App\Models\BdPostCode;
use App\Models\BdUpazila;
use App\Models\City;
use App\Models\IndustrialJobCategory;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityUpazilaPostController extends Controller
{
    public function stateData($country_id)
    {
        $state = State::where('country_id', $country_id)->select('id', 'name')->get();

        return response()->json($state);
    }

    public function cityData($state_id)
    {
        $city = City::where('state_id', $state_id)->select('id', 'name')->get();

        return response()->json($city);
    }

    public function upazilaData($city_id)
    {
        $upazila = BdUpazila::where('city_id', $city_id)->select('id', 'name')->get();

        return response()->json($upazila);
    }
    public function postData($upazila_id)
    {
        $post = BdPostCode::where('bd_upazila_id', $upazila_id)->select('id', 'post_office')->get();

        return response()->json($post);
    }

    //search data
    public function getMatchCityData(Request $request)
    {
        if ($request->ajax()) {

            $data = City::where('name', 'LIKE', $request->data . '%')
                ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item city cursor-pointer">' . $row->name . '</li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }

    //resume.searchorgazation
    public function getMatchOrganizationData(Request $request)
    {
        if ($request->ajax()) {

            $data = IndustrialJobCategory::where('name', 'LIKE', $request->data . '%')
            ->get();

            $output = '';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item organization cursor-pointer">' . $row->name . '</li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
