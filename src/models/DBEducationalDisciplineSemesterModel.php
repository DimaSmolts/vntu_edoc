<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';
require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBModuleModel;
use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineSemesterModel extends Model
{
    protected $table = 'educationalDisciplineSemester';
    protected $fillable = ['educationalDisciplineWPId', 'semesterNumber', 'examType', 'courseWork'];

    public $timestamps = false;

    public function modules()
    {
        return $this->hasMany(DBModuleModel::class, 'educationalDisciplineSemesterId');
    }

    public function workingProgram()
    {
        return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWPId');
    }
}
