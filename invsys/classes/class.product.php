<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
	}
	
public function new_product_type($type_name){
		
	$data = [
		[$type_name],
	];
	$stmt = $this->conn->prepare("INSERT INTO tbl_type (type_name) VALUES (?)");
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

	public function new_product($prod_name,$type_id,$supplier_id,$beg_inv,$prod_price){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$prod_name,$type_id,$supplier_id,$beg_inv,$prod_price,$NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_products(prod_name, type_id, supplier_id, beg_inv, prod_price, date_added, time_added) VALUES (?,?,?,?,?,?,?)");
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
	public function list_product(){
		$sql="SELECT * FROM tbl_products";
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
	
	public function list_types(){
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
	
	public function update_product($prod_name,$type_id,$supplier_id,$beg_inv,$prod_price){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_products SET prod_name=:prod_name,type_id=:type_id,supplier_id=:supplier_id,beg_inv=:beg_inv,prod_price=:prod_price,date_updated=:date_updated,time_updated=:time_updated WHERE prod_id=:prod_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':prod_name'=>$prod_name, ':type_id'=>$type_id,':supplier_id'=>$supplier_id,':beg_inv'=>$beg_inv,':prod_price'=>$prod_price,':date_updated'=>$NOW,':time_updated'=>$NOW,':prod_id'=>$id));
		return true;
	}
	function get_prod_name($id){
		$sql="SELECT prod_name FROM tbl_products WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_name = $q->fetchColumn();
		return $prod_name;
	}
	function get_prod_type($id){
		$sql="SELECT type_id FROM tbl_products WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_prod_type_name($id){
		$sql="SELECT type_name FROM tbl_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_name = $q->fetchColumn();
		return $type_name;
	}
	function get_supplier($id){
		$sql="SELECT supplier_id FROM tbl_products WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_id = $q->fetchColumn();
		return $supplier_id;
	}
	function get_supplier_name($id){
		$sql="SELECT supplier_name FROM tbl_supplier WHERE supplier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$supplier_name = $q->fetchColumn();
		return $supplier_name;
	}
	function get_beg_inv($id){
		$sql="SELECT beg_inv FROM tbl_products WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$beg_inv = $q->fetchColumn();
		return $beg_inv;
	}
	function get_prod_price($id){
		$sql="SELECT prod_price FROM tbl_products WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_price = $q->fetchColumn();
		return $prod_price;
	}
	
	
}