<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations", uniqueConstraints={@ORM\UniqueConstraint(name="slug", columns={"slug"})}, indexes={@ORM\Index(name="locations_localities_id_fk", columns={"locality_id"})})
 * @ORM\Entity
 */
class Location {

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
     * @ORM\Column(name="designation", type="string", nullable=false)
     */
    private $designation = '';

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", nullable=false)
     */
    private $address = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", nullable=true, options={"default"="NULL"})
     */
    private $website = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", nullable=true, options={"default"="NULL"})
     */
    private $phone = '';

    /**
     * @var Locality
     *
     * @ORM\ManyToOne(targetEntity="Locality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locality_id", referencedColumnName="id")
     * })
     */
    private $locality;

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

    public function getDesignation () : string {
        return $this->designation;
    }

    public function setDesignation (string $designation) : self {
        $this->designation = $designation;

        return $this;
    }

    public function getAddress () : string {
        return $this->address;
    }

    public function setAddress (string $address) : self {
        $this->address = $address;

        return $this;
    }

    public function getWebsite () : ?string {
        return $this->website;
    }

    public function setWebsite (?string $website) : self {
        $this->website = $website;

        return $this;
    }

    public function getPhone () : ?string {
        return $this->phone;
    }

    public function setPhone (?string $phone) : self {
        $this->phone = $phone;

        return $this;
    }

    public function getLocality () : ?Locality {
        return $this->locality;
    }

    public function setLocality (?Locality $locality) : self {
        $this->locality = $locality;

        return $this;
    }

    public function __toString () : string {
        return $this->designation;
    }

}
