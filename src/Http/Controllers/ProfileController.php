<?php

namespace Nanuc\ReadySetGo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('rsg::profile.profile');
    }

    public function saveAvatar(Request $request)
    {
        auth()
            ->user()
            ->addMediaFromDisk($request->key, 's3')
            ->setName('avatar.png')
            ->setFileName('avatar.png')
            ->toMediaCollection('avatar', 's3');
    }

    public function deleteAvatar()
    {
        auth()->user()->getFirstMedia('avatar')->delete();
    }
}
