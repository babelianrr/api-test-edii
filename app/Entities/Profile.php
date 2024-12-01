<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Profile extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    
    protected $attributes = [
        'name' => null,
        'gender' => null,
        'address' => null,
    ];

    public function setName(string $name): self
    {
        $this->attributes['name'] = $name;
        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->attributes['gender'] = $gender;
        return $this;
    }

    public function setAddress(string $address): self
    {
        $this->attributes['address'] = $address;
        return $this;
    }
}
