<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeacherRepository")
 */
class Teacher extends User
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $teacherField;

    public function getTeacherField(): ?string
    {
        return $this->teacherField;
    }

    public function setTeacherField(string $teacherField): self
    {
        $this->teacherField = $teacherField;

        return $this;
    }
}
