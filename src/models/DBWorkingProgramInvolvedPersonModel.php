<?php

namespace App\Models;

require_once __DIR__ . '/DBPersonModel.php';
require_once __DIR__ . '/DBInvolvedPersonsRoleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBPersonModel;
use App\Models\DBInvolvedPersonsRoleModel;
use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Eloquent\Model;

class DBWorkingProgramInvolvedPersonModel extends Model
{
	protected $table = 'workingProgramInvolvedPersons';
	protected $fillable = ['educationalDisciplineWPId', 'personId', 'involvedPersonRoleId'];

	public $timestamps = false;

	public function person()
	{
		return $this->belongsTo(DBPersonModel::class, 'personId');
	}

	public function involvedRole()
	{
		return $this->belongsTo(DBInvolvedPersonsRoleModel::class, 'involvedPersonRoleId');
	}

	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWPId');
	}
}
