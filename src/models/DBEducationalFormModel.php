<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalFormLessonHoursModel.php';

use App\Models\DBEducationalFormLessonHoursModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormModel extends Model
{
	protected $table = 'educationalForm';
	protected $fillable = ['name'];

	public $timestamps = false;

	public function educationalFormLessonHours()
	{
		return $this->hasMany(DBEducationalFormLessonHoursModel::class, 'educationalFormId');
	}
}
