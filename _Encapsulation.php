<?php

class User
{

    private $gender;

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        if ('male' !== $gender and 'female' !== $gender) {
            throw new \Exception('Set male or female for gender');
        }

        $this->gender = $gender;
    }
}

$user = new User();
$user->setGender('male');
$user->setGender('Y');

?>