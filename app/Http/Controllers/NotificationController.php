<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function list()
    {
        $user = Auth()->user();

        $notifications = $user->notifications;

        return view('notification.list', compact('notifications'));
    }

    public function mark($id)
    {
        $notifications = Auth()->user()->notifications;

        $notify = $notifications->where('id', $id)->first();

        $notify->markAsRead();

        return redirect()->to('/notification');
    }
}
