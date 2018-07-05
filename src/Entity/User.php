<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use App\Entity\Roles;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="Roles", inversedBy="users")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $role;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active): void
    {
        $this->active = $active;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }


    /* METODOS NECESARIOS PARA IMPLEMENTAR 'AdvancedUserInterface */
    public function getUsername(): ?string
    {
        return $this->email;
    }

    public function setUsername(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles()
    {
        return array($this->role->getName());
    }

    public function setRoles($role): void
    {
        $this->role = $role;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->active;
    }

    public function serialize()
    {
        return serialize(
            array(
                $this->id,
                $this->email,
                $this->name,
                $this->password,
                $this->active,
            )
        );
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->name,
            $this->password,
            $this->active,
            ) = unserialize($serialized);
    }
    /* FIN METODOS NECESARIOS PARA IMPLEMENTAR 'AdvancedUserInterface */
}
