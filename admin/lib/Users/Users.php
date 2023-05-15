<?php
class Users
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
            'username' => 'User Name',
            'password' => 'Password',
            'admin_type' => 'Admin Type'
        ];

        return $ordering;
    }
}
?>
