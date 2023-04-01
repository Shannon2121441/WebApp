<?php
class Inventory{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_inv';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	
	public function list_instock(){
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

	function get_product_order_inv($id){
		$sql="SELECT SUM(prod_qty) AS instock FROM tbl_product_inv WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$instock = $q->fetchColumn();
		return $instock;
	}
	function get_product_purchase_inv($id){
		$sql="SELECT SUM(prod_qty) AS outstock FROM tbl_purchase_inv WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$outstock = $q->fetchColumn();
		return $outstock;
	}
}