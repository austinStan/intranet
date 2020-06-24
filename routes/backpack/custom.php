<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
  
    Route::crud('link', 'LinkCrudController');
    Route::crud('department', 'DepartmentCrudController');
    Route::crud('staff', 'StaffCrudController');
    Route::crud('documents', 'DocumentsCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('annoucement', 'AnnoucementCrudController');
    Route::crud('event', 'EventCrudController');
    Route::crud('internalsystem', 'InternalsystemCrudController');
    Route::crud('emergencycontacts', 'EmergencycontactsCrudController');
    Route::crud('incidentreporting', 'IncidentreportingCrudController');
    Route::crud('computerassistance', 'ComputerassistanceCrudController');
    Route::crud('walloffame', 'WalloffameCrudController');
    Route::crud('profile', 'ProfileCrudController');
    // Route::crud('userprofile', 'UserProfileCrudController');
    // Route::crud('employmentcategory', 'EmploymentCategoryCrudController');
    // Route::crud('employmentcategory', 'EmploymentCategoryCrudController');
    // Route::crud('introtext', 'IntroTextCrudController');
    Route::crud('admin', 'AdminCrudController');
}); // this should be the absolute last line of this file