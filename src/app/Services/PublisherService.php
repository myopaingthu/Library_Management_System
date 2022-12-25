<?php

namespace App\Services;

use App\Contracts\Dao\PublisherDaoInterface;
use App\Contracts\Services\PublisherServiceInterface;

/**
 * Service class for Publisher.
 */
class PublisherService implements PublisherServiceInterface
{
    /**
     * Publisher Dao
     */
    private $publisherDao;

    /**
     * Class Constructor
     *
     * @param PublisherDaoInterface $publisherDao
     * @return void
     */
    public function __construct(PublisherDaoInterface $publisherDao)
    {
        $this->publisherDao = $publisherDao;
    }

    /**
     * Get Publisher lists
     *
     * @return \Illuminate\Support\Collection $publishers
     */
    public function getPublishers()
    {
        return $this->publisherDao->getPublishers();
    }

    /**
     * Save Publisher
     *
     * @param array $request
     * @return void
     */
    public function savePublisher($request)
    {
        $this->publisherDao->savePublisher($request);
    }

    /**
     * Delete Publisher
     *
     * @param int $id
     * @return void
     */
    public function deletePublisher($id)
    {
        $this->publisherDao->deletePublisher($id);
    }
}
