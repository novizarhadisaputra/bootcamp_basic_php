<!DOCTYPE html>
<html>

<body>

    <?php

    class Cart
    {
        public $name;

        // construct adalah fungsi yg pertama kali dibaca pada class
        function __construct($title)
        {
            $this->name = $title;
        }

        function getQty()
        {
            return '1';
        }

        function getNameProduct()
        {

            return "Product Name : " . $this->name;
        }

        function resultCart()
        {
            return 'Anda telah membeli ' . $this->getNameProduct() . ' dengan qty :' . $this->getQty();
        }
    }

    class Auth
    {
        private $email;
        private $password;

        // construct adalah fungsi yg pertama kali dibaca pada class
        function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }

        function login()
        {
            if($this->email == 'masburhan@gmail.com' && $this->password == '123456') {
                return 'Berhasil Login';
            } else {
                return 'Gagal Login';
            }
        }
    }

    class Security extends Auth {
        
    }

    function login($email, $password) {
        if($email == 'masburhan@gmail.com' && $password == '123456') {
            return 'Berhasil Login';
        } else {
            return 'Gagal Login';
        }
    }

    $email = 'masburhan@gmail.com';
    $password = '123456';

    $auth = new Auth($email, $password);
    
    echo login($email, $password);;

    ?>

</body>

</html>