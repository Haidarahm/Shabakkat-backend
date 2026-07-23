<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: bots fill hidden "website" field. Pretend success.
        if (filled($request->input('website'))) {
            return response()->json(['ok' => true]);
        }

        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'company' => ['nullable', 'string', 'max:200'],
                'email' => ['required', 'email', 'max:200'],
                'phone' => ['nullable', 'string', 'max:60'],
                'service' => ['nullable', 'string', 'max:200'],
                'message' => ['required', 'string', 'max:5000'],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'ok' => false,
                'error' => $e->validator->errors()->first(),
            ], 422);
        }

        $submission = ContactSubmission::create([
            ...$data,
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]);

        // TODO: dispatch email / CRM notification here.

        return response()->json(['ok' => true, 'id' => $submission->id], 201);
    }
}
