<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';
require_once __DIR__ . '/DBLessonTypeModel.php';

use App\Models\DBEducationalDisciplineSemesterEducationFormModel;
use App\Models\DBLessonTypeModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormLessonSelfworkHoursModel extends Model
{
	protected $table = 'educationalFormLessonSelfworkHours';
	protected $fillable = ['lessonTypeId', 'semesterId', 'educationalFormId', 'hours'];

	public $timestamps = false;

	public function semesterEducationalForm()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalFormId');
	}
}
