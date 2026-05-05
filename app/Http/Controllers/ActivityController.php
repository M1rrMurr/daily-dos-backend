<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return ActivityResource::collection($user->activities()->with('tags')->get());
    }

    public function show(Activity $activity)
    {
        return new ActivityResource($activity->load('tags'));
    }
}
