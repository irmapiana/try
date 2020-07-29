<?php
namespace app\helpers;
use yii;
class RecordHelpers
{
	public static function userHas($name)
	{
		$connection = \Yii::$app->db;
		$userid = \Yii::$app->user->identity->id;
		$sql = "SELECT userid FROM $name WHERE userid=:userid";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $userid);
		$result = $command->queryOne();
		if ($result == null) {
			return false;
		} else {
			return $result['id'];
		}
	}
	public static function userHasProfile($userid)
	{
		$connection = \Yii::$app->db;
		$sql = "SELECT userid FROM profile WHERE userid=:userid";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $userid);
		$result = $command->queryOne();
		if ($result == null) {
			return false;
		} else {
			return $result['id'];
		}
	}
	public static function user($name, $userid)
	{
		$connection = \Yii::$app->db;
		$userid = \Yii::$app->user->identity->id;
		$sql = "SELECT userid FROM name WHERE userid=:userid AND id=:userid";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $userid);
		//$command->bindValue(":model_id", $model_id);
		if($result = $command->queryOne()) {
			return true;
		} else {
			return false;
		}
	}
}