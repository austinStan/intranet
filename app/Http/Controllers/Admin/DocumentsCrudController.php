<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use App\Http\Requests\DocumentsRequest;
use App\Models\Department;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DocumentsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DocumentsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Documents');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/documents');
        $this->crud->setEntityNameStrings('documents', 'documents');
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }


    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $name = $this->textCol('name', ' Name');
      //  $profile_pic = $this->imageCol('image', 'Document');
        $this->crud->addColumn( [
            'name' => 'image', // The db column name
            'label' => "image", // Table column heading
            'type' => 'image',
             // 'prefix' => 'folder/subfolder/',
             // image from a different disk (like s3 bucket)
             // 'disk' => 'disk-name', 
             // optional width/height if 25px is not ok with you
             // 'height' => '30px',
             // 'width' => '30px',
         ]);
        $description = $this->textCol('description', 'Description');
        $department = $this->selectOneManyCol('department_id', 'Department', 'departments', 'name', Department::class);

        CRUD::addColumns([$name, $department,$description]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DocumentsRequest::class);
        $name = $this->text('name', ' Name');
        $profile_pic = $this->browse('image', 'Upload Document');
        CRUD::addFields([$name, $profile_pic]);
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
