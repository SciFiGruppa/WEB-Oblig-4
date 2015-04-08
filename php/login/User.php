<?php
    require_once '../connect.php';
    require_once '../constants.php';
    class User {
        private $_username,
                $_password,
                $db;

        /**
         * Simple constructor method of the User object
         * @param string $username Username of a user
         * @param string $password Password of a user
         */
        public function __construct ($username, $password) {
            $db = new DatabaseConnector();
            $this->db = $db->getDBLink();
            $this->_username = $username;
            $this->_password = $password;
        }

        /**
         * Frees up memory when the class is no longer in use
         */
        public function __destruct () {
            $this->db->close();
        }

        /**
         * This function checks if a user can authenticate based on parameters passed in constructor
         * @return int Function returns 0 the user does not exist,
         *                              1 if the password is wrong,
         *                              2 if the user is authenticated
         */
        public function check () {
            if ($this->userExists()) {
                if ($this->checkPassword()) {
                    return 2;
                }
                return 1;
            }
            return 0;
        }

        /**
         * This function creates a user based on parameters passed in constructor
         * @return int Function returns 0 if the user exists,
         *                              1 if the user was not created (due to some error)
         *                              2 if the user is created
         */
        public function create () {
            if (!$this->userExists()) {

                $password = $this->createHash($this->_password);
                $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);

                $stmt->bind_param("ss", $this->_username, $password);
                $stmt->execute();
                $stmt->close();

                if ($this->userExists()) {
                    return 2;
                }
                return 1;
            }
            return 0;
        }

        /**
         * Private method to check if a user exists
         * @return boolean Function returns true if the user exists,
         *                                  false if the user does not exist
         */
        private function userExists () {
            $sql = "SELECT username FROM users WHERE username = ?";
            $stmt = $this->db->prepare($sql);

            $stmt->bind_param("s", $this->_username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                return true;
            }
            return false;
        }

        /**
         * Private function to check a users password
         * @return boolean Function returns true if the password is verified,
         *                                  false if it's not
         */
        private function checkPassword () {
            $sql = "SELECT password FROM users WHERE username = ?";
            $stmt = $this->db->prepare($sql);

            $stmt->bind_param("s", $this->_username);
            $stmt->execute();
            $stmt->bind_result($hash);
            $stmt->fetch();
            $stmt->close();

            if (password_verify($this->_password, $hash)) {
                return true;
            }
            return false;
        }

        /**
         * Private helper function that creates a hash based on parameter password passed in constructor
         * @return string Function creates a hash of a password with random salt embedded
         */
        private function createHash ($string) {
            return password_hash($string, PASSWORD_BCRYPT);
        }
    }