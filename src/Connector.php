<?php

    namespace LetoChat;

    class Connector {

        private $url = 'https://api.letochat.com';

        private $widget;

        public function __construct( $widget ){

            $this->widget = $widget;

        }

        /**
         * check if we can connect to LetoChat platform
         */
        public function check(){

        }

        /**
         * connect 
         */
        public function connect(){

        }

    }