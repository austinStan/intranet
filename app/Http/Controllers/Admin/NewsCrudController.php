<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use App\Models\Department;
use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\News');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/news');
        $this->crud->setEntityNameStrings('news', 'news');
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
        $date = $this->datetimeCol('created_at', 'Date');
        $department = $this->selectOneManyCol('department_id', 'Department', 'departments', 'name', Department::class);
       

        CRUD::addColumns([$title, $date, $department]);
        CRUD::addColumn([
            'name' => 'description', // The db column name
            'label' => "Description", // Table column heading
            // 'prefix' => "Name: ",
            // 'suffix' => "(user)",
            // 'limit' => 120, // character limit; default is 50;
         ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(NewsRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
        $title = $this->text('title', 'Title');

        CRUD::addFields([$title]);

        $this->crud->addField([
            'label' => 'Select Department',
            'type' => 'select2',
            'name' => 'department_id', // the db column for the foreign key
            'entity' => 'departments', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Department' // foreign key model
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
