<?php
class data{
	var $con="";
	function __construct($host,$user,$pass,$db){
		$this->con=mysqli_connect($host,$user,$pass,$db);
	}
	function query($sql="",$ch=0){
		switch($ch){
			case 1:
			$res=mysqli_query($this->con,$sql);
			return $row=mysqli_fetch_assoc($res);
			break;

			case 2:
			$res=mysqli_query($this->con,$sql);
			$arr=array();
			while($row=mysqli_fetch_assoc($res)){
				$arr[]=$row;
			}
			return $arr;
			break;

			case 3:
			$res=mysqli_query($this->con,$sql);
			return $row=mysqli_insert_id($this->con);
			break;

			case 4:
			$res=mysqli_query($this->con,$sql);
			return $row=mysqli_affected_rows($this->con);
			break;
			case 5:
			$res=mysqli_query($this->con,$sql);
			return $row=mysqli_num_rows($res);
			break;
		}
	}
}
$obj= new data("localhost","root","","project");
?>