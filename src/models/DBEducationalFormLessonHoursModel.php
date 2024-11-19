<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalFormModel.php';

use App\Models\DBEducationalFormModel;

use Illuminate\Database\Eloquent\Model;

class DBEducationalFormLessonHoursModel extends Model
{
	protected $table = 'educationalFormLessonHours';
	protected $fillable = ['educationalFormId', 'lessonThemeId', 'hours'];

	public $timestamps = false;

	public function educationalForm()
	{
		return $this->belongsTo(DBEducationalFormModel::class, 'educationalFormId');
	}
}
