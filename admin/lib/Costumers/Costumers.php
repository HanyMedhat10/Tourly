<?php
class Costumers
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'ID' => 'ID',
            'username' => 'Name',
            'email' => 'Email',
            'NoOfGuest' => 'Number Of Guest',
            'phone' => 'Phone'
        ];

        return $ordering;
    }
}
?>
