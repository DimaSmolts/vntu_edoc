<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class WorkingProgramGlobalDataService
{
	// Функція для отримання дефолтних глобальних даних
	public function getWorkingProgramGlobalData()
	{
		return Capsule::table('workingProgramGlobalData')
			->where('id', 1)
			->first();
	}

	// Функція оновлення глобальних даних для адміна
	public function updateGlobalData($field, $value)
	{
		Capsule::table('workingProgramGlobalData')
			// Додаємо новий запис або оновлюємо запис глобальних даних
			->updateOrInsert(
				['id' => 1],
				[
					$field => $value
				]
			);
	}
}
