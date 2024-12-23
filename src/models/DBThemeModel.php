<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';
require_once __DIR__ . '/DBLessonModel.php';

use App\Models\DBModuleModel;
use App\Models\DBLessonModel;

use Illuminate\Database\Eloquent\Model;

class DBThemeModel extends Model
{
	protected $table = 'themes';
	protected $fillable = ['moduleId', 'name', 'description', 'themeNumber'];

	public $timestamps = false;

	public function module()
	{
		return $this->belongsTo(DBModuleModel::class, 'moduleId');
	}

	public function lessons()
	{
		return $this->hasMany(DBLessonModel::class, 'themeId');
	}

	public function lections()
	{
		return $this->hasMany(DBLessonModel::class, 'themeId')
			->whereHas('lessonType', function ($query) {
				$query->where('name', 'lection');
			});
	}

	public function practicals()
	{
		return $this->hasMany(DBLessonModel::class, 'themeId')
			->whereHas('lessonType', function ($query) {
				$query->where('name', 'practical');
			});
	}

	public function seminars()
	{
		return $this->hasMany(DBLessonModel::class, 'themeId')
			->whereHas('lessonType', function ($query) {
				$query->where('name', 'seminar');
			});
	}

	public function labs()
	{
		return $this->hasMany(DBLessonModel::class, 'themeId')
			->whereHas('lessonType', function ($query) {
				$query->where('name', 'laboratory');
			});
	}
}
