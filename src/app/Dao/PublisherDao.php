<?php

namespace App\Dao;

use App\Contracts\Dao\PublisherDaoInterface;
use App\Models\Publisher;

/**
 * Data Access Object for Publisher
 */
class PublisherDao implements PublisherDaoInterface
{
    /**
     * Get Publisher lists
     *
     * @return \Illuminate\Support\Collection $publishers
     */
    public function getPublishers()
    {
        return Publisher::query();
    }

    /**
     * Save Publisher
     *
     * @param array $request
     * @return void
     */
    public function savePublisher($request)
    {
        Publisher::create($request);
    }

    /**
     * Delete Publisher
     *
     * @param int $id
     * @return void
     */
    public function deletePublisher($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
    }
}
