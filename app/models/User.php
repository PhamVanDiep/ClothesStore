<?php

class User {
<<<<<<< HEAD
    private $username;
    private $password;
    private $name;
    private $address;
    private $telephone;

    public function __construct($username, $password, $name, $address, $telephone) {
        self::setUsername($username);
        self::setPassword($password);
        self::setName($name);
        self::setAddress($address);
        self::setTelephone($telephone);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
}
=======
    private $userID;
    private $name;
    private $username;
    private $email;
    private $phoneNumber;
    private $gender;
    private $password;
    private $address;
    private $roleID;
    private $urlAvatar;
    private $googleId;

    public function __construct($userID, $name, $username, $email, $phoneNumber, $gender, $password, $address, $roleID, $urlAvatar, $googleId) {
        self::setUserID($userID);
        self::setName($name);
        self::setUsername($username);
        self::setEmail($email);
        self::setPhoneNumner($phoneNumber);
        self::setGender($gender);
        self::setPassword($password);
        self::setAddress($address);
        self::setRoleID($roleID);
        self::setUrlAvatar($urlAvatar);
        self::setGoogleId($googleId);
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumner($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getRoleID() {
        return $this->roleID;
    }

    public function setRoleID($roleID) {
        $this->roleID = $roleID;
    }

    public function getUrlAvatar() {
        return $this->urlAvatar;
    }

    public function setUrlAvatar($urlAvatar) {
        $this->urlAvatar = $urlAvatar;
    }

    public function getGoogleId() {
        return $this->googleId;
    }

    public function setGoogleId($googleId) {
        $this->googleId = $googleId;
    }
}
>>>>>>> master
