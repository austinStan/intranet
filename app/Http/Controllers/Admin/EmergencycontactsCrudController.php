<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmergencycontactsRequest;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmergencycontactsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmergencycontactsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ColsCrudTrait, FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Emergencycontacts');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/emergencycontacts');
        $this->crud->setEntityNameStrings('emergencycontacts', 'emergencycontacts');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();

        $name = $this->textCol('name', 'Name');
        $phonenumber = $this->textCol('phonenumber', 'Phone number');
        $email = $this->textCol('email', 'Email');

        CRUD::addColumns([$name, $phonenumber, $email]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EmergencycontactsRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
        $name = $this->text('name', 'name');
        $phonenumber = $this->text('phonenumber', "phonenumber");
        $email = $this->text('email', "email");

        CRUD::addFields([$name, $phonenumber, $email]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
