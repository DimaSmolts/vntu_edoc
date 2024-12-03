<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterEducationFormModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';

use App\Models\DBEducationalDisciplineSemesterEducationFormModel;
use App\Models\DBEducationalDisciplineSemesterModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormCourseworkHoursModel extends Model
{
    protected $table = 'educationalFormCourseworkHours';
    protected $fillable = ['educationalFormId', 'semesterId', 'hours'];

    public $timestamps = false;

    public function semesterEducationalForm()
    {
        return $this->belongsTo(DBEducationalDisciplineSemesterEducationFormModel::class, 'educationalFormId');
    }

    public function semester()
    {
        return $this->belongsTo(DBEducationalDisciplineSemesterModel::class, 'semesterId');
    }
}
