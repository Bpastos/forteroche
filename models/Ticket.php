<?php


namespace models;


class Ticket
{

    private $tickId,
            $tickDate,
            $tickTitle,
            $tickContent;

    /**
     * Ticket constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @return mixed
     */
    public function getTickId()
    {
        return $this->tickId;
    }

    /**
     * @param mixed $tickId
     */
    public function setTickId($tickId)
    {
        $this->tickId = $tickId;
    }

    /**
     * @return mixed
     */
    public function getTickDate()
    {
        return $this->tickDate;
    }

    /**
     * @param mixed $tickDate
     */
    public function setTickDate($tickDate)
    {
        $this->tickDate = $tickDate;
    }

    /**
     * @return mixed
     */
    public function getTickTitle()
    {
        return $this->tickTitle;
    }

    /**
     * @param mixed $tickTitle
     */
    public function setTickTitle($tickTitle)
    {
        $this->tickTitle = $tickTitle;
    }

    /**
     * @return mixed
     */
    public function getTickContent()
    {
        return $this->tickContent;
    }

    /**
     * @param mixed $tickContent
     */
    public function setTickContent($tickContent)
    {
        $this->tickContent = $tickContent;
    }

    /**
     * @param $data
     */
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $key = strtolower($key);
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


}