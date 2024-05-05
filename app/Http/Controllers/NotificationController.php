<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Notifications\DemandeNotification;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        auth()->user()->notifications()->find($id)->markAsRead();
        return redirect()->back();
    }
}
