<?php

namespace App\Models;

require_once __DIR__ . '/DBModuleModel.php';

use App\Models\DBModuleModel;

use Illuminate\Database\Eloquent\Model;

class DBSemesterModel extends Model
{
    protected $table = 'educationalDisciplineSemester'; // Define your table name
    protected $fillable = ['educationalDisciplineWPId', 'semesterNumber', 'examType', 'courseWork']; // Add fields you want to allow mass assignment

    public $timestamps = false;

    // Define relationships if needed (e.g., modules, themes)
    public function modules()
    {
        return $this->hasMany(DBModuleModel::class, 'educationalDisciplineSemesterId'); // Update foreign key as necessary
    }
}
