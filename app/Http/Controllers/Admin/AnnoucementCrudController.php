<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AnnoucementRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AnnoucementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AnnoucementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Annoucement');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/annoucement');
        $this->crud->setEntityNameStrings('annoucement', 'annoucements');
    }
    
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
       // $this->crud->setFromDb();
       $title = $this->textCol('title', 'Title');
       $description = $this->textCol('description', 'Description');
       $date = $this->datetimeCol('created_at', 'Date');

       CRUD::addColumns([$title,$description,$date]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AnnoucementRequest::class);

        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
       $title = $this->text('title', 'Title');
      // $desc = $this->textarea('description', "Description");

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
}
