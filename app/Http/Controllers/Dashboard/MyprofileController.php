<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class MyprofileController extends Controller
{
    public function index(){
        return view('myprofile');
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect(route('myprofile'))->with('status', 'profile-updated');
    }
}


