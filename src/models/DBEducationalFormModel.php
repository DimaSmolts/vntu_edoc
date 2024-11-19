<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationFormLessonHoursModel.php';

use App\Models\DBEducationFormLessonHoursModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormModel extends Model
{
	protected $table = 'educationalForm';
	protected $fillable = ['name'];

	public $timestamps = false;

	public function educationFormLessonHours()
	{
		return $this->hasMany(DBEducationFormLessonHoursModel::class, 'educationalFormId');
	}
}
