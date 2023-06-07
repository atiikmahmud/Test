<?php

    namespace App\PaymentGateway;

    class PaymentFacade{

        protected static function getFacadeAcessor()
        {
            return "payment";
        }

    }