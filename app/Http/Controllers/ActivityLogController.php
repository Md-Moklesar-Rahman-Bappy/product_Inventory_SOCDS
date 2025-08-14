<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /**
     * Log any user action with metadata.
     */
    public static function logAction($action, $model, $model_id, $description)
    {
        $user = auth()->user();

        ActivityLog::create([
            'user_id'     => $user->id ?? null,
            'action'      => $action,
            'model'       => $model,
            'model_id'    => $model_id,
            'description' => $description,
            'ip_address'  => Request::ip(),
            'user_agent'  => Request::header('User-Agent'),
            'role'        => $user->role ?? 'guest',
        ]);
    }

    /**
     * Show grouped activity logs by serial number.
     */
    public function index()
    {
        $logs = ActivityLog::with('user')
            ->latest()
            ->get()
            ->groupBy(function ($log) {
                preg_match('/Serial No:\s*(\w+)/', $log->description, $matches);
                return $matches[1] ?? 'Unknown';
            });

        return view('activity_logs.index', compact('logs'));
    }
}
