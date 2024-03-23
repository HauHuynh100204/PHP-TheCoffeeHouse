<?php
	class connect {
		//Thuộc tính
		//Hàm tạo được gọi khi tạo 1 đối tượng
		public function __construct() {
			//Kết nối với database thecoffeehouse
			$dsn = 'mysql:host=localhost;dbname=thecoffeehouse';	
			// có user 
			$user = 'root';
			$pass = ''; // Nếu xài xampp và wampp thì bỏ trống còn xài manpp thì là root

			// Kiểm tra kết nối với database 
			try {
				$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
				// echo 'Kết nối thành công';
			} catch(\Throwable $th) {
				//Throw $th;
				echo "Kết nối thất bại";
			}
		}


		// Phương thức lấy về nhiều row hay 1 table 
		// query là để thực hiện câu lệnh select 
		function getList($select) // select * from hanghoa
		{
			$result = $this->db->query($select);
			return $result;
		}

		// Phương thức chỉ lấy về 1 row 
		function getInstance($select) {
			$result = $this->db->query($select);
			// Nhưng do chỉ lấy 1 row nên thực hiện fetch dữ liệu luôn 
			$result = $result->fetch();
			return $result;
		}

		// Để thực hiện câu lệnh insert, delete và update thì exec làm 
		function exec ($query) {
			$result = $this->db->exec($query);
			return $result;
		}

		// Để dữ liệu an toàn prepare 
		function execp($query) {
			$statement = $this->db->prepare($query);
			return $statement;
		}
	}
?>