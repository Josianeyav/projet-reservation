<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locality
 *
 * @ORM\Table(name="localities")
 * @ORM\Entity
 */
class Locality {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", nullable=true, options={"default"="NULL"})
     */
    private $postalCode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", nullable=false)
     */
    private $locality = '';

    public function getId () : ?int {
        return $this->id;
    }

    public function getPostalCode () : ?string {
        return $this->postalCode;
    }

    public function setPostalCode (?string $postalCode) : self {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getLocality () : string {
        return $this->locality;
    }

    public function setLocality (string $locality) : self {
        $this->locality = $locality;

        return $this;
    }

    public function __toString () : string {
        if ((string)$this->postalCode !== '') {
            return "$this->postalCode $this->locality";
        }

        return $this->locality;
    }

}
