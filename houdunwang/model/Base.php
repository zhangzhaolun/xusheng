<?php
namespace houdunwang\model;
use PDO;
use PDOException;
class Base {
	//保存PDO对象的静态属性
	private static $pdo = null;

	public function __construct() {
		$this->connect();
	}

	/**
	 * 链接数据库
	 */
	private function connect() {
		//如果构造方法多次执行，那么此方法也会多次执行，用静态属性可以把对象保存起来不丢失，
		//第一次self::$pdo为null，那么就正常链接数据库
		//第二次self::$pdo已经保存了pdo对象，不为NULL了，这样不用再次链接mysql了。
		if ( is_null( self::$pdo ) ) {
			try {
				$dsn = 'mysql:host='.c('database.db_host').';dbname=' . c('database.db_name');
				$pdo = new PDO( $dsn, c('database.db_user'), c('database.db_password') );
				$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$pdo->exec( "SET NAMES " . c('database.db_charset') );
				//把PDO对象放入到静态属性中
				self::$pdo = $pdo;
			} catch ( PDOException $e ) {
				exit( $e->getMessage() );
			}
		}

	}

	/*
	 * 获取全部数据
	 */
	public function get( $table ) {
		$sql    = "SELECT * FROM {$table}";
		$result = self::$pdo->query( $sql );
		//获得关联数组
		$data = $result->fetchAll( PDO::FETCH_ASSOC );

		return $data;
	}

	/**
	 * 执行有结果集的操作
	 *
	 * @param $sql
	 */
	public function q( $sql ) {
		try {
			$result = self::$pdo->query( $sql );
			return $result->fetchAll( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {//捕获PDO异常错误 $e 是异常对象
			exit( "SQL错误：" . $e->getMessage() );
		}
	}

	/**
	 * 执行没有结果集的操作
	 *
	 * @param $sql
	 */
	public function e( $sql ) {
		try {
			$afRows = self::$pdo->exec( $sql );
			return $afRows;
		} catch ( PDOException $e ) {
			exit( "SQL错误：" . $e->getMessage() );
		}
	}
}