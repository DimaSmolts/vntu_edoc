<?php

namespace App\Models;

require_once __DIR__ . '/DBThemeModel.php';
require_once __DIR__ . '/DBLessonModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';
require_once __DIR__ . '/DBTaskDetailsModel.php';

use App\Models\DBThemeModel;
use App\Models\DBLessonModel;
use App\Models\DBEducationalDisciplineSemesterModel;
use App\Models\DBTaskDetailsModel;

use Illuminate\Database\Eloquent\Model;

class DBModuleModel extends Model
{
	protected $table = 'modules';
	protected $fillable = ['educationalDisciplineSemesterId', 'name', 'moduleNumber', 'isColloquiumExists', 'isControlWorkExists', 'colloquiumPoints'];

	public $timestamps = false;

	public function themes()
	{
		return $this->hasMany(DBThemeModel::class, 'moduleId');
	}

    public function lessons()
    {
        return $this->hasMany(DBLessonModel::class, 'moduleId');
    }

    public function seminars()
    {
        return $this->hasMany(DBLessonModel::class, 'moduleId')
            ->whereHas('lessonType', function ($query) {
                $query->where('name', 'seminar');
            });
    }

    public function practicals()
    {
        return $this->hasMany(DBLessonModel::class, 'moduleId')
            ->whereHas('lessonType', function ($query) {
                $query->where('name', 'practical');
            });
    }

    public function labs()
    {
        return $this->hasMany(DBLessonModel::class, 'moduleId')
            ->whereHas('lessonType', function ($query) {
                $query->where('name', 'laboratory');
            });
    }

	public function semester()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineSemesterId');
	}

	public function tasks()
	{
		return $this->hasMany(DBTaskDetailsModel::class, 'moduleId');
	}

	public function colloquium()
	{
		return $this->hasOne(DBTaskDetailsModel::class, 'moduleId')
			->whereHas('taskType', function ($query) {
				$query->where('id', 5);
			});
	}

	public function controlWork()
	{
		return $this->hasOne(DBTaskDetailsModel::class, 'moduleId')
			->whereHas('taskType', function ($query) {
				$query->where('id', 6);
			});
	}
}
