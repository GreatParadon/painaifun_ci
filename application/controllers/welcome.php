<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Welcome extends MY_Controller {

        public function __construct()
        {
                parent::__construct();
        }

        public function test()
        {
            $this->index();
        }
}
