<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBEducationalFormModel.php';

use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBEducationalFormModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalDisciplineSemesterEducationFormModel extends Model
{
	protected $table = 'educationalDisciplineSemesterEducationForm';
	protected $fillable = ['educationalDisciplineSemesterId', 'educationalFormId'];

	public $timestamps = false;

	public function semester()
    {
        return $this->belongsTo(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineSemesterId');
    }

	public function educationalForm()
    {
        return $this->belongsTo(DBEducationalFormModel::class, 'educationalFormId');
    }
}
