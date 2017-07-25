<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' => true,	 //让页面显示追踪日志信息
	'URL_CASE_INSENSITIVE'  =>  false,   //URL不区分大小写
	 
	 
	 //开启日志
	'LOG_TYPE'              =>  'File',
	'LOG_RECORD'            =>  true,  // 进行日志记录
    'LOG_EXCEPTION_RECORD'  =>  true,    // 是否记录异常信息日志
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR,WARN,NOTIC,INFO,DEBUG,SQL',  // 允许记录的日志级别
	 
	
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '101.201.113.62', // 服务器地址
    'DB_NAME'               =>  'edu',          // 数据库名
    'DB_USER'               =>  'eduu',      // 用户名
    'DB_PWD'                =>  'join1du',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'edu_',    // 数据库表前缀
);