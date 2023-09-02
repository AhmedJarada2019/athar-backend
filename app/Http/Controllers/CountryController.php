<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::query()->get();

        return CountryResource::collection($countries);
    }
}
