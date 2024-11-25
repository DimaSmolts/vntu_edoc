<?php

namespace App\Models;

require_once __DIR__ . '/DBEducationalDisciplineWorkingProgramModel.php';

use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Eloquent\Model;

class DBWorkingProgramLiteratureModel extends Model
{
	protected $table = 'workingProgramLiterature';
	protected $fillable = [
		'educationalDisciplineWorkingProgramId',
		'main',
		'supporting',
		'additional',
		'informationResources'
	];

	public $timestamps = false;


	public function workingProgram()
	{
		return $this->belongsTo(DBEducationalDisciplineWorkingProgramModel::class, 'educationalDisciplineWorkingProgramId');
	}
}
