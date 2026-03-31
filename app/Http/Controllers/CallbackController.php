<?php

namespace App\Http\Controllers;

use App\Models\CallbackRequest;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact' => 'required|string|max:255',
            'page_source' => 'required|in:P1,P2',
        ]);

        $ip = $request->ip();
        $anonymizedIp = preg_replace('/\.\d+$/', '.0', $ip);

        CallbackRequest::create([
            ...$validated,
            'ip_address' => $anonymizedIp,
        ]);

        return response()->json(['success' => true]);
    }
}
