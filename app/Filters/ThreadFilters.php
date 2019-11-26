<?php

namespace App\Filters;

class ThreadFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by', 'popular', 'unanswered'];

    /**
     * Filter the query by a given username.
     *
     * @param  int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function by($userId)
    {
        return $this->builder->where('user_id', $userId);
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }

    /**
     * Filter the query according to those that are unanswered.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function unanswered()
    {
        return $this->builder->where('replies_count', 0);
    }
}
