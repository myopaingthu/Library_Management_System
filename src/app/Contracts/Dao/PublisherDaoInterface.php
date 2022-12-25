<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Publisher
 */
interface PublisherDaoInterface
{
    /**
     * Get Publisher lists
     *
     * @return \Illuminate\Support\Collection $publishers
     */
    public function getPublishers();

    /**
     * Save Publisher
     *
     * @param array $request
     * @return void
     */
    public function savePublisher($request);

    /**
     * Delete Publisher
     *
     * @param int $id
     * @return void
     */
    public function deletePublisher($id);
}
