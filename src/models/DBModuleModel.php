<?php

namespace App\Models;

require_once __DIR__ . '/DBThemeModel.php';
require_once __DIR__ . '/DBEducationalDisciplineSemesterModel.php';

use App\Models\DBThemeModel;
use App\Models\DBEducationalDisciplineSemesterModel;

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

	public function semester()
	{
		return $this->belongsTo(DBEducationalDisciplineSemesterModel::class, 'educationalDisciplineSemesterId');
	}
}
