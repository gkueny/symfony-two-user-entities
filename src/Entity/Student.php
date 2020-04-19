<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student extends User
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $studentField;

    public function getStudentField(): ?string
    {
        return $this->studentField;
    }

    public function setStudentField(string $studentField): self
    {
        $this->studentField = $studentField;

        return $this;
    }
}
