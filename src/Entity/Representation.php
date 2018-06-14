<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use DateTime;
use DateTimeInterface;

/**
 * Representation
 *
 * @ORM\Table(name="representations", indexes={@ORM\Index(name="representations_locations_id_fk", columns={"location_id"}), @ORM\Index(name="representations_shows_id_fk", columns={"show_id"})})
 * @ORM\Entity
 */
class Representation {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="when", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $when;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     * })
     */
    private $location;

    /**
     * @var Show
     *
     * @ORM\ManyToOne(targetEntity="Show")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="show_id", referencedColumnName="id")
     * })
     */
    private $show;

    private function __construct () {
        $this->when = new DateTime;
    }

    public function getId () : ?int {
        return $this->id;
    }

    public function getWhen () : DateTimeInterface {
        return $this->when;
    }

    public function setWhen (DateTimeInterface $when) : self {
        $this->when = $when;

        return $this;
    }

    public function getLocation () : Location {
        return $this->location;
    }

    public function setLocation (Location $location) : self {
        $this->location = $location;

        return $this;
    }

    public function getShow () : Show {
        return $this->show;
    }

    public function setShow (Show $show) : self {
        $this->show = $show;

        return $this;
    }

}
