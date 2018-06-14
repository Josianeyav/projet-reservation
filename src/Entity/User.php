<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use BadMethodCallException;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * User
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="users_roles_id_fk", columns={"role_id"})})
 * @ORM\Entity
 */
class User implements UserInterface {

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
     * @ORM\Column(name="login", type="string", nullable=false)
     */
    private $login = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    private $password = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", nullable=true, options={"default"="NULL"})
     */
    private $firstName = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", nullable=true, options={"default"="NULL"})
     */
    private $lastName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue", type="string", nullable=true, options={"default"="NULL"})
     */
    private $language = 'fr';

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    ###
    ### Regular getters and setters
    ###

    public function getId () : ?int {
        return $this->id;
    }

    public function getLogin () : string {
        return $this->login;
    }

    public function setLogin (string $login) : self {
        $this->login = $login;

        return $this;
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

    public function getEmail () : string {
        return $this->email;
    }

    public function setEmail (string $email) : self {
        $this->email = $email;

        return $this;
    }

    public function getLanguage () : ?string {
        return $this->language;
    }

    public function setLanguage (?string $language) : self {
        $this->language = $language;

        return $this;
    }

    public function getRole () : ?Role {
        return $this->role;
    }

    public function setRole (?Role $role) : self {
        $this->role = $role;

        return $this;
    }

    ###
    ### Password getter/setter, and helper methods
    ###
    ### TODO: consider to transfer to Symfony the encoding responsibility
    ###

    public function getPassword () : string {
        throw new BadMethodCallException("You can't get a password, as it's an hashed value. Use checkPassword method instead.");
    }

    public function setPassword (string $password) : self {
        $this->password = password_hash($password, PASSWORD_ARGON2I);

        return $this;
    }

    public function checkPassword (string $password) : bool {
        return password_verify($password, $this->password);
    }

    ###
    ### UserInterface
    ###

    public function getRoles () : array {
        if ($this->role === null) {
            return [];
        }

        return [$this->role];
    }

    public function getSalt () : ?string {
        return null;
    }

    public function getUsername () : string {
        return $this->login;
    }

    public function eraseCredentials () : void {
        $this->password = "";
    }

}
