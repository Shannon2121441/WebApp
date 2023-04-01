<?php
class Order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_order($supplier_id,$order_amount){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$supplier_id,$order_amount,$NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order(supplier_id, order_amount, date_added, time_added) VALUES (?,?,?,?)");
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

	public function list_product_type(){
		$sql="SELECT * FROM tbl_type";
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

	public function list_order(){
		$sql="SELECT * FROM tbl_order";
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

	function get_order_supplier($id){
		$sql="SELECT supplier_id FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_id = $q->fetchColumn();
		return $supplier_id;
	}
	function get_order_supplier_name($id){
		$sql="SELECT supplier_name FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_name = $q->fetchColumn();
		return $supplier_name;
	}
	function get_order_date($id){
		$sql="SELECT date_added FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$date_added = $q->fetchColumn();
		return $date_added;
	}
	function get_order_amount($id){
		$sql="SELECT order_amount FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_amount = $q->fetchColumn();
		return $order_amount;
	}
		function get_order_save($id){
		$sql="SELECT order_saved FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$order_saved = $q->fetchColumn();
		return $order_saved;
	}
	
	public function list_order_items($id){
		$sql="SELECT * FROM tbl_orderitem WHERE order_id=$id";
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

	public function new_order_item($orderid,$prod_id,$qty){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$orderid,$prod_id,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_orderitem(order_id, prod_id, order_qty) VALUES (?,?,?)");
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

	public function save_order_items($id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$order_status = 1;
		$sql = "UPDATE tbl_order SET order_saved=:order_saved WHERE order_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':order_saved'=>$order_status));
		return true;
	}

	public function save_to_inventory($id){
		$sql="SELECT * FROM tbl_orderitem WHERE order_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_product_inv(order_id, prod_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($order_id,$prod_id,$order_qty));
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