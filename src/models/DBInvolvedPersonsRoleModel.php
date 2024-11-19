<?php

namespace App\Models;

require_once __DIR__ . '/DBWorkingProgramInvolvedPersonModel.php';

use App\Models\DBWorkingProgramInvolvedPersonModel;

use Illuminate\Database\Eloquent\Model;

class DBInvolvedPersonsRoleModel extends Model
{
	protected $table = 'involvedPersonsRoles';
	protected $fillable = ['role'];

	public $timestamps = false;

	public function roles()
	{
		return $this->hasMany(DBWorkingProgramInvolvedPersonModel::class, 'involvedPersonRoleId');
	}
}
