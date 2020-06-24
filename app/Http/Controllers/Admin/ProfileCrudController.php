<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProfileRequest as UpdateRequest;
use App\Http\Requests\StoreProfileRequest as StoreRequest;
use App\Models\Department;
use App\Models\Staff;
use App\Traits\ColsCrudTrait;
use App\Traits\FieldsCrudTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProfileCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProfileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use ColsCrudTrait,FieldsCrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\Profile');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/profile');
        $this->crud->setEntityNameStrings('profile', 'profiles');
    }
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
  
    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
       // $this->crud->setFromDb();
      $name = $this->selectOneManyCol('staff_id', 'Staff Name', 'staffs', 'name', Staff::class);
      $email= $this->emailCol('email','Email');
      $date =$this->textCol('employeedate','Date of Birth');
      $nationality =$this->textCol('nationality','Nationality');
      $jobposition =$this->textCol('jobposition','Job Position');
      $cv = $this->imageCol('cv', 'CV');
      $academicdocument = $this->imageCol('academicdocument', 'Academic Document');
      $signature = $this->imageCol('signature', 'Signature');
      $dept = $this->selectOneManyCol('department_id', 'Department Name', 'departments', 'name', Department::class);
    
     
      CRUD::addColumns([$name,$date,$nationality,$email,$dept,$jobposition,$signature,$academicdocument,$cv]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setCreateContentClass('col-md-12 bold-labels'); /*perfect */
        $this->crud->setValidation(StoreRequest::class);
         
        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        // $email =$this->email('email','Enter Your Email');
        // $profile_pic = $this->browse('image', 'Upload photo');
        // CRUD::addFields([$email,$profile_pic]);
        $this->crud->addField([
            'label' => 'Select Employee FullName',
            'type' => 'select2',
            'name' => 'staff_id', // the db column for the foreign key
            'entity' => 'staffs', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Staff',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ] // foreign key model
        ]);

        $this->crud->addField([   // date_picker
            'name' => 'employeedate',
            'type' => 'date_picker',
            'label' => 'Employee Date of Birth',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            // optional:
            'date_picker_options' => [
               'todayBtn' => true,
               'format' => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ]);
    
         $this->crud->addField([   // date_picker
            'name' => 'nationality',
            'label' => "Nationality",
            'type' => 'text',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // Address
            'name' => 'city',
            'label' => "City",
            'type' => 'text',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([   // date_picker
            'name' => 'phonenumber',
            'label' => "Telephone Number",
            'type' => 'text',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
        $this->crud->addField([   // select2_from_array
            'name' => 'maritalstatus',
            'label' => "Marital Status",
            'type' => 'select2_from_array',
            'tab' => 'Personal Information',
            'attributes'=>['id'=>'maritalstatus'],
            'options' => [ '0'=>'Select Marital Status','single' => 'Single',  'married' => 'Married'],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
           
            'allows_null' => false,
          //  'default' => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([   // date_picker
            'name' => 'spousename',
            'label' => "spouse Name",
            'type' => 'text',
            'tab' => 'Personal Information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
                'id'=> 'spouse',
            ],
         ]);
        //Children Section
        $this->crud->addField([   // date_picker
            'name' => 'childname',
            'label' => "Child's Name",
            'type' => 'text',
            'tab' => 'children information',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'childdate',
            'type' => 'date_picker',
            'label' => ' Date of Birth',
            'tab' => 'children information',
            'attributes'=>['id'=>'childdate'],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',

            ],
            // optional:
            'date_picker_options' => [
               'todayBtn' => true,
               'format' => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ]);

         //Current Physical Address
         $this->crud->addField([   // date_picker
            'name' => 'town',
            'label' => "Town",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'street',
            'label' => "Street",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'zone',
            'label' => "Zone",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'landmarks',
            'label' => "Landmarks",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'homedistrict',
            'label' => " Home District",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'hometown',
            'label' => " Home Town",
            'type' => 'text',
            'tab' => 'Physical Address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
    ////Employement Details
    $this->crud->addField([
        'label' => 'Select Department',
        'type' => 'select2',
        'name' => 'department_id', // the db column for the foreign key
        'entity' => 'departments', // the method that defines the relationship in your Model
        'tab' => 'Employement Details',
        'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Department', // foreign key model
    // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->addField([   // date_picker
            'name' => 'startdate',
            'type' => 'date_picker',
            'label' => 'Start Date',
            'tab' => 'Employement Details',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            // optional:
            'date_picker_options' => [
               'todayBtn' => true,
               'format' => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ]);
         $this->crud->addField([   // date_picker
            'name' => 'salary',
            'label' => "Commencement Salary",
            'type' => 'text',
            'tab' => 'Employement Details',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
              ]
         ]);
         $this->crud->addField([   // radio
            'name'        => 'jobstatus', // the name of the db column
            'label'       => 'Nature of Employement', // the input label
            'type'        => 'radio',
            'tab' => 'Employement Details',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            'options'     => [
                // the key will be stored in the db, the value will be shown as label; 
                'full time'=> "Full Time ",
                'part time'=> "Part Time",
                'casual' => "Casual",
                'consultant' =>  "Consultant"
            ],
            // optional
            'inline'      => true, // show the radios all on the same line?
        ]);
        $this->crud->addField(
            [   // select2_from_array
                
                'name' => 'cv',
                'label' => 'Upload CV',
                'type' => 'browse',
                
                
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Employement Details',
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
            ]
        );
        $this->crud->addField([   // Text
            'name' => 'jobposition',
            'label' => "Job Position",
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Employement Details',
            ]);
  

   //Emergency Contacts
            $this->crud->addField([   // date_picker
                'name' => 'contactname',
                'label' => "Name",
                'type' => 'text',
                'tab' => 'Emergency Contacts',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
            $this->crud->addField([   // date_picker
                'name' => 'relationshiptype',
                'label' => "Relationship To Employee",
                'type' => 'text',
                'tab' => 'Emergency Contacts',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
            $this->crud->addField([   // date_picker
                'name' => 'phoneno',
                'label' => "Telephone Number",
                'type' => 'text',
                'tab' => 'Emergency Contacts',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                  ]
             ]);
             $this->crud->addField([   // Email
                'name' => 'email',
                'label' => 'Email Address',
                'type' => 'email',
                'tab' => 'Emergency Contacts',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                  ]
            ]);
            //Academic Qualifications
            $this->crud->addField([
                 // CustomHTML
                    'name' => 'separator',
                    'type' => 'custom_html',
                    'value' => 'Select Qualifications:',
                    'tab' => 'Academic Qualifications',
                
            ]);
            $this->crud->addField([   // Email
              // Checkbox
              'name' => 'masters',
              'label' => 'Masters',
              'type' => 'checkbox',
              'tab' => 'Academic Qualifications',
              'wrapperAttributes' => [
                    'class' => 'form-group mx-2 pl-2'
                  ]
            ]);
            $this->crud->addField([   // Email
                // Checkbox
                'name' => 'bachelors',
                'label' => 'Bachelors',
                'type' => 'checkbox',
                'tab' => 'Academic Qualifications',
                'wrapperAttributes' => [
                      'class' => 'form-group mx-2'
                    ]
              ]);
              $this->crud->addField([   // Email
                // Checkbox
                'name' => 'diploma',
                'label' => 'Diploma',
                'type' => 'checkbox',
                'tab' => 'Academic Qualifications',
                'wrapperAttributes' => [
                      'class' => 'form-group'
                    ]
              ]);
              $this->crud->addField([   // Email
                // Checkbox
                'name' => 'certificate',
                'label' => 'certificate',
                'type' => 'checkbox',
                'tab' => 'Academic Qualifications',
                'wrapperAttributes' => [
                      'class' => 'form-group col-md-8'
                    ]
              ]);
            $this->crud->addField(
                [   // select2_from_array
                    
                    'name' => 'academicdocument',
                    'label' => 'Upload Academic Documents',
                    'type' => 'browse',
                    
                    
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6'
                    ],
                    'tab' => 'Academic Qualifications',
                    // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
                ]
            );

              ///Payroll

              $this->crud->addField([   // date_picker
                'name' => 'bankname',
                'label' => "Bank Name",
                'type' => 'text',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);

            $this->crud->addField([   // date_picker
                'name' => 'bankbranch',
                'label' => "Bank Branch",
                'type' => 'text',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);

            $this->crud->addField([   // date_picker
                'name' => 'bankaccount',
                'label' => "Bank Account",
                'type' => 'text',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
            $this->crud->addField([   // date_picker
                'name' => 'nssfnumber',
                'label' => "NSSF Number",
                'type' => 'text',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
            $this->crud->addField([   // date_picker
                'name' => 'localtax',
                'label' => "Local Tax Division",
                'type' => 'text',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]);
            $this->crud->addField(
                [   // select2_from_array
                    
                    'name' => 'signature',
                    'label' => 'Signature Scan',
                    'type' => 'browse',
                    
                    
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6'
                    ],
                    'tab' => 'Payroll',
                    // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
                ]
            );
            $this->crud->addField([   // date_picker
                'name' => 'signaturedate',
                'type' => 'date_picker',
                'label' => 'Date',
                'tab' => 'Payroll',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
                // optional:
                'date_picker_options' => [
                   'todayBtn' => true,
                   'format' => 'dd-mm-yyyy',
                   'language' => 'en'
                ],
             ]);
        
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(UpdateRequest::class);
        $this->crud->setUpdateContentClass('col-md-12 bold-labels'); 
        $this->setupCreateOperation();
    }
        // ...
        public function store(StoreRequest $request)
        {
         $this->crud->setValidation(StoreRequest::class);
         $response = $this->traitStore();
         return $response;
    
        }
        public function update()
        {
        $this->crud->setValidation(UpdateRequest::class);
            $response = $this->traitUpdate();
            return $response;
        }
}
