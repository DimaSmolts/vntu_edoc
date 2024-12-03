<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';
require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';
require_once __DIR__ . '/DBEducationalFormCourseworkHoursModel.php';

use App\Models\DBModuleModel;
use App\Models\DBEducationalDisciplineSemesterEducationFormModel;
use App\Models\DBEducationalDisciplineWorkingProgramModel;
use App\Models\DBEducationalFormCourseworkHoursModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineSemesterModel extends Model
{
    protected $table = 'educationalDisciplineSemester';
    protected $fillable = ['educationalDisciplineWPId', 'semesterNumber', 'examType', 'isCourseworkExists', 'courseworkAssessmentComponents'];

    public $timestamps = false;

    public function modules()
    {
        return $this->hasMany(DBModuleModel::class, 'educationalDisciplineSemesterId');
    }

    public function educationalForms()
    {
        return $this->hasMany(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalDisciplineSemesterId');
    }
    
	public function educationalFormCourseworkHours()
	{
		return $this->hasMany(DBEducationalFormCourseworkHoursModel::class, 'semesterId');
	}

    public function workingProgram()
    {
        return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWPId');
    }
}
