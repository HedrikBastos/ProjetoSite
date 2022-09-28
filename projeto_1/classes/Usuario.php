<?php
	
	class Usuario{

		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = MySql::conectar()->prepare("UPDATE `tb_adm.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
				return true;
		
			}else{
				return false;
			}
	
		}

		public static function userExists($user){
				$sql= mysql::conectar()->prepare("SELECT `id` FROM `tb_adm.usuarios` WHERE user= ? ");
				$sql->execute(array($user));
				if($sql->rowcount($user))
					return true;

				else
					return false;
		}

		public static function cadastrarUsuario($user,$senha,$imagem,$nome,$cargo){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($user,$senha,$imagem,$nome,$cargo));
		}

	}

?>