<?php
class UserData {
	public static $tablename = "user";


	public function Userdata(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into user (name,lastname,email,code,password,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->code\",\"$this->password\",$this->created_at)";
		return Executor::doit($sql);
	}

	public function add2(){
		$sql = "insert into user (image,name,lastname,email,username,password,kind,created_at) ";
		$sql .= "value (\"$this->image\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->username\",\"$this->password\",$this->kind,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delete($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",email=\"$this->email\",kind=\"$this->kind\",status=\"$this->status\" where id=$this->id";
		Executor::doit($sql);
	}


	public function update_profile(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",bio=\"$this->bio\",address=\"$this->address\",phone=\"$this->phone\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function update_email(){
		$sql = "update ".self::$tablename." set email=\"$this->email\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function update_img(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";	
		Executor::doit($sql);
	}

	public function activate(){
		$sql = "update ".self::$tablename." set is_active=1 where id=$this->id";	
	Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getLogin($email,$password){
		$sql = "select * from ".self::$tablename." where email=\"$email\" and password=\"$password\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}

	public static function getInactives(){
		$sql = "select * from ".self::$tablename." where is_active=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>