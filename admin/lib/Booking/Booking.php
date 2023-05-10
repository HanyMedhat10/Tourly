<?php
class Booking
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
            'CustomerID' => 'CustomerID',
            'checkin' => 'Check In',
            'checkOut' => 'Check Out',
            'HotelID' => 'HotelID'
        ];

        return $ordering;
    }
}
?>