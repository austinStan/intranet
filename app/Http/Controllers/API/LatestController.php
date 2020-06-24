<?php

namespace App\Http\Controllers\API;

use App\Models\Annoucement;
use App\Models\Documents;
use App\Models\Event;
use App\Models\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;

class LatestController extends Controller
{
    //
    public function index()
    {
        try {
            $latest_announcements = Annoucement::latest()->limit(3)->get();
            $latest_documents = Documents::latest()->limit(3)->get();
            $latest_events = Event::latest()->limit(3)->get();
            $latest_news = News::latest()->limit(3)->get();

            return \Response::json([
                'latest_announcements' => $latest_announcements,
                'latest_documents' => $latest_documents,
                'latest_events' => $latest_events,
                'latest_news' => $latest_news
            ]);
        } catch (\Exception $e) {
            return \Response::json(['error' => $e->getMessage()]);
        }
    }
}
