<?php

namespace Eccube\Service;

use Eccube\Entity\Review;
use Eccube\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;

class ReviewServicegit 
{
    private $entityManager;
    private $reviewRepository;

    public function __construct(EntityManagerInterface $entityManager, ReviewRepository $reviewRepository)
    {
        $this->entityManager = $entityManager;
        $this->reviewRepository = $reviewRepository;
    }

    public function addReview($productId, $customerId, $rating, $reviewText)
    {
        $review = new Review();
        $review->setProductId($productId);
        $review->setCustomerId($customerId);
        $review->setRating($rating);
        $review->setReviewText($reviewText);
        $review->setCreatedAt(new \DateTime());
        $review->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($review);
        $this->entityManager->flush();

        return $review;
    }

    // Other methods for fetching, updating, and deleting reviews...
}