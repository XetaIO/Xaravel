<?php
namespace Xetaravel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Xetaravel\Models\User;

class NotificationController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs->addCrumb('Notifications', route('users.notification.index'));
    }

    /**
     * Show the notifications.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $user = User::find(Auth::id());

        $this->breadcrumbs->setCssClasses('breadcrumb');

        $notifications = $user->notifications()
            ->paginate(config('xetaravel.pagination.notification.notification_per_page'));
        $hasUnreadNotifications = $user->unreadNotifications->isNotEmpty();

        return view(
            'notification.index',
            [
                'user' => $user,
                'breadcrumbs' => $this->breadcrumbs,
                'notifications' => $notifications,
                'hasUnreadNotifications' => $hasUnreadNotifications
            ]
        );
    }

    /**
     * Delete a notification by its id.
     *
     * @param \Illuminate\Http\Request $request The current request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $user = Auth::user();
        $notification = $user->notifications()
            ->where('id', $request->input('id'))
            ->first();

        if ($notification) {
            $notification->delete();
        }

        return response()->json([
            'error' => false
        ]);
    }

    /**
     * Mark a notification as read.
     *
     * @param \Illuminate\Http\Request $request The current request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead(Request $request): JsonResponse
    {
        $user = Auth::user();
        $notification = $user->notifications()
            ->where('id', $request->input('id'))
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'error' => false
        ]);
    }

    /**
     * Mark all notifications as read.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAllAsRead(): JsonResponse
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return response()->json([
            'error' => false
        ]);
    }
}
