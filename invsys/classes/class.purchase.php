<?php
class Purchase{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_purchase($customer_id,$amount){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$customer_id,$amount,'1',$NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_purchase(customer_id, purch_amount, purch_status, date_added, time_added) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}

	
	public function list_purchase(){
		$sql="SELECT * FROM tbl_purchase";
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

	function get_purchase_customer($id){
		$sql="SELECT customer_id FROM tbl_purchase WHERE purchase_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$customer_id = $q->fetchColumn();
		return $customer_id;
	}
	function get_purchase_date($id){
		$sql="SELECT date_added FROM tbl_purchase WHERE purchase_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$date_added = $q->fetchColumn();
		return $date_added;
	}
	function get_purchase_amount($id){
		$sql="SELECT purch_amount FROM tbl_purchase WHERE purchase_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$purch_amount = $q->fetchColumn();
		return $purch_amount;
	}
	function get_purchase_save($id){
		$sql="SELECT purch_saved FROM tbl_purchase WHERE purchase_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$purch_saved = $q->fetchColumn();
		return $purch_saved;
	}

	public function list_purchase_items($id){
		$sql="SELECT * FROM tbl_purchaseitem WHERE purchase_id=$id";
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

	public function new_purchase_item($purchase_id,$prodid,$qty){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$purchase_id,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_purchaseitem(purchase_id, prod_id, purch_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_purchase_items($id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$purch_status = 1;
		$sql = "UPDATE tbl_purchase SET purch_saved=:purch_saved WHERE purchase_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':purch_saved'=>$purch_status));
		return true;
	}

	
	public function save_to_purchase($id){
		$sql="SELECT * FROM tbl_purchaseitem WHERE purchase_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_purchase_inv(purchase_id, prod_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($purchase_id,$prod_id,$purch_qty));
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
}