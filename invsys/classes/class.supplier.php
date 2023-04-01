<?php
class Supplier{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_supplier($supplier_name,$supplier_email,$contact_no,$supplier_address){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$supplier_name,$supplier_email,$contact_no,$supplier_address,$NOW,$NOW, '1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_supplier (supplier_name, supplier_email, contact_no, supplier_address, date_added, time_added, supplier_status) VALUES (?,?,?,?,?,?,?)");
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

	public function update_supplier($id, $supplier_name, $supplier_email, $contact_no, $supplier_address){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_supplier SET supplier_name=:supplier_name,supplier_email=:supplier_email,contact_no=:contact_no,supplier_address=:supplier_address,date_updated=:date_updated,time_updated=:time_updated WHERE supplier_id=:supplier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':supplier_name'=>$supplier_name,':supplier_email'=>$supplier_email,':contact_no'=>$contact_no,':supplier_address'=>$supplier_address,':date_updated'=>$NOW,':time_updated'=>$NOW,':supplier_id'=>$id));
		return true;
	}
	
	public function list_suppliers(){
		$sql="SELECT * FROM tbl_supplier";
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

	public function change_supplier_status($id,$supplier_status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_supplier SET supplier_status=:supplier_status,date_updated=:date_updated,time_updated=:time_updated WHERE supplier_id=:supplier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':supplier_status'=>$supplier_status,':date_updated'=>$NOW,':time_updated'=>$NOW,':supplier_id'=>$id));
		return true;
	}

	function get_supplier_id($supplier_email){
		$sql="SELECT supplier_id FROM tbl_supplier WHERE supplier_email = :supplier_email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['supplier_email' => $supplier_email]);
		$supplier_id = $q->fetchColumn();
		return $supplier_id;
	}
	function get_supplier_email($id){
		$sql="SELECT supplier_email FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_email = $q->fetchColumn();
		return $supplier_email;
	}
	function get_supplier_name($id){
		$sql="SELECT supplier_name FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_name = $q->fetchColumn();
		return $supplier_name;
	}
	function get_supplier_address($id){
		$sql="SELECT supplier_address FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_address = $q->fetchColumn();
		return $supplier_address;
	}
	function get_supplier_contact_no($id){
		$sql="SELECT contact_no FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$contact_no = $q->fetchColumn();
		return $contact_no;
	}
	function get_supplier_status($id){
		$sql="SELECT supplier_status FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_status = $q->fetchColumn();
		return $supplier_status;
	}
}