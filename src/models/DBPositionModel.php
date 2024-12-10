<?php

namespace App\Models;

require_once __DIR__ . '/DBTeacherModel.php';

use App\Models\DBTeacherModel;

use Illuminate\Database\Eloquent\Model;

class DBPositionModel extends Model
{
	protected $table = 'position';
	protected $fillable = ['name', 'bitid', 'vacdays', 'pedagog', 'naupedagog', 'brief', 'status'];

	public $timestamps = false;

	public function positions()
	{
		return $this->hasMany(DBTeacherModel::class, 'position');
	}
}
