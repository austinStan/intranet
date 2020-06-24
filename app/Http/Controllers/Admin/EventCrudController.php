<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Event');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/event');
        $this->crud->setEntityNameStrings('event', 'events');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //    $this->crud->setFromDb();
        $title = $this->textCol('title', 'Title');
        $venue = $this->textCol('venue', 'Venue');
        $image = $this->imageCol('image', 'Event Theme Image');
        $description = $this->textCol('description', 'Description');
        $start_date = $this->datetimeCol('start_date', 'Start Date');
        $end_date = $this->datetimeCol('end_date', 'End Date');

        CRUD::addColumns([$title, $venue, $image, $description, $start_date, $end_date]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EventRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //  $this->crud->setFromDb();
        $title = $this->text('title', 'Title of the event');
        $venue = $this->textCol('venue', 'Venue of the event');

        $image = $this->browse('image', 'Event Theme Image');

        // $date = $this->dateTimePicker('datetime', 'Select Date and Time');
        // $desc = $this->textarea('description', "Description");

        CRUD::addFields([$title, $venue, $image]);

        $this->crud->addField([   // date_range
            'name' => ['start_date', 'end_date'], // db columns for start_date & end_date
            'label' => 'Event Date Range',
            'type' => 'date_range',
            'default' => ['2019-03-28 01:01', '2019-04-05 02:00'], // default values for start_date & end_date
            'date_range_options' => [
                'timePicker' => true,
                'locale' => ['format' => 'DD/MM/YYYY HH:mm']
            ]
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => 'description',
            'type' => 'ckeditor',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
