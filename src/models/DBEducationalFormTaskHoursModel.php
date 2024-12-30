<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';
require_once __DIR__ . '/DBTaskDetailsModel.php';

use App\Models\DBEducationalDisciplineSemesterEducationFormModel;
use App\Models\DBTaskDetailsModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormTaskHoursModel extends Model
{
	protected $table = 'educationalFormTaskHours';
	protected $fillable = ['educationalFormId', 'taskDetailsId', 'hours'];

	public $timestamps = false;

	public function semesterEducationalForm()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalFormId');
	}

	public function taskDetails()
	{
		return $this->belongsTo(DBTaskDetailsModel::class, 'taskDetailsId');
	}
}
