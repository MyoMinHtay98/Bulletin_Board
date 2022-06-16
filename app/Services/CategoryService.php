<?php

namespace App\Services;

use App\Contracts\Dao\CategoryDaoInterface;
use App\Contracts\Services\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    private $categoryDao;

    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

}
