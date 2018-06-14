<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artists")
 * @ORM\Entity
 */
class Artist {

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
     * @ORM\Column(name="firstname", type="string", nullable=true, options={"default"="NULL"})
     */
    private $firstName = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", nullable=true, options={"default"="NULL"})
     */
    private $lastName = null;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Type")
     * @ORM\JoinTable(name="artist_type",
     *     joinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="type_id", referencedColumnName="id")}
     *     )
     */
    private $types;

    public function __construct () {
        $this->types = new ArrayCollection;
    }

    public function getId () : ?int {
        return $this->id;
    }

    public function getFirstName () : ?string {
        return $this->firstName;
    }

    public function setFirstName (?string $firstName) : self {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName () : ?string {
        return $this->lastName;
    }

    public function setLastName (?string $lastName) : self {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTypes() : Collection {
        return $this->types;
    }

    public function __toString () {
        return trim("$this->firstName $this->lastName");
    }

}
