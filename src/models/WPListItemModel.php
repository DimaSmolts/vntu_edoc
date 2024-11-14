<?php

namespace App\Models;

class WPListItemModel
{
    public int $id;
    public string $disciplineName;
    public string $createdAt;

    public function __construct($id, $disciplineName, $createdAt)
    {
        $this->id = $id;
        $this->disciplineName = $disciplineName;
        $this->createdAt = $createdAt;
    }
}
