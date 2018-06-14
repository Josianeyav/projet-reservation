<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role as BaseRole;

/**
 * Role
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Role extends BaseRole {

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
     * @ORM\Column(name="role", type="string", nullable=false)
     */
    private $role = '';

    public function getId () : ?int {
        return $this->id;
    }

    public function getRole () : string {
        return $this->role;
    }

    public function setRole (string $role) : self {
        $this->role = $role;

        return $this;
    }

    public function __toString () : string {
        return $this->role;
    }

}
