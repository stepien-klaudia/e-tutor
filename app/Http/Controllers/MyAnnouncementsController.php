<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use App\Models\AnnouncementLevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MyAnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $query = Announcement::query();
        $query = $query->where('user_id',Auth::user()->id);
        return view('my_announcements\index',
        ['my_announcements'=>$query->paginate(10)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Announcement  $announcement
     * @return View
     */
    public function edit(Announcement $my_announcement):View
    {
        return view('my_announcements\edit',
                    ['my_announcements'=>$my_announcement],['categories'=>AnnouncementCategory::all(),
                    'levels'=>AnnouncementLevel::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Announcement  $announcement
     * @return RedirectResponse
     */
    public function update(Request $request, Announcement $my_announcement):RedirectResponse
    {
        $my_announcement->fill($request->all());
        $my_announcement->user_id = Auth::user()->id;
        $my_announcement->save();
        return redirect(route('my_announcements.index'))->with('status','Ogłoszenie zostało zaktualizowane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Announcement  $announcement
     * @return RedirectResponse
     */
    public function destroy(Announcement $my_announcement):RedirectResponse
    {
            $my_announcement->delete();
            Session::flash('status','Ogłoszenie zostało usunięte');
    }
}
