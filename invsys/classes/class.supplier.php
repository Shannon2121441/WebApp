<?php
class Supplier{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_supplier($supplier_name,$supplier_email,$supplier_contactno){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$supplier_name,$supplier_email,$NOW,$NOW,$supplier_contactno],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_suppliers (supplier_name,supplier_email, supplier_date_added, supplier_time_added, supplier_contactno) VALUES (?,?,?,?,?)");
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

	public function update_supplier($supplier_name, $id, $supplier_contactno){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_suppliers SET supplier_name=:supplier_name,supplier_date_updated=:supplier_date_updated,supplier_time_updated=:supplier_time_updated,supplier_contactno=:supplier_contactno WHERE supplier_id=:supplier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':supplier_name'=>$supplier_name,':supplier_date_updated'=>$NOW,':supplier_time_updated'=>$NOW,':supplier_id'=>$id,':supplier_contactno'=>$supplier_contactno));
		return true;
	}
	public function list_supplier_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM `tbl_suppliers` WHERE `supplier_name` LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]= $r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

	public function change_supplier_email($id,$supplier_email){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_suppliers SET supplier_email=:supplier_email,supplier_date_updated=:supplier_date_updated,supplier_time_updated=:supplier_time_updated WHERE supplier_id=:supplier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':supplier_email'=>$email,':supplier_date_updated'=>$NOW,':supplier_time_updated'=>$NOW,':supplier_id'=>$id));
		return true;
	}

	public function change_supplier_contactno($id,$supplier_contactno){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_suppliers SET supplier_contactno=:supplier_contactno,supplier_date_updated=:supplier_date_updated,supplier_time_updated=:supplier_time_updated WHERE supplier_id=:supplier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':supplier_contactno'=>$supplier_contactno,':supplier_date_updated'=>$NOW,':supplier_time_updated'=>$NOW,':supplier_id'=>$id));
		return true;
	}
	
	public function list_supplier(){
		$sql="SELECT * FROM tbl_suppliers";
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

	function get_supplier_id($supplier_email){
		$sql="SELECT supplier_id FROM tbl_suppliers WHERE supplier_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$supplier_id = $q->fetchColumn();
		return $supplier_id;
	}
	function get_supplier_email($id){
		$sql="SELECT supplier_email FROM tbl_suppliers WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_email = $q->fetchColumn();
		return $supplier_email;
	}
	function get_supplier_contactno($id){
		$sql="SELECT supplier_contactno FROM tbl_suppliers WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_contactno = $q->fetchColumn();
		return $supplier_contactno;
	}
	function get_supplier_name($id){
		$sql="SELECT supplier_name FROM tbl_suppliers WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_name = $q->fetchColumn();
		return $supplier_name;
	}
}