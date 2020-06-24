<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Annoucement;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    
    public function index()
    {
        $announcements = Annoucement::latest()->get()->map(function ($announcement) {
            return [
                'id' => $announcement->id,
                'title' => $announcement->title,
                'description' => $announcement->description,
                'created_at' => $announcement->created_at
            ];
        });

        return Inertia::render('Announcements/Announcements', ['announcements' => $announcements]);
    }

    // Get a Single Announcement
    public function show($id)
    {
        $announcement = Annoucement::find($id);

        return Inertia::render('AnnouncementDetails/AnnouncementDetails', ['announcement' => $announcement]);
    }
}
