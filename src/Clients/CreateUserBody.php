<?php

namespace Trilobyte\Xilnex\Clients;

class CreateUserBody
{
    public $name;
    public $email;
    public $type; //VIP / FREE / CORPORATE
    public $group; //Retail / Corporate
    public $gender;
    public $dob; //1975-07-09T00:00:00.000Z
    public $mobile;
    public $category; //Personal
    public $createdOutlet;

    //Update only
    public $enableDOB;
}
