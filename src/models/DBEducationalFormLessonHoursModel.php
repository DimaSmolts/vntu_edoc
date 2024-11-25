<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';

use App\Models\DBEducationalDisciplineSemesterEducationFormModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormLessonHoursModel extends Model
{
	protected $table = 'educationalFormLessonHours';
	protected $fillable = ['educationalFormId', 'lessonThemeId', 'hours'];

	public $timestamps = false;

	public function semesterEducationalForm()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalFormId');
	}
}
