<?php

namespace Trilobyte\Xilnex\Sales;

class SalesSearchPayload
{
    public $clientid;
    public $datefrom; //ISO-8601 2022-02-21T00:00:00.000Z
    public $dateto; //ISO-8601 2022-02-21T00:00:00.000Z
    public $locationid;
    public $salestype;
    public $outlet;
    public $status;
    public $externalrefid;
    public $salesPerson;
    public $isPrint;
    public $orderSource;
    public $salesno;
    public $sort;
    public $simplify;
    public $limit;
    public $offset;
    public $customfield1;
    public $customfield2;
    public $customfield3;
    public $customfield4;
    public $customfield5;
    public $paymentstatus;
    public $disableDateFilter;
    public $showPointsEarned;
}
