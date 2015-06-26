<?php
	
	class Pizza
	{
		private $_foreName;
		private $_surName;
		private $_address;
		private $_city;
		private $_postal;
		private $_province;
		private $_telephone;
		private $_email;
		private $_numberOfPizza;
		private $_sizeOfPizza;
		private $_typeOfCrust;
		private $_toppings;
		
		
		public function __construct($forename, $surname, $address, $city, $postalcode, $province, $phone, $email, $numberOfPizza, $sizeOfPizza, $crust, $toppings)
		{
			$this->_foreName = $forename;
			$this->_surName = $surname;
			$this->_address = $address;
			$this->_city = $city;
			$this->_postal = $postalcode;
			$this->_province = $province;
			$this->_telephone = $phone;
			$this->_email = $email;
			$this->_numberOfPizza = $numberOfPizza;
			$this->_sizeOfPizza = $sizeOfPizza;
			$this->_typeOfCrust = $crust;
			$this->_toppings = $toppings;
		}
		
		public function setForeName($value) {
			$v = trim($value);
			$this->_foreName = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getForeName() {
			return $this->_foreName;
		}
		
		public function setSurName($value) {
			$v = trim($value);
			$this->_surName = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getSurName() {
			return $this->_surName;
		}
		
		public function setAddress($value) {
			$v = trim($value);
			$this->_address = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getAddress() {
			return $this->_address;
		}
		
		public function setCity($value) {
			$v = trim($value);
			$this->_city = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getCity() {
			return $this->_city;
		}
		
		public function setPostal($value) {
			$v = trim($value);
			$this->_postal = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getPostal() {
			return $this->_postal;
		}
		
		public function setProvince($value) {
			$v = trim($value);
			$this->_province = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getProvince() {
			return $this->_province;
		}
		
		public function setTelephone($value) {
			$v = trim($value);
			$this->_telephone = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getTelephone() {
			return $this->_telephone;
		}
		
		public function setEmail($value) {
			$v = trim($value);
			$this->_email = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getEmail() {
			return $this->_email;
		}
		
		public function setNumberOfPizza($value) {
			$v = trim($value);
			$this->_numberOfPizza = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getNumberOfPizza() {
			return $this->_numberOfPizza;
		}
		
		public function setSizeOfPizza($value) {
			$v = trim($value);
			$this->_sizzaOfPizza = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getSizeOfPizza() {
			return $this->_sizeOfPizza;
		}
		
		public function setTypeOfCrust($value) {
			$v = trim($value);
			$this->_typeOfCrust = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getTypeOfCrust() {
			return $this->_typeOfCrust;
		}
		
		public function setToppings($value) {
			$v = trim($value);
			$this->_toppings = empty($v) ? null : $v;
			return $this;
		}
	 
		public function getToppings() {
			return $this->_toppings;
		}
		
	}
	
?>