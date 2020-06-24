<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'departments';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
   // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function staffs()
    {
         return $this->hasMany('App\Models\Staff', 'department_id');
    }

    public function news()
    {
         return $this->hasMany('App\Models\News', 'department_id');
    }
    public function computerassistance()
    {
         return $this->hasMany('App\Models\News', 'department_id');
    }
    public function walloffame()
    {
         return $this->hasMany('App\Models\Walloffame', 'department_id');
    }
    public function profile()
    {
         return $this->hasMany('App\Models\Profile', 'department_id');
    }
    public function document()
    {
         return $this->hasMany('App\Models\Documents', 'department_id');
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
