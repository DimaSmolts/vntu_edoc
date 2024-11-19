<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalFormLessonHoursModel.php';
require_once __DIR__ . '/DBLessonTypeModel.php';

use App\Models\DBEducationalFormLessonHoursModel;
use App\Models\DBLessonTypeModel;

use Illuminate\Database\Eloquent\Model;

class DBLessonThemeModel extends Model
{
	protected $table = 'lessonThemes';
	protected $fillable = ['themeId', 'lessonTypeId', 'name', 'lessonThemeNumber'];

	public $timestamps = false;

	public function educationalFormLessonHours()
	{
		return $this->hasMany(DBEducationalFormLessonHoursModel::class, 'lessonThemeId');
	}

	// public function educationalFormLessonHoursCorrespondence()
	// {
	// 	return $this->hasMany(DBEducationalFormLessonHoursModel::class, 'lessonThemeId')
	// 		->whereHas('educationalForm', function ($query) {
	// 			$query->where('name', 'correspondence');
	// 		});
	// }

	public function lessonType()
	{
		return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId');
	}
}
