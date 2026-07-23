<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OpeningApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: bots fill hidden "website" field. Pretend success.
        if (filled($request->input('website'))) {
            return response()->json(['ok' => true]);
        }

        try {
            $data = $request->validate([
                'opening_id' => ['nullable', 'integer', 'exists:openings,id'],
                'name' => ['required', 'string', 'max:200'],
                'email' => ['required', 'email', 'max:200'],
                'phone' => ['nullable', 'string', 'max:60'],
                'linkedin' => ['nullable', 'string', 'max:500'],
                'portfolio' => ['nullable', 'string', 'max:500'],
                'cover_letter' => ['nullable', 'string', 'max:5000'],
                'cv' => [
                    'required',
                    'file',
                    'mimes:pdf,doc,docx',
                    'max:5120', // 5 MB
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'ok' => false,
                'error' => $e->validator->errors()->first(),
            ], 422);
        }

        $opening = null;
        if (! empty($data['opening_id'])) {
            $opening = Opening::currentlyOpen()
                ->where('id', $data['opening_id'])
                ->first();

            if (! $opening) {
                return response()->json([
                    'ok' => false,
                    'error' => 'This job opening is no longer available.',
                ], 422);
            }
        }

        $cv = $request->file('cv');
        $cvPath = $cv->store('cvs', 'local');

        $application = JobApplication::create([
            'opening_id' => $opening?->id,
            'opening_title' => $opening?->title,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'linkedin' => $data['linkedin'] ?? null,
            'portfolio' => $data['portfolio'] ?? null,
            'cover_letter' => $data['cover_letter'] ?? null,
            'cv_path' => $cvPath,
            'cv_original_name' => $cv->getClientOriginalName(),
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]);

        // TODO: dispatch email / HR notification here.

        return response()->json(['ok' => true, 'id' => $application->id], 201);
    }
}
