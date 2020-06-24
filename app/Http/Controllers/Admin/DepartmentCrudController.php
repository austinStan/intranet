<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use App\Http\Requests\DepartmentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DepartmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DepartmentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Department');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/department');
        $this->crud->setEntityNameStrings('department', 'departments');
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
      // $this->crud->setFromDb();
      $name = $this->textCol('name', 'Department');
      CRUD::addColumns([$name]);
    CRUD::addColumn([
        'name' => 'description', // The db column name
        'label' => "Description", // Table column heading
        // 'prefix' => "Name: ",
        // 'suffix' => "(user)",
        'limit' => 120, // character limit; default is 50;
     ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DepartmentRequest::class);
        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
       $name = $this->text('name', 'Name');
       CRUD::addFields([$name]);
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
