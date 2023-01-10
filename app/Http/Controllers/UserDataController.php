<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserDataController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function show(User $user):View
    {
        return view('my_account\show',
        ['my_account'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user):View
    {
        return view('my_account\edit',
                    ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user):RedirectResponse
    {
        $user->fill($request->all());
        $user->save();
        return redirect(route('my_account.show',$user))->with('status','Dane zostały zaktualizowane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return RedirectResponse
     */
    public function destroy(User $user):RedirectResponse
    {
            $user->delete();
            return redirect(route('logout'));
    }
}
