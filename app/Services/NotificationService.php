<?php   
namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function createNotification($userId, $title, $message, $relatedId = null)
    {
        $notification = Notification::create([
            'user_id' => $userId,
            'related_id' => $relatedId,
            'title' => $title,
            'message' => $message,
            'read' => false,
        ]);

        return $notification;
    }

    public function markAsRead($notificationId)
    {
        $notification = Notification::find($notificationId);

        if ($notification) {
            $notification->read = true;
            $notification->save();
            return $notification;
        }

        return null;
    }

    public function markAllAsRead()
    {
        Notification::where('read', false)->update(['read' => true]);
        return true;
    }

    public function getUnreadNotifications()
    {
        return Notification::where('read', false)->get();
    }

    public function getAllNotifications()
    {
        return Notification::all();
    }
}
