<?php

namespace App\Contracts\Services;

/**
 * Interface for Publisher service.
 */
interface PublisherServiceInterface
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
