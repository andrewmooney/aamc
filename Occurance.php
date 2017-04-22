<?php 

    class Occurance {
        
        protected $data;
        protected $regex;
        protected $e_regex;
        protected $occurs = 0;

        public function __construct($data, $regex) {
            $this->data    = $data;
            $this->regex   = $regex;
            $this->e_regex = $this->escape_rgx($regex);
            $this->occurs  = $this->find_occurances();
        }

        /**
            Escape special characters (/).
        */
        protected function escape_rgx($regex) {
            if (strpos($regex, '/') !== false) {
                return preg_quote($regex, '/');
            }
            return $regex;
        }

        /**
            Find the number of occurances of given regex (escaped)
        */
        protected function find_occurances() {
            return preg_match_all("/$this->e_regex/i", $this->data);
        }

        /**
            Generate human readable output
        */ 
        protected function set_output() {
            if ($this->regex == "(\r|\n|\s)([a-z]){3}([0-9]){3}") {
                return "XXXDDD";
            }
            return $this->regex;
        }

        public function __toString() {
            $output = $this->set_output();
            return str_pad($output, 12) . "| $this->occurs occurances \n";
        }
    }