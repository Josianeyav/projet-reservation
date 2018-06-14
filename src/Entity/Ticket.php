<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="representation_user", indexes={@ORM\Index(name="representation_user_representations_id_fk", columns={"representation_id"}), @ORM\Index(name="representation_user_users_id_fk", columns={"user_id"})})
 * @ORM\Entity
 */
class Ticket {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="places", type="integer", nullable=true, options={"default"="1"})
     */
    private $places = 1;

    /**
     * @var Representation
     *
     * @ORM\ManyToOne(targetEntity="Representation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="representation_id", referencedColumnName="id")
     * })
     */
    private $representation;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId () : ?int {
        return $this->id;
    }

    public function getPlaces () : ?int {
        return $this->places;
    }

    public function setPlaces (?int $places) : self {
        $this->places = $places;

        return $this;
    }

    public function getRepresentation () : ?Representation {
        return $this->representation;
    }

    public function setRepresentation (?Representation $representation) : self {
        $this->representation = $representation;

        return $this;
    }

    public function getUser () : ?User {
        return $this->user;
    }

    public function setUser (?User $user) : self {
        $this->user = $user;

        return $this;
    }


}
