<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use App\Http\Requests\StaffRequest;
use App\Models\Department;
use App\Models\Staff;
use App\Notifications\NewStaff;
use Illuminate\Support\Facades\Redirect;
use Prologue\Alerts\Facades\Alert;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Crypt;


/**
 * Class StaffCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StaffCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Staff');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/staff');
        $this->crud->setEntityNameStrings('staff', 'staff');
      
    }
    /* Whoa genuis */
    protected function setupShowOperation()
    {
        $this->setupListOperation();

   
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
    
        $name = $this->textCol('name', 'Name');
        $email = $this->emailCol('email', 'Email');
        $profile_pic = $this->imageCol('image', 'photo');
        $department = $this->selectOneManyCol('department_id', 'Department', 'departments', 'name', Department::class);

        CRUD::addColumns([$name, $email,$profile_pic,$department]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StaffRequest::class);
        
        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
        $name = $this->text('name', 'Name');
        $email = $this->text('email', 'Email');
        $profile_pic = $this->browse('image', 'Upload Profile Pic');
        CRUD::addFields([$name, $email,$profile_pic]);
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
    public function store(StaffRequest $request)
    {
        // your additional operations before save here
            // Add you send mail code here
            $this->crud->setValidation(StaffRequest::class);
            $redirect_location = $this->traitStore();
          
            if($request->save_action ='save_and_back'){
            $user = Staff::latest('created_at')->first();
           
            $name = isset($user)? $user->name : 'no name found';
            $email = isset($user)? $user->email : 'no email found';
            $password = isset($user)? Crypt::decrypt($user->encypted_password) : 'no name found';
            $staff = [
                'name' =>$name,
                'email' =>$email,
                'password' => $password,
            ];

            isset($user)? $user->notify(new NewStaff($staff)):'';
            Alert::warning('A mail notification was successfully sent')->flash();
            return $redirect_location;
            return Redirect::to('admin/staff');       
        }else{
        }
    }
}
