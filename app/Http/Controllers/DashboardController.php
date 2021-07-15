<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DB::enableQueryLog();
        $query = Story::where('status', 1);
        $type = request()->input('type');
        if (in_array($type, ['short', 'long'])) {
            $query->where('type', $type);
        }
        $stories = $query->with('user')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('dashboard.index', ['stories' => $stories ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $activeStory)
    {
        //
        return view('dashboard.show', ['story' => $activeStory ]);
    }

}