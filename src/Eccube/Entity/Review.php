<?php

namespace Eccube\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="dtb_review")
 * @ORM\Entity(repositoryClass="Eccube\Repository\ReviewRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Review
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     */
    private $customer;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $rating;

    /**
     * @ORM\Column(type="text")
     */
    private $review_text;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $create_date;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $update_date;

    /**
     * @ORM\PrePersist()
     */
    public function onPrePersist()
    {
        $this->create_date = $this->update_date = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function onPreUpdate()
    {
        $this->update_date = new \DateTime();
    }

    // Getter/Setter省略（必要あれば追加）
}