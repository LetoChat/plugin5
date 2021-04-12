<?php

    namespace LetoChat;

    class Widget {

        protected $channelId;
        protected $channelSecret;

        private $info = [];
        private $events = [];

        public function __construct( $channelId, $channelSecret = null ){

            $this->channelId = $channelId;
            $this->channelSecret = $channelSecret;

        }

        public function info( $name, $value ){


            return $this;

        }

        public function infos(){

            return $this;

        }

        private function getInfo( $name ){

            return isset($this->info[ $name ]) ? $this->info[ $name ] : null;

        }

        public function getInfos(){

            return $this->info;

        }

        public function event(){


            return $this;

        }

        public function getEvent( $name ){

            return isset($this->events[ $name ]) ? $this->events[ $name ] : null;

        }

        public function getEvents(){

            return $this->events;

        }

        public function build( $includeScriptTag = true ){

            $script = '';


            return $script;

        }

    }