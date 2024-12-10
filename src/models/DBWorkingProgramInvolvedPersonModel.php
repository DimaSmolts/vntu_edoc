<?php

namespace App\Models;

require_once __DIR__ . '/DBTeacherModel.php';
require_once __DIR__ . '/DBInvolvedPersonsRoleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBTeacherModel;
use App\Models\DBInvolvedPersonsRoleModel;
use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Eloquent\Model;

class DBWorkingProgramInvolvedPersonModel extends Model
{
	protected $table = 'workingProgramInvolvedPersons';
	protected $fillable = ['educationalDisciplineWPId', 'personId', 'involvedPersonRoleId', 'positionAndMinutesOfMeeting'];

	public $timestamps = false;

	public function person()
	{
		return $this->belongsTo(DBTeacherModel::class, 'personId');
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
