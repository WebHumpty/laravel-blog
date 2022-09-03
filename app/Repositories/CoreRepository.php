<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /** @var Model  */
    protected Model $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * вернуть имя модели
     */
    abstract protected function getModelClass(): string;

    /**
     * вернуть клонированную копию модели
     */
    protected function startConditions(): Model
    {
        return clone $this->model;
    }

    /**
     * вернуть одну запись по чпу
     */
    public function findBySlug(string $slug): ?Model
    {
        $item = $this->startConditions()
            ->where('slug', $slug)
            ->first();

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * вернуть одну запись по ID
     */
    public function findById(int $id): ?Model
    {
        $item = $this->startConditions()
            ->find($id);

        if (!$item) {
            return null;
        }

        return $item;
    }
}
