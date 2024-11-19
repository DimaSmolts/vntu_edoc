<?php

namespace App\Models;

require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';

use App\Models\DBWorkingProgramInvolvedPersonModel;

use Illuminate\Database\Eloquent\Model;

class DBPersonModel extends Model
{
	protected $table = 'persons';
	protected $fillable = ['surname', 'name', 'patronymicName', 'degree'];

	public $timestamps = false;

	public function persons()
	{
		return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'personId');
	}
}
