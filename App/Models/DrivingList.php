<?php

namespace App\Models;

class drivingList extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public int $userID = 0,
        public ?string $pohlavie = null,
        public ?string $datum = null,
        public ?string $tank = null,
        public int $strelba = 0,
        public int $cas = 0,
        public int $demolition = 0,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id','userID','pohlavie', 'datum','tank','strelba','cas','demolition'];
    }

    static public function setTableName()
    {
        return "drivinglist";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserID(): int
    {
        return $this->userID;
    }

    /**
     * @param int $userID
     */
    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return string|null
     */
    public function getPohlavie(): ?string
    {
        return $this->pohlavie;
    }

    /**
     * @param string|null $pohlavie
     */
    public function setPohlavie(?string $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    /**
     * @return string|null
     */
    public function getDatum(): ?string
    {
        return $this->datum;
    }

    /**
     * @param string|null $datum
     */
    public function setDatum(?string $datum): void
    {
        $this->datum = $datum;
    }



    /**
     * @return string|null
     */
    public function getTank(): ?string
    {
        return $this->tank;
    }

    /**
     * @param string|null $tank
     */
    public function setTank(?string $tank): void
    {
        $this->tank = $tank;
    }

    /**
     * @return int
     */
    public function getStrelba(): int
    {
        return $this->strelba;
    }

    /**
     * @param int $strelba
     */
    public function setStrelba(int $strelba): void
    {
        $this->strelba = $strelba;
    }

    /**
     * @return int
     */
    public function getCas(): int
    {
        return $this->cas;
    }

    /**
     * @param int $cas
     */
    public function setCas(int $cas): void
    {
        $this->cas = $cas;
    }

    /**
     * @return int
     */
    public function getDemolition(): int
    {
        return $this->demolition;
    }

    /**
     * @param int $demolition
     */
    public function setDemolition(int $demolition): void
    {
        $this->demolition = $demolition;
    }

}