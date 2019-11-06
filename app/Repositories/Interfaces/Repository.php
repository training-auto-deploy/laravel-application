<?php

namespace App\Repositories\Interfaces;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface Repository
{
    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function find($id, $columns = ['*']);

    /**
     * Execute the query as a "select" statement.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * Get an array with the values of a given column.
     *
     * @param  string  $column
     * @param  string|null  $key
     * @return \Illuminate\Support\Collection
     */
    public function pluck($column, $key = null);

    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($attributes);

    /**
     * Update the model in the database.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  array  $attributes
     * @param  array  $options
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Model $model, array $attributes = [], array $options = []);

    /**
     * Delete the model from the database.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return bool|null
     *
     * @throws \Exception
     */
    public function destroy(Model $model);

    /**
     * Get the first record matching the attributes.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findByAttributes(array $attributes);

    /**
     * Get the first record matching the attributes even soft deleted.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findByAttributesWithTrashed(array $attributes);

    /**
     * Get multiple records matching the attributes.
     *
     * @param  array  $attributes
     * @param  null|string $orderBy
     * @param  string $sortOrder
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc');

    /**
     * Find multiple models by their primary keys.
     *
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $ids
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findMany($ids, $columns = ['*']);

    public function where($conditions, $operator = null, $value = null);

    /**
     * where in a model by attributes.
     *
     * @param  string  $attribute
     * @param  array  $params
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function whereInByAttributes($attributes, array $params, $columns = ['*']);

    public function first();

    public function firstOrCreate(array $attributes);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*']);
}