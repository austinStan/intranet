<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Notifications\NewAdmin;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Prologue\Alerts\Facades\Alert;

/**
 * Class AdminCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdminCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Admin');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/admin');
        $this->crud->setEntityNameStrings('admin', 'admins');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
       // $this->crud->setFromDb();
       $name = $this->textCol('name', ' Name');
       $email = $this->emailCol('email', 'Email');
       CRUD::addColumns([$name, $email]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AdminRequest::class);

        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
       $name = $this->text('name', 'Name');
       $email = $this->text('email', ' Email');
       CRUD::addFields([$name, $email]);
        $this->crud->addField([   // Password
           'name' => 'password',
           'label' => 'Password',
           'type' => 'password',
           'attributes' => [
               'placeholder' => 'Password Randomly Generated',
               'class' => 'form-control',
               'readonly'=>'readonly',
             ],
       ]);
    }
    public function store(AdminRequest $request)
    {
            $this->crud->setValidation(AdminRequest::class);
            $redirect_location = $this->traitStore();
          
            if($request->save_action ='save_and_back'){
            $user = Admin::latest('created_at')->first();
           
            $name = isset($user)? $user->name : 'no name found';
            $email = isset($user)? $user->email : 'no email found';
            $password = isset($user)? Crypt::decrypt($user->encryptedpassword) : 'no name found';
            $staff = [
                'name' =>$name,
                'email' =>$email,
                'password' => $password,
            ];

            isset($user)? $user->notify(new NewAdmin($staff)):'';
            Alert::warning('A mail notification was successfully sent')->flash();
            return $redirect_location;
            return Redirect::to('admin/admin');       
        }else{
        }
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
