<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalFormLessonHoursModel.php';
require_once __DIR__ . '/DBLessonTypeModel.php';

use App\Models\DBEducationalFormLessonHoursModel;
use App\Models\DBLessonTypeModel;

use Illuminate\Database\Eloquent\Model;

class DBLessonModel extends Model
{
	protected $table = 'lessons';
	protected $fillable = ['themeId', 'lessonTypeId', 'name', 'lessonNumber'];

	public $timestamps = false;

	public function educationalFormLessonHours()
	{
		return $this->hasMany(DBEducationalFormLessonHoursModel::class, 'lessonId');
	}

	public function lessonType()
	{
		return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId');
	}
}
