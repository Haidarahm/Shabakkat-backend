<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $highlights = Faq::where('is_highlight', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($f) => ['question' => $f->question, 'answer' => $f->answer]);

        $categories = Faq::where('is_highlight', false)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category')
            ->map(fn ($items, $title) => [
                'title' => $title,
                'items' => $items->map(fn ($f) => [
                    'question' => $f->question,
                    'answer' => $f->answer,
                ])->values(),
            ])
            ->values();

        return response()->json([
            'highlights' => $highlights,
            'categories' => $categories,
        ]);
    }
}
