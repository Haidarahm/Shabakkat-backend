<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Certification;
use App\Models\FeaturedProject;
use App\Models\Industry;
use App\Models\Office;
use App\Models\Opening;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Support\MediaUrl;

class ContentController extends Controller
{
    public function projects()
    {
        $projects = Project::orderBy('sort_order')->get()->map(fn ($p) => $this->mapProject($p));

        return response()->json($projects);
    }

    public function project(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return response()->json($this->mapProject($project));
    }

    public function featuredProjects()
    {
        $items = FeaturedProject::orderBy('sort_order')->get()->map(fn ($p) => [
            'photoLabel' => $p->photo_label,
            'photoSrc' => MediaUrl::public($p->photo_src),
            'title' => $p->title,
            'description' => $p->description,
            'href' => $p->href,
        ]);

        return response()->json($items);
    }

    public function serviceCategories()
    {
        $categories = ServiceCategory::orderBy('sort_order')->get()->map(fn ($c) => [
            'id' => $c->slug,
            'index' => $c->index_label,
            'title' => $c->title,
            'description' => $c->description,
        ]);

        return response()->json($categories);
    }

    public function services()
    {
        $services = Service::orderBy('sort_order')->get()->map(fn ($s) => $this->mapService($s));

        return response()->json($services);
    }

    public function industries()
    {
        $industries = Industry::orderBy('sort_order')->get()->map(fn ($i) => $this->mapIndustry($i));

        return response()->json($industries);
    }

    public function industry(string $slug)
    {
        $industry = Industry::where('slug', $slug)->firstOrFail();

        return response()->json($this->mapIndustry($industry));
    }

    public function partners()
    {
        $partners = Partner::orderBy('sort_order')->get()->map(fn ($p) => [
            'name' => $p->name,
            'logoSrc' => MediaUrl::public($p->logo_src),
        ]);

        return response()->json($partners);
    }

    public function certifications()
    {
        $certifications = Certification::orderBy('sort_order')->get()->map(fn ($c) => [
            'code' => $c->code,
            'title' => $c->title,
            'logoSrc' => MediaUrl::public($c->logo_src),
        ]);

        return response()->json($certifications);
    }

    public function offices()
    {
        $offices = Office::orderBy('sort_order')->get()->map(fn ($o) => [
            'name' => $o->name,
            'role' => $o->role,
            'color' => $o->color,
            'address' => $o->address,
            'phone' => $o->phone,
            'photoSrc' => MediaUrl::public($o->photo_src),
            'isHeadquarters' => $o->is_headquarters,
            'mapPoint' => ($o->map_cx !== null && $o->map_cy !== null)
                ? ['cx' => $o->map_cx, 'cy' => $o->map_cy]
                : null,
        ]);

        return response()->json($offices);
    }

    public function stats()
    {
        $stats = Stat::orderBy('sort_order')->get()->map(fn ($s) => array_filter([
            'value' => $s->value,
            'suffix' => $s->suffix,
            'label' => $s->label,
        ], fn ($v) => $v !== null));

        return response()->json($stats->values());
    }

    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get()->map(fn ($t) => [
            'quote' => $t->quote,
            'author' => $t->author,
            'role' => $t->role,
            'color' => $t->color,
        ]);

        return response()->json($testimonials);
    }

    public function awards()
    {
        $awards = Award::orderBy('sort_order')->get()->map(fn ($a) => array_filter([
            'year' => $a->year,
            'label' => $a->label,
        ], fn ($v) => $v !== null));

        return response()->json($awards->values());
    }

    public function openings()
    {
        $openings = Opening::currentlyOpen()->orderBy('sort_order')->get()->map(fn ($o) => [
            'id' => $o->id,
            'title' => $o->title,
            'department' => $o->department,
            'location' => $o->location,
            'type' => $o->type,
            'closesAt' => $o->closes_at?->toIso8601String(),
        ]);

        return response()->json($openings);
    }

    private function mapProject(Project $p): array
    {
        return array_filter([
            'slug' => $p->slug,
            'client' => $p->client,
            'country' => $p->country,
            'year' => $p->year,
            'tag' => $p->tag,
            'color' => $p->color,
            'title' => $p->title,
            'challenge' => $p->challenge,
            'scope' => $p->scope,
            'scale' => $p->scale,
            'results' => $p->results,
            'photoLabel' => $p->photo_label,
            'photoSrc' => MediaUrl::public($p->photo_src),
            'relatedServiceHref' => $p->related_service_href,
        ], fn ($v) => $v !== null);
    }

    private function mapService(Service $s): array
    {
        return array_filter([
            'id' => $s->slug,
            'category' => $s->category_slug,
            'index' => $s->index_label,
            'eyebrow' => $s->eyebrow,
            'title' => $s->title,
            'description' => $s->description,
            'capabilities' => $s->capabilities,
            'photoLabel' => $s->photo_label,
            'photoSrc' => MediaUrl::public($s->photo_src),
            'imageSide' => $s->image_side,
        ], fn ($v) => $v !== null);
    }

    private function mapIndustry(Industry $i): array
    {
        return array_filter([
            'slug' => $i->slug,
            'title' => $i->title,
            'tagline' => $i->tagline,
            'color' => $i->color,
            'summary' => $i->summary,
            'notableNames' => $i->notable_names,
            'focusAreas' => $i->focus_areas,
            'relevantServices' => $i->relevant_services,
            'relatedProjectHref' => $i->related_project_href,
        ], fn ($v) => $v !== null);
    }
}
