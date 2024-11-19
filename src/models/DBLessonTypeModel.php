<?php

namespace App\Models;

require_once __DIR__ . '/DBLessonThemeModel.php';

use App\Models\DBLessonThemeModel;

use Illuminate\Database\Eloquent\Model;

class DBLessonTypeModel extends Model
{
	protected $table = 'lessonTypes';
	protected $fillable = ['name'];

	public $timestamps = false;

	public function lessonTheme()
	{
		return $this->hasMany(DBLessonThemeModel::class, 'lessonTypeId');
	}
}
