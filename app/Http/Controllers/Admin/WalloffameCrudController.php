<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Staff;
use App\Http\Requests\WalloffameRequest;
use App\Models\Walloffame;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


/**
 * Class WalloffameCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WalloffameCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Walloffame');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/walloffame');
        $this->crud->setEntityNameStrings('walloffame', 'walloffames');
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        //  $name = $this->textCol('name', 'Best Employee');

        $name = $this->selectOneManyCol('staff_id', 'Best Employee', 'staffs', 'name', Staff::class);
        $duration = $this->textCol('duration', 'Period');
        $department = $this->selectOneManyCol('department_id', 'Department', 'departments', 'name', Department::class);

        CRUD::addColumns([$name, $department,$duration]);
    //    $staff_exist= Walloffame::findOrFail()->get();
    //    print_r($staff_exist);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(WalloffameRequest::class);

    // TODO: remove setFromDb() and manually define Fields
        //   $this->crud->setFromDb();
        $this->crud->addField([
            'label' => 'Select Employee',
            'type' => 'select2',
            'name' => 'staff_id', // the db column for the foreign key
            'entity' => 'staffs', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Staff' // foreign key model
        ]);
        //$profile_pic = $this->browse('image', 'Upload photo');
        //   $name = $this->text('name', 'Best Employee');
        // CRUD::addFields([$profile_pic]);
        $this->crud->addField([
            'name' => 'Duration',
            'label' => 'Period:*',
            'type' => 'enum'
        ], 'both');

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
