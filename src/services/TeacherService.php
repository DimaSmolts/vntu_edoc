<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class TeacherService
{
	public function getTeachersByQuery($query)
	{
		$teachers = Capsule::table('teachers')
			->select('id', 't_name', 'position')
			->where('t_name', 'LIKE', '%' . $query . '%')
			->limit(10)
			->get()
			->map(function ($teacher) {
				$teacher->position = Capsule::table('position')
					->select('id', 'name', 'brief')
					->where('id', $teacher->position)
					->first();
				return $teacher;
			});

		return $teachers;
	}

	public function getTeacherById($id)
	{
		$teacher = Capsule::table('teachers')
			->select('id', 't_name', 'position')
			->where('id', $id)
			->get()
			->map(function ($t) {
				$t->position = Capsule::table('position')
					->select('id', 'name', 'brief')
					->where('id', $t->position)
					->first();
				return $t;
			})
			->first();

		return $teacher;
	}

	public function getTeachersByIds($ids)
	{
		$teachers = Capsule::table('teachers')
			->select('id', 't_name', 'position')
			->whereIn('id', $ids)
			->get()
			->map(function ($teacher) {
				$teacher->position = Capsule::table('position')
					->select('id', 'name', 'brief')
					->where('id', $teacher->position)
					->first();
				return $teacher;
			});

		return $teachers;
	}
}
