<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Annoucement;
use App\Models\News;
use App\Models\Documents;
use App\Models\Event;
use App\Models\Staff;
use App\Models\Walloffame;
use App\Models\Department;
use App\Models\Internalsystem;
use App\Models\IntroText;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $intro_text = IntroText::find(1);
        $announcements = Annoucement::latest()->limit(3)->get();
        $news = News::latest()->limit(3)->get();
        $documents = Documents::latest()->limit(3)->get();
        $events = Event::latest()->limit(3)->get();
        $newest_staff = Staff::latest()->limit(3)->get()->map(function ($staff) {
            return [
                'id' => $staff->id,
                'name' => $staff->name,
                'email' => $staff->email,
                'department' => $staff->departments->name,
                'image' => asset($staff->image)
            ];
        });

        $famous_staff = Walloffame::all();

        $departments = Department::all();

        $internal_systems = Internalsystem::all();

        $user_id = Auth::id();

        $internal_systems = Internalsystem::all();
        $internal_systems = Internalsystem::all();
        $internal_systems = Internalsystem::all();
        return Inertia::render('Welcome/Home', ['announcements' => $announcements, 'news' => $news, 'documents' => $documents, 'events' => $events, 'newest_staff' => $newest_staff, 'famous_staff' => $famous_staff, 'departments' => $departments, 'internal_systems' => $internal_systems, 'user_id' => $user_id, 'intro_text' => $intro_text]);
    }
}
