<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Log an action to the activity log.
     */
    public static function logAction($action, $model, $model_id, $description)
    {
        $user = auth()->user();

        ActivityLog::create([
            'user_id'     => $user?->id,
            'action'      => $action,
            'model'       => $model,
            'model_id'    => $model_id ?? null,
            'description' => $description,
            'ip_address'  => request()->ip(),
            'user_agent'  => request()->header('User-Agent'),
            'role'        => $user?->role ?? 'guest',
        ]);
    }

    /**
     * Display a paginated list of activity logs with optional model filtering.
     */
    public function index(Request $request)
    {
        $modelFilter = $request->query('model');

        $logsQuery = ActivityLog::with('user')
            ->when($modelFilter, fn($q) => $q->where('model', $modelFilter))
            ->latest();

        $logs = $logsQuery->paginate(10); // Show only 10 logs per page

        // Group logs by extracted serial number from description
        $groupedLogs = $logs->getCollection()->groupBy(function ($log) {
            if (preg_match('/Serial No:\s*([A-Za-z0-9\-]+)/', $log->description, $matches)) {
                return $matches[1];
            }
            return 'No Serial';
        });

        return view('activity_logs.index', [
            'logs'         => $logs,
            'groupedLogs'  => $groupedLogs,
            'modelFilter'  => $modelFilter,
        ]);
    }
}
