<?php
    
    namespace App\Traits;

    trait FlashMessages
    {
        protected $errorMessages = [];

        protected $infoMessages = [];

        protected $successMessages = [];

        protected $warningMessages = [];

        protected function setFlashMessage($message,$type)
        {
            $model = 'infoMessages';

            switch($type)
            {
                case 'info':
                    {
                        $model = 'infoMessages';
                    } break;

                case 'error':
                    {
                        $model = 'errorMessage';
                    } break;
                
                case 'success':
                    {
                        $model = 'successMessage';
                    } break;
                case 'warning':
                    {
                        $model = 'warningMessage';
                    } break;
                
                if(is_array($message)) 
                {
                    foreach($message as $key => $value)
                    {
                        array_push($this->model,$value);
                    }
                }else{
                    array_push($this->model,$message);
                }
                
            }
        }

        protected function getFlashMessage()
        {
            return[
                'error' => $this->errorMessage,
                'info' => $this->infoMessage,
                'success' => $this->successMessage,
                'danger' => $this->dangerMessage
            ];
        }

        //flushing messages to laravel's session
        protected function showFlashMessages()
        {
            session()->flash('error',$this->errorMessages);
            session()->flash('success',$this->successMessages);
            session()->flash('danger',$this->dangerMessages);
            session()->flash('warning',$this->warningMessages);
        }
    }