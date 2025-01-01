<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';
require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';
require_once __DIR__ . '/DBExamTypeModel.php';
require_once __DIR__ . '/DBTaskDetailsModel.php';
require_once __DIR__ . '/DBEducationalFormLessonSelfworkHoursModel.php';

use App\Models\DBModuleModel;
use App\Models\DBEducationalDisciplineSemesterEducationFormModel;
use App\Models\DBEducationalDisciplineWorkingProgramModel;
use App\Models\DBExamTypeModel;
use App\Models\DBTaskDetailsModel;
use App\Models\DBEducationalFormLessonSelfworkHoursModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineSemesterModel extends Model
{
    protected $table = 'educationalDisciplineSemester';
    protected $fillable = [
        'educationalDisciplineWPId',
        'semesterNumber',
        'examTypeId',
        'isCourseworkExists',
        'isCourseProjectExists',
        'isCalculationAndGraphicWorkExists',
        'isCalculationAndGraphicTaskExists',
        'additionalTasks',
        'courseworkAssessmentComponents',
        'courseProjectAssessmentComponents',
    ];

    public $timestamps = false;

    public function modules()
    {
        return $this->hasMany(DBModuleModel::class, 'educationalDisciplineSemesterId');
    }

    public function educationalForms()
    {
        return $this->hasMany(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalDisciplineSemesterId');
    }

    public function workingProgram()
    {
        return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWPId');
    }

    public function examType()
    {
        return $this->belongsTo(DBExamTypeModel::class, 'examTypeId');
    }

    public function tasks()
    {
        return $this->hasMany(DBTaskDetailsModel::class, 'semesterId')
            ->whereHas('taskType', function ($query) {
                $query->where('id', '<=', 6);
            });
    }

    public function additionalTasks()
    {
        return $this->hasMany(DBTaskDetailsModel::class, 'semesterId')
            ->whereHas('taskType', function ($query) {
                $query->where('id', '>', 7);
            });
    }

	public function educationalFormLessonSelfworkHours()
	{
		return $this->hasMany(DBEducationalFormLessonSelfworkHoursModel::class, 'semesterId');
	}
}
