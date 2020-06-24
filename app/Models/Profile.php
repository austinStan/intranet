<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'profiles';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $fillable = [
        'staff_id','employeedate','nationality','city','phonenumber','maritalstatus','spousename','childname',
        'childdate','town','street','zone','landmarks','homedistrict','hometown','department_id',
        'startdate','salary','jobstatus','cv','contactname','jobposition','relationshiptype','phoneno',
        'email','bachelors','masters','diploma','certificate','academicdocument','bankname',
        'bankbranch','bankaccount','nssfnumber','localtax','signature','signaturedate'
    ];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function departments()
    {
         return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function staffs()
    {
         return $this->belongsTo('App\Models\Staff', 'staff_id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
