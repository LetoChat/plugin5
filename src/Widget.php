<?php

    namespace LetoChat;
	
	use Exception;
	
    class Widget {

        protected $channelId;
        protected $channelSecret;

        private $info 	= [];
		private $custom = [];
        private $events = [];

		private $availableInfos = [
			'id', 'name', 'avatar', 
			'email', 'phone',
			'company_name', 'company_position', 
		];
		
        public function __construct( $channelId, $channelSecret = null ){

            $this->channelId = $channelId;
            $this->channelSecret = $channelSecret;

        }

        public function info( $name, $value ){

			// checks
			if( ! is_string($name) )
				throw new Exception('Invalid value type for provided info. Info name must be string type.');
			
			if( in_array($name, ['custom']) )
				throw new Exception('You can not add `custom` info. If you want to add a custom info use instead Widget::custom');
			
			if( in_array($name, ['event', 'events']) )
				throw new Exception('You can not add `event` info. If you want to add an event use instead Widget::event');
			
			$name = strtolower($name);
			
			if( ! in_array($name, $this->availableInfos) )
				throw new Exception('Invalid info `'.$name.'`. Info must one of: '.implode(', ', $this->availableInfos).'.');
		
			if( ! is_string($value) && ! is_numeric($value) && ! is_bool($value) )
				throw new Exception('Invalid value type for `'.$name.'`. Value must be string, numeric or boolean.');
		
			// done
			$this->info[ $name ] = $value;

            return $this;

        }

        public function infos( $infos ){

			if( ! is_array($infos) )
				throw new Exception('If you want to add infos, you have to provide as array');
		
			foreach($infos as $n => $v){
				try{
					$this->info($n, $v);
				} catch (Exception $e ){
					throw $e;
				}
			}
		
            return $this;

        }

        private function getInfo( $name ){

            return isset($this->info[ $name ]) ? $this->info[ $name ] : null;

        }

        public function getInfos(){

            return $this->info;

        }

		
		public function custom(){


            return $this;

        }
		
		public function getCustom(){

            return $this->custom;

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

            $script = 'console.log("LetoChat is Loaded");';

            if( $includeScriptTag )
                $script = '<script>'.$script.'</script>';

            return $script;

        }

    }