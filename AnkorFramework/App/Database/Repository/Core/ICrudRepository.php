<?php
namespace AnkorFramework\App\Database\Repository\Core;

use AnkorFramework\App\Database\Core\Schema\AbstractSchema;
interface ICrudRepository
{
    public function save();
    public function find(): array;
    public function delete();
    public function update();
}