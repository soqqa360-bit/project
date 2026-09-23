<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        $notifications = auth()->user()->notifications()->latest()->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function markAsRead(string $id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->route('notifications.index')->with('success', 'Xabar O\'qildi');
    }

    public function markAllAsRead() {
        auth()->user()->unreadNotifications()->markAsRead();
        return redirect()->route('notifications.index')->with('sucess', 'Barcha Xabarlar O\'qildi');
    }
}
