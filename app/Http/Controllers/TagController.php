<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index(Request $request)
    {

        return  TagResource::collection(Tag::ofFilters(['name' => $request->name,])->get());
    }

    public function show(Request $request)
    {
        return TagResource::make(Tag::findOrFail($request->id));
    }
}
