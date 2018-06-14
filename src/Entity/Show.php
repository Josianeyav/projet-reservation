<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Show
 *
 * @ORM\Table(name="shows", uniqueConstraints={@ORM\UniqueConstraint(name="slug", columns={"slug"})}, indexes={@ORM\Index(name="shows_locations_id_fk", columns={"location_id"})})
 * @ORM\Entity
 */
class Show {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", nullable=false)
     */
    private $slug = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    private $title = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="poster_url", type="string", nullable=true, options={"default"="NULL"})
     */
    private $posterUrl = null;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="bookable", type="boolean", nullable=true, options={"default"="1"})
     */
    private $bookable = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=true, options={"default"="NULL"})
     * @Assert\Regex("/^[0-9]{1,10}(.[0-9]{1,2})?$/")
     */
    private $price = null;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     * })
     */
    private $location;

    public function getId () : ?int {
        return $this->id;
    }

    public function getSlug () : string {
        return $this->slug;
    }

    public function setSlug (string $slug) : self {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle () : string {
        return $this->title;
    }

    public function setTitle (string $title) : self {
        $this->title = $title;

        return $this;
    }

    public function getPosterUrl () : ?string {
        return $this->posterUrl;
    }

    public function setPosterUrl (?string $posterUrl) : self {
        $this->posterUrl = $posterUrl;

        return $this;
    }

    public function getBookable () : ?bool {
        return $this->bookable;
    }

    public function setBookable (?bool $bookable) : self {
        $this->bookable = $bookable;

        return $this;
    }

    public function getPrice () : ?string {
        return $this->price;
    }

    public function setPrice (?string $price) : self {
        $this->price = $price;

        return $this;
    }

    public function getLocation () : ?Location {
        return $this->location;
    }

    public function setLocation (?Location $location) : self {
        $this->location = $location;

        return $this;
    }

}
