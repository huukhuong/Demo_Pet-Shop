<?php
/*
    Cách sử dụng:
    B1: Đưa vào đầu trang lệnh: 
                            require('connection_lib.php');
    B2: Tạo mới đối tượng: 
                            $connect = new Connection();
    B3: Thực hiện lệnh qua biến $sql || INSERT, DELETE, UPDATE như nhau
                            vd: DELETE:
                            $sql = "DELETE * FROM taikhoan WHERE TenDangNhap='username'";
                            $connect->execute($sql);
    ===============LƯU Ý: Tên bảng viết thường===============
*/
class Connection
{
    public $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $HOST = "localhost";
        $USERNAME = "root";
        $PASSWORD = "";
        $DB_NAME = "web2_nhom2";

        $this->conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB_NAME);
        $this->conn-> set_charset("utf8");

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getList($sql) {
        $return = array();
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            return $return; // câu truy vấn bị sai
        }

        $num_row = mysqli_num_rows($result); // lấy ra số dòng truy vấn được
        if ($num_row > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $return[] = $row;
            }
        }

        // xoá kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        return $return;
    }

    function executeResult($sql) {
        //save data into table
        // open connection to database
        $con = mysqli_connect("localhost", "root", "", "web2_nhom2");
        //insert, update, delete
        $result = mysqli_query($con, $sql);
        $data   = [];
    
        if ($result != null) {
            while ($row = mysqli_fetch_array($result, 1)) {
                $data[] = $row;
            }
        }
    
        //close connection
        mysqli_close($con);
    
        return $data;
    }

    public function getRow($query) {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            return false; // câu truy vấn bị sai
        }

        $row = mysqli_fetch_array($result);

        if ($row) {
            return $row;
        }

        // xoá kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        return false;
    }

    public function execute($sql) {
        return mysqli_query($this->conn, $sql);
    }

    public function closeConnect() {
        // đóng kết nối
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}
