<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

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
        return view('anouncements\create');
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
        return redirect(route('announcement_index'));
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
                    ['anouncements'=>$announcement]);
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
        return redirect(route('announcement_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
    }
}
