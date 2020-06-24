<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IncidentreportingRequest;
use App\Models\Staff;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class IncidentreportingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class IncidentreportingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Incidentreporting');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/incidentreporting');
        $this->crud->setEntityNameStrings('incidentreporting', 'incidentreportings');
    }

    protected function setupListOperation()
    {
        CRUD::removeButton('create');
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $title = $this->textCol('title', 'Title');
        $description = $this->textCol('description', 'Description');
        $user = $this->selectOneManyCol('staff_id', 'Sent By', 'staff', 'name', Staff::class);
        
    
        CRUD::addColumns([$title,$description,$user]);
    }

    protected function setupCreateOperation()
    {
       
        $this->crud->setValidation(IncidentreportingRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $title = $this->text('title', 'title');
       // $description = $this->textarea('description', "description");
  
        CRUD::addFields([$title]);
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
    public function store(IncidentreportingRequest $request)
    {
     $this->crud->setValidation(IncidentreportingRequest::class);
     dd($this->traitStore());

    }
}
