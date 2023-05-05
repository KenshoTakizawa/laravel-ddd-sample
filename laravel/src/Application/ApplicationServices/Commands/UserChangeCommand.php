<?php

namespace Src\Application\ApplicationServices\Commands;

class UserChangeCommand
{
    private string $name;
    private string $email;
    private bool $premier;

    public function __construct(string $name, string $email, bool $premier)
    {
        $this->name = $name;
        $this->email = $email;
        $this->premier = $premier;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isPremier(): bool
    {
        return $this->premier;
    }

    /**
     * @param bool $premier
     */
    public function setPremier(bool $premier): void
    {
        $this->premier = $premier;
    }
}
