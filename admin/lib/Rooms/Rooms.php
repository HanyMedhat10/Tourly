<?php
class Rooms
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
            'RoomID' => 'RoomID',
            'typeRoom' => 'Type Room',
            'price' => 'price',
            'NoOfBeds' => 'Number Of Beds',
            'HotelID' => 'HotelID'
        ];

        return $ordering;
    }
}
?>
