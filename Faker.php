<?php

    class Faker {

        private static $array_name = [
            ["josé", "Pedro", "Raúl","Alan", "Carlos", "Emanuel", "Emilio", "Joaquin", "Job", "Josh", "Jhon"],
            ["María", "Luisa", "Adriana", "Angela", "Eliza", "Carol", "Ruth", "Berta", "Emperatriz", "Elizabeth", "Eunice", "Josabel"]
        ];

        private static $array_lastname = ["pérez", "rodriguez", "hernández", "martínez", "molina", "garcía", "marín", "sánchez", "smith", "rivera", "alderson"];
        private static $array_address = ["50 Manhattan Dr. Laurel, MD 20707", "93 Goldfield Dr. Xenia, OH 45385"];
        private static $emailDomanin = ['gmail.com', 'hotmail.com', 'outlook.com', 'hotmail.es'];

        public static $status = NULL;
        public static $gender = '';
        public static $name = '';
        public static $lastname = '';
        public static $lastname2 = '';
        public static $address = '';
        public static $identification = '';
        public static $email = '';
        public static $phone = '';
        public static $movil = '';

        public function __construct($debug = false)
        {

            self::$status = rand(0,1);
            self::$gender = rand(0,1);
            self::$name = ucfirst(self::$array_name[self::$gender][array_rand(self::$array_name[self::$gender])]);
            self::$lastname = ucfirst(self::$array_lastname[array_rand(self::$array_lastname)]);
            self::$lastname2 = ucfirst(self::$array_lastname[array_rand(self::$array_lastname)]);
            self::$address = ucfirst(self::$array_address[array_rand(self::$array_address)]);
            self::$identification = '001'.self::randomNum(8);
            self::$email = self::Email();
            self::$phone = '8'.rand(0,2).'9'.self::randomNum(7);
            self::$movil = '18'.rand(0,2).'9'.self::randomNum(7);

            if($debug){
                $this->Debug();
            }
        }

        private static function Email(){
            $chars = array(
                'Á'=>'a', 'á'=>'a', 'É'=>'e', 'é'=>'e', 'Í' => 'i', 'í'=>'i', 'Ó'=>'o', 'ó'=>'o', 'Ú' => 'u', 'ú'=>'u'
            );
            //$arg = self::$nombres[array_rand(self::$nombres)].'.'.self::$apellidos[array_rand(self::$apellidos)];
            $arg = self::$name.'.'.self::$lastname;
            $arg = strtolower(strtr($arg, $chars));
            $arg = $arg.'@'.self::$emailDomanin[array_rand(self::$emailDomanin)];
            //$arg = $arg.'@'.$dm;
            return $arg;
        }

        private static function randomNum($length = 10){
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $key = '';
            for ($i = 0; $i < $length; $i++) {
                $key .= $characters[rand(0, $charactersLength - 1)];
            }

            return $key;
        }

        private function Debug(){
            echo '__________Start Faker Person Select__________';
            echo '<br>';
            echo 'Gender set: '. ((self::$gender) ? 'Male': 'Female').'<br>';
            echo 'Name set: '. self::$name.'<br>';
            echo 'Lastname set: '. self::$lastname.'<br>';
            echo 'Lastname2 set: '. self::$lastname2.'<br>';
            echo 'Identification set: '. self::$identification.'<br>';
            echo 'Email set: '. self::$email.'<br>';
            echo 'Phone set: '. self::$phone.'<br>';
            echo 'Movil set: '. self::$movil.'<br>';
            echo '<br>';
            echo 'Array Names: ';
            echo '<br>';
            print_r(self::$array_name[self::$gender]);
            echo 'Array Lastname: ';
            print_r(self::$array_lastname);
            echo '<br>';
            echo '__________End Faker Person Select__________';

        }

    }

?>