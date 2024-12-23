<?php

namespace App\Models;

class ThemeWithLessonsModel
{
	public int $id;
	public ?string $name;
	public ?string $description;
	public ?int $themeNumber;
	public array $lections = [];
	public array $practicals = [];
	public array $seminars = [];
	public array $labs = [];
	public array $semesterEducationalForms = [];

	public function __construct(
		int $id,
		?string $name = '',
		?string $description = '',
		?int $themeNumber = null,
		array $lections = [],
		array $practicals = [],
		array $seminars = [],
		array $labs = [],
		array $semesterEducationalForms = [],
	) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->themeNumber = $themeNumber;
		$this->lections = $lections;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->semesterEducationalForms = $semesterEducationalForms;
	}
}
