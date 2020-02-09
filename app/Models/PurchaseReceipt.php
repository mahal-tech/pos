<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Auth;
class PurchaseReceipt extends Model
{
	use CrudTrait;

	/*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'purchase_receipts';
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

	public function supplier()
	{
		return $this->belongsTo("App\Models\Supplier");
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
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/

	public static function boot()
	{
		 parent::boot();
		 static::creating(function($model)
		 {
			 $user = Auth::guard(backpack_guard_name())->user();
			 $model->creator = $user->id;
		 });
		 static::updating(function($model)
		 {
				$user = Auth::guard(backpack_guard_name())->user();
				$model->creator = $user->id;
		 });
	}
}
