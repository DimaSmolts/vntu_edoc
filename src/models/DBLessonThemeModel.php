<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationFormLessonHoursModel.php';
require_once __DIR__ . '/DBLessonTypeModel.php';

use App\Models\DBEducationFormLessonHoursModel;
use App\Models\DBLessonTypeModel;

use Illuminate\Database\Eloquent\Model;

class DBLessonThemeModel extends Model
{
	protected $table = 'lessonThemes';
	protected $fillable = ['themeId', 'lessonTypeId', 'name', 'lessonThemeNumber'];

	public $timestamps = false;

	public function educationFormLessonHoursFulltime()
	{
		return $this->hasMany(DBEducationFormLessonHoursModel::class, 'lessonThemeId')
			->whereHas('educationalForm', function ($query) {
				$query->where('name', 'fulltime');
			});
	}

	public function educationFormLessonHoursCorrespondence()
	{
		return $this->hasMany(DBEducationFormLessonHoursModel::class, 'lessonThemeId')
			->whereHas('educationalForm', function ($query) {
				$query->where('name', 'correspondence');
			});
	}

	public function lessonType()
    {
        return $this->belongsTo(DBLessonTypeModel::class, 'lessonTypeId');
    }
}
