<?php

class CustomerModel
{
    public $customermodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/customers.php';
        $this->customermodel = new CustomerModelxl();
    }

     /**
     * Get all customers from database
     */
    public function getAllCustomers()
    {
        return $this->customermodel->getAllCustomers();
    }

    /**
     * Add a customer to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode)
    {
        
        $parameters = array(':firstname' => $firstname, 
            ':lastname' => $lastname, 
            ':email' => $email, 
            ':password' => $password, 
            ':phone' => $phone, 
            ':street' => $street, 
            ':city' => $city, 
            ':zipcode' => $zipcode );
        return $this->customermodel->addCustomer($parameters);
    }

    /**
     * Delete a customer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $customer_id Id of customer
     */
    public function deleteCustomer($customer_id)
    {
        $parameters = array(':customer_id' => $customer_id);
        return $this->customermodel->deleteCustomer($parameters);
    }

    /**
     * Get a customer from database
     */
    public function getCustomer($customer_id)
    {
        $parameters = array(':customer_id' => $customer_id);
        return $this->customermodel->getCustomer($parameters);
    }

    /**
     * Update a customer in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $customer_id Id
     */
    public function updateCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode, $customer_id)
    {
        $parameters = array(':firstname' => $firstname, 
            ':lastname' => $lastname, 
            ':email' => $email,
            ':password' => $password, 
            ':phone' => $phone, 
            ':street' => $street, 
            ':city' => $city, 
            ':zipcode' => $zipcode, 
            ':customer_id' => $customer_id);
        return $this->customermodel->updateCustomer($parameters);
    }
    
    public function getAmountOfCustomers()
    {
        return $this->customermodel->getAmountOfCustomers();
    }
    
    public function signinCustomer($email, $password)
    {
        $parameters = array(':email' => $email, ':password' => $password );
        return $this->customermodel->signinCustomer($parameters);
    }

}
