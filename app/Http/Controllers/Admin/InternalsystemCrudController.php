<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InternalsystemRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InternalsystemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InternalsystemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Internalsystem');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/internalsystem');
        $this->crud->setEntityNameStrings('internalsystem', 'internalsystems');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //    $this->crud->setFromDb();
        $name = $this->textCol('name', 'Name');
        $link = $this->textCol('link', 'Link');
    
        CRUD::addColumns([$name,$link]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InternalsystemRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
            // TODO: remove setFromDb() and manually define Fields
      //  $this->crud->setFromDb();
      $name= $this->text('name', 'Name');
      $link = $this->text('link', "Link");

      CRUD::addFields([$name,$link]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
