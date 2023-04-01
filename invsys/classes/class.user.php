<?php
class User{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_user($email,$password,$lname,$fname, $position, $contact_no, $DOB){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$lname,$fname,$email,$password,$NOW,$NOW,'1', $position, $contact_no, $DOB],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_user (lname, fname, user_email, user_password, date_added, time_added, user_status, position, contact_no, DOB) VALUES (?,?,?,?,?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_user($lname,$fname, $position, $id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_user SET fname=:fname,lname=:lname,date_updated=:date_updated,time_updated=:time_updated,position=:position WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':fname'=>$fname, ':lname'=>$lname,':date_updated'=>$NOW,':time_updated'=>$NOW,':position'=>$position,':user_id'=>$id));
		return true;
	}

	public function change_user_status($id,$status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_user SET user_status=:user_status,date_updated=:date_updated,time_updated=:time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_status'=>$status,':date_updated'=>$NOW,':time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}

	public function change_email($id,$email){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_user SET user_email=:user_email,date_updated=:date_updated,time_updated=:time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_email'=>$email,':date_updated'=>$NOW,':time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}
	
	public function change_user_contactno($id,$contact_no){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_user SET contact_no=:contact_no,date_updated=:date_updated,time_updated=:time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':contact_no'=>$contact_no,':date_updated'=>$NOW,':time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}
	
	public function change_password($id,$password){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_user SET user_password=:user_password,date_updated=:date_updated,time_updated=:time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_password'=>$password,':date_updated'=>$NOW,':time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}
	
	public function list_users(){
		$sql="SELECT * FROM tbl_user";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		  $data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

	function get_user_id($email){
		$sql="SELECT user_id FROM tbl_user WHERE user_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	function get_user_email($id){
		$sql="SELECT user_email FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_email = $q->fetchColumn();
		return $user_email;
	}
	function get_user_firstname($id){
		$sql="SELECT fname FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$fname = $q->fetchColumn();
		return $fname;
	}
	function get_user_lastname($id){
		$sql="SELECT lname FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$lname = $q->fetchColumn();
		return $lname;
	}
	function get_user_position($id){
		$sql="SELECT position FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$position = $q->fetchColumn();
		return $position;
	}
	function get_user_status($id){
		$sql="SELECT user_status FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_status = $q->fetchColumn();
		return $user_status;
	}
	function get_user_DOB($id){
		$sql="SELECT DOB FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$DOB = $q->fetchColumn();
		return $DOB;
	}
	function get_user_contact_no($id){
		$sql="SELECT contact_no FROM tbl_user WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$contact_no = $q->fetchColumn();
		return $contact_no;
	}
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($email,$password){
		
		$sql = "SELECT count(*) FROM tbl_user WHERE user_email = :email AND user_password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email,'password' => $password ]);
		$number_of_rows = $q->fetchColumn();
	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['user_email']=$email;
			return true;
		}else{
			return false;
		}
	}
}