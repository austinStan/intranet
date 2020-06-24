<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LinkRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LinkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LinkCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Link');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/link');
        $this->crud->setEntityNameStrings('link', 'links');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $title = $this->textCol('title', 'Title');
        $link = $this->textCol('link', 'Link');
        $description = $this->textCol('description', 'Description');

        CRUD::addColumns([$title, $link ,$description]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LinkRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
        $title = $this->text('title', 'Title of the link');
        //$desc = $this->ckeditor('description', "Description");
        $link = $this->text('link', 'Link');

        CRUD::addFields([$title, $link]);
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
