<?php
class Hotel
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
            'HotelID' => 'HotelID',
            'name' => 'Name',
            'address' => 'Address',
            'NoOfRooms' => 'Number Of Rooms',
            'docs' => 'Description'
        ];

        return $ordering;
    }
}
?>
