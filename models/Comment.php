<?php


namespace models;


class Comment
{

    private $comId,
            $comDate,
            $comAuthor,
            $comContent,
            $comReported,
            $ticketId;


    /**
     * Comment constructor.
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
    public function getComId()
    {
        return $this->comId;
    }

    /**
     * @param mixed $comId
     */
    public function setComId($comId)
    {
        $this->comId = $comId;
    }

    /**
     * @return mixed
     */
    public function getComDate()
    {
        return $this->comDate;
    }

    /**
     * @param mixed $comDate
     */
    public function setComDate($comDate)
    {
        $this->comDate = $comDate;
    }

    /**
     * @return mixed
     */
    public function getComAuthor()
    {
        return $this->comAuthor;
    }

    /**
     * @param mixed $comAuthor
     */
    public function setComAuthor($comAuthor)
    {

        $this->comAuthor = $comAuthor;
    }

    /**
     * @return mixed
     */
    public function getComContent()
    {
        return $this->comContent;
    }

    /**
     * @param mixed $comContent
     */
    public function setComContent($comContent)
    {
        $this->comContent = $comContent;
    }

    /**
     * @return mixed
     */
    public function getComReported()
    {
        return $this->comReported;
    }

    /**
     * @param mixed $comReported
     */
    public function setComReported($comReported)
    {
        $this->comReported = $comReported;
    }

    /**
     * @return mixed
     */
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * @param mixed $ticketId
     */
    public function setTicketId($ticketId)
    {
        $this->ticketId = $ticketId;
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