<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Psy\Util\Str;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stories = Story::onlyTrashed()
            ->with('user')
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('admin.stories.index', ['stories' => $stories ]);
    }

    public function restore($id)
    {
        $story = Story::withTrashed()->findOrFail($id);
        $story->restore();
        return redirect()->route('admin.stories.index')->with('status', 'Story Restored Successfully !');

    }

    public function delete($id)
    {
        $story = Story::withTrashed()->findOrFail($id);

        $story->forceDelete();
        return redirect()->route('admin.stories.index')->with('status', 'Story Deleeted Successfully !');

    }

    public function stats()
    {
        $stories = Story::active()->whereCreatedThisMonth()->with('user')->paginate(9);
        return view('admin.stories.stats', [
            'stories' => $stories
        ]);
    }
}
