<?php
session_start();
if(empty($_SESSION['loginz'])) die();

require_once '../config.php';
require_once 'functions.php';


switch ($_POST['action']) {
	case 'add_category':
			$sql = $db->table('category')
						->insert([
									'name'		=> $_POST['name'],
									'slug'		=> slug($_POST['name']),
									'type'		=> $_POST['type'],
									'status'	=> 1
								]);
			echo json_encode(['sql' => '1']);
		break;

	case 'update_category':
			$sql = $db->table('category')
						->update([
									'name'		=> $_POST['name'],
									'slug'		=> slug($_POST['name'])
								])
						->where('id', $_POST['id']);
			echo json_encode(['status' => 1]);
			break;

	case 'add_post':
		$sql = $db->table('post')
					->insert([
								'id_user'			=> 1,
								'id_category'		=> $_POST['id_category'],
								'title'				=> $_POST['title'],
								'content'			=> $_POST['content'],
								'image'				=> $_POST['image'],
								'type'				=> $_POST['type'],
								'tags'				=> json_encode(',', $_POST['tags'])
							]);
		if($sql){
			echo json_encode(['status' => 1]);
		}else{
			echo json_encode(['status' => 0]);
		}
		break;

	case 'update_post':
		$sql = $db->table('post')
					->insert([
								'id_user'			=> 1,
								'id_category'		=> $_POST['id_category'],
								'title'				=> $_POST['title'],
								'content'			=> $_POST['content'],
								'image'				=> $_POST['image'],
								'type'				=> $_POST['type'],
								'tags'				=> json_encode(explode(',', $_POST['tags']))
							])
					->where('id', $_POST['id']);
		if($sql){
			echo json_encode(['status' => 1]);
		}else{
			echo json_encode(['status' => 0]);
		}
		break;

	case 'delete_category':
		$sql = $db->table('post')->select('id')->where('id_category', $_POST['id'])->getAll();
		foreach ($sql as $k => $v) {
			$db->table('post')->where('id', $v->id)->delete();
		}
		$db->table('category')->where('id', $_POST['id'])->delete();
		echo json_encode(['status' => 1]);
	break;

	case 'delete_post':
		$sql = $db->table('post')
					->where('id', $_POST['id'])
					->delete();
		if($sql){
			echo json_encode(['status' => 1]);
		}else{
			echo json_encode(['status' => 0]);
		}
		break;
}
