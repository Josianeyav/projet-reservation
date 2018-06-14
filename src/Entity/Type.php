<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="types")
 * @ORM\Entity
 */
class Type {

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
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type = '';

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Artist")
     * @ORM\JoinTable(name="artist_type",
     *     joinColumns={@ORM\JoinColumn(name="type_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="id")}
     *     )
     */
    private $artists;

    public function __construct () {
        $this->artists = new ArrayCollection;
    }


    public function getId () : ?int {
        return $this->id;
    }

    public function getType () : string {
        return $this->type;
    }

    public function setType (string $type) : self {
        $this->type = $type;

        return $this;
    }

    public function getArtists() : Collection {
        return $this->artists;
    }

    public function __toString () {
        return $this->type;
    }

}
