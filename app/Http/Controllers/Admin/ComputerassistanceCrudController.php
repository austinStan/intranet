<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ComputerassistanceRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use App\Models\Department;
use App\Models\Staff;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ComputerassistanceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ComputerassistanceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Computerassistance');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/computerassistance');
        $this->crud->setEntityNameStrings('computerassistance', 'computerassistances');
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }


    protected function setupListOperation()
    {
        CRUD::removeButton('create');
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $title = $this->textCol('title', 'Title');
        $description = $this->textCol('description', 'Description');
        $department = $this->selectOneManyCol('department_id', 'Department', 'departments', 'name', Department::class);
        $staff = $this->selectOneManyCol('staff_id', 'Posted By', 'staff', 'name', Staff::class);

        CRUD::addColumns([$title,$department,$staff,$description]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ComputerassistanceRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //   $this->crud->setFromDb();
        $title = $this->text('title', 'title');
        // $description = $this->textarea('description', "description");

        CRUD::addFields([$title]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'description',
            'type' => 'ckeditor',
        ]);
        $this->crud->addField([
            'label' => 'Select Department',
            'type' => 'select2',
            'name' => 'department_id', // the db column for the foreign key
            'entity' => 'departments', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Department' // foreign key model
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
