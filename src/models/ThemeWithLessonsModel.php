<?php

namespace App\Models;

class ThemeWithLessonsModel
{
	public int $id;
	public ?string $name;
	public ?int $themeNumber;
	public array $lections = [];
	public array $practicals = [];
	public array $seminars = [];
	public array $labs = [];
	public array $selfworks = [];

	public function __construct(
		int $id,
		?string $name = null,
		?int $themeNumber = null,
		array $lections = [],
		array $practicals = [],
		array $seminars = [],
		array $labs = [],
		array $selfworks = []
	) {
		$this->id = $id;
		$this->name = $name;
		$this->themeNumber = $themeNumber;
		$this->lections = $lections;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->selfworks = $selfworks;
	}
}
