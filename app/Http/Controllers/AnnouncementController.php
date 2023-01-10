<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use App\Models\AnnouncementLevel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('anouncements\index',
                    ['anouncements'=>Announcement::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('anouncements\create',
        ['categories'=>AnnouncementCategory::all(),
    'levels'=>AnnouncementLevel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $announcement = new Announcement($request->all());
        $announcement -> save();
        return redirect(route('announcement_index'))->with('status', 'Ogłoszenie zostało zapisane');
    }

    /**
     * Display the specified resource.
     *
     * @param  Announcement  $announcement
     * @return View
     */
    public function show(Announcement $announcement):View
    {
        return view('anouncements\show',
        ['anouncements'=>$announcement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Announcement  $announcement
     * @return View
     */
    public function edit(Announcement $announcement):View
    {
        return view('anouncements\edit',
                    ['anouncements'=>$announcement],['categories'=>AnnouncementCategory::all(),
                    'levels'=>AnnouncementLevel::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Announcement  $announcement
     * @return RedirectResponse
     */
    public function update(Request $request, Announcement $announcement):RedirectResponse
    {
        $announcement->fill($request->all());
        $announcement->save();
        return redirect(route('announcement_index'))->with('status','Ogłoszenie zostało zaktualizowane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Announcement  $announcement
     * @return RedirectResponse
     */
    public function destroy(Announcement $announcement):RedirectResponse
    {
            $announcement->delete();
            Session::flash('status','Ogłoszenie zostało usunięte');
    }
}
