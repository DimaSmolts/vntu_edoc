<?php

namespace App\Models;

require_once __DIR__ . '/DBLessonModel.php';

use App\Models\DBLessonModel;

use Illuminate\Database\Eloquent\Model;

class DBLessonTypeModel extends Model
{
	protected $table = 'lessonTypes';
	protected $fillable = ['name'];

	public $timestamps = false;

	public function lesson()
	{
		return $this->hasMany(DBLessonModel::class, 'lessonTypeId');
	}
}
