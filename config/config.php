<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Config
{
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "product";
    private $MOVIETABLE = "movie";
    private $INDUSTRYTABLE = "movie_industry";
    private $LANGUAGETABLE = "movie_language";
    private $VIEWTABLE = "view_type";
    private $SEATTABLE = "seats";
    private $PRICETABLE = "ticket_price";
    // private $USERS_TABLE = "users";
    // private $CATEGORIES_TABLE = "categories";
    // private $SUBCATEGORIES_TABLE = "subcategories";
    public $conn;

    public function connect()
    {
        $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        return $this->conn; // bool
    }

    public function insert_industry($industry_name,)
    {
        $this->connect();

        $query = "INSERT INTO $this->INDUSTRYTABLE(industry_name) VALUES('$industry_name');";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }

    public function insert_language($language_name,)
    {
        $this->connect();

        $query = "INSERT INTO $this->LANGUAGETABLE(language) VALUES('$language_name');";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }
    public function insert_viewtype($type,)
    {
        $this->connect();

        $query = "INSERT INTO $this->VIEWTABLE(type) VALUES('$type');";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }

    public function insert_seat($seat,)
    {
        $this->connect();

        $query = "INSERT INTO $this->SEATTABLE(type) VALUES('$seat');";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }
    public function insert_price($price,)
    {
        $this->connect();

        $query = "INSERT INTO $this->PRICETABLE(type) VALUES('$price');";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }


    public function insert_movie($name, $ind_id, $lang_id, $view_id, $seat_id, $price_id)
    {
        $this->connect();

        $query = "INSERT INTO $this->MOVIETABLE(name, ind_id, lang_id, view_id,seat_id,price_id) VALUES('$name', $ind_id, $lang_id, $view_id,$seat_id,$price_id);";

        $res = mysqli_query($this->conn, $query);

        return $res;  // bool
    }
    public function fetch_all_movie()
    {
        $this->connect();

        $query = "SELECT * FROM $this->MOVIETABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }

    public function fetch_all_industry()
    {
        $this->connect();

        $query = "SELECT * FROM $this->INDUSTRYTABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }
    public function fetch_all_language()
    {
        $this->connect();

        $query = "SELECT * FROM $this->LANGUAGETABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }


    public function fetch_all_viewtype()
    {
        $this->connect();

        $query = "SELECT * FROM $this->VIEWTABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }

    public function fetch_all_seat()
    {
        $this->connect();

        $query = "SELECT * FROM $this->SEATTABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }

    public function fetch_all_price()
    {
        $this->connect();

        $query = "SELECT * FROM $this->PRICETABLE;";

        $res = mysqli_query($this->conn, $query);

        return $res;   // object of mysqli_result class
    }

    public function delete_movie($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->MOVIETABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }

    public function delete_industry($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->INDUSTRYTABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }

    public function delete_language($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->LANGUAGETABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }

    public function delete_view_type($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->VIEWTABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }
    public function delete_seat($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->SEATTABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }

    public function delete_price($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->PRICETABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;  // total no. of deleted records
    }


    public function fetch_single_movie($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->MOVIETABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_industry($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->INDUSTRYTABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_language($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->LANGUAGETABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetch_single_viewtype($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->VIEWTABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_seat($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->SEATTABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_price($id)
    {
        $this->connect();

        $query = "SELECT * FROM $this->PRICETABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update_movie($name, $ind_id, $lang_id, $view_id, $seat_id, $price_id, $id)
    {
        $this->connect();

        $query = "UPDATE $this->MOVIETABLE SET name='$name', ind_id=$ind_id, lang_id=$lang_id, view_id=$view_id,seat_id=$seat_id,price_id= $price_id WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    public function update_industry($industry_name, $id)
    {
        $this->connect();

        $query = "UPDATE $this->INDUSTRYTABLE SET industry_name='$industry_name', WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    public function update_language($language, $id)
    {
        $this->connect();

        $query = "UPDATE $this->LANGUAGETABLE SET language='$language', WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    public function update_view($type, $id)
    {
        $this->connect();

        $query = "UPDATE $this->VIEWTABLE SET type='$type', WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    public function update_seat($seat, $id)
    {
        $this->connect();

        $query = "UPDATE $this->SEATTABLE SET seat=$seat, WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    public function update_price($price, $id)
    {
        $this->connect();

        $query = "UPDATE $this->PRICETABLE SET price=$price, WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;  // total no. of updated records
    }

    // public function signup_user($username, $email, $password) {
    //     $this->connect();

    //     // password_hash(raw_password, algo);     algo => PASSWORD_DEFAULT

    //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //     $query = "INSERT INTO $this->USERS_TABLE(username, email, password) VALUES('$username', '$email', '$hashed_password');";

    //     $res = mysqli_query($this->conn, $query);

    //     return $res;        
    // }

    // public function signin_user($username, $password) {
    //     $this->connect();

    //     $query = "SELECT * FROM $this->USERS_TABLE WHERE username='$username';";

    //     $res = mysqli_query($this->conn, $query);  // obj of mysqli_result class

    //     $record = mysqli_fetch_assoc($res);

    //     if($record) {

    //         // password_verify(raw_password, hashed_password);   => return bool

    //         $isVerified = password_verify($password, $record['password']);

    //         return $isVerified;  // true or false

    //     } else {
    //         return false;
    //     }
    // }

    // public function add_category($name) {
    //     $this->connect();

    //     $query = "INSERT INTO $this->CATEGORIES_TABLE(name) VALUES('$name');";

    //     $res = mysqli_query($this->conn, $query);

    //     return $res;
    // }

    // public function add_subcategory($name, $cat_id) {
    //     $this->connect();

    //     $qs = "SELECT * FROM $this->CATEGORIES_TABLE WHERE id=$cat_id";

    //     $obj = mysqli_query($this->conn, $qs);

    //     $record = mysqli_fetch_assoc($obj);

    //     if($record) {
    //         $query = "INSERT INTO $this->SUBCATEGORIES_TABLE(name, cat_id) VALUES('$name', $cat_id);";

    //         $res = mysqli_query($this->conn, $query);

    //         return $res;        
    //     } else {
    //         return false;
    //     }

    // }

}
