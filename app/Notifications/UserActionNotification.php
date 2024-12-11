<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class UserActionNotification extends Notification
{
    // public function createNotification($userId, $relatedId = null, $title = null, $message = null)
    // {
    //     Notification::create([
    //         'user_id' => $userId,
    //         'related_id' => $relatedId,
    //         'title' => $title,
    //         'message' => $message,
    //         'read_at' => false, // Default to unread
    //     ]);

    //     return response()->json(['success' => true, 'message' => 'Notification created successfully.']);
    // }
}
