<?php

$lang = array
(
	'gamename' => 'ACFUN大逃杀 - 电波版',
	'succeed' => '成功',
	'fail' => '失败',
	'exit' => '退出安装向导',
	'enabled' => '允许',
	'writeable' => '可写',
	'unwriteable' => '不可写',
	'yes' => '可',
	'no' => '不可',
	'unlimited' => '不限',
	'on' => '开启',
	'off' => '关闭',

	'env_os' => '操作系统',
	'env_php' => 'php版本',
	'env_mysql' => 'MySQL版本',
	'env_attach' => '附件上传',
	'env_diskspace' => '磁盘空间',
	'env_dir_writeable' => '目录写入',
	'server_address_available' => '本地程序地址可本地访问',
	'env_php_memory' => 'php进程内存限制',
	'env_php_timelimit' => 'php最大执行时间',
	'env_ext' => '扩展',
	'env_ob' => '输出缓冲',
	'env_bcmath' => 'bcmath高精度数学库',

	'init_log' => '初始化记录',
	'clear_dir' => '清空目录',
	'select_db' => '选择数据库',
	'create_table' => '建立数据表',
	'init_game' => '初始化游戏系统',
	'new_game' => '新游戏准备',

	'install_wizard' => 'ACFUN大逃杀 - 电波版 - 安装向导',
	'welcome' => '欢迎来到 ACFUN大逃杀 - 电波版 - 安装向导，安装前请确定您接受本授权协议，并确保您已经阅读 readme.md 文件的相关说明，以保证安装进程的顺利进行。',
	'current_process' => '当前状态:',
	'show_license' => '用户许可协议',
	'agreement' => '请您仔细阅读下面的许可协议，并确定您同意协议的全部内容',
	'agreement_yes' => '同意',
	'agreement_no' => '不同意',
	'configure' => '配置 config.inc.php',
	'check_config' => '检查配置文件状态',
	'check_existence' => '存在检查',
	'check_writeable' => '可写检查',
	'edit_config' => '浏览/编辑当前配置',
	'variable' => '设置选项',
	'value' => '当前值',
	'comment' => '注释',
	'gamefounder' => '创建者账号:',
	'gamefounder_comment' => '与创建者账号同名的用户默认为权限10（游戏最高权限）',
	'dbhost' => '数据库服务器:',
	'dbhost_comment' => '数据库服务器地址，本地一般为 localhost、127.0.0.1 等',
	'dbuser' => '数据库用户名:',
	'dbuser_comment' => '数据库账号用户名',
	'dbpw' => '数据库密码:',
	'dbpw_comment' => '数据库账号密码',
	'dbname' => '数据库名:',
	'dbname_comment' => '数据库名称',
	'authkey' => '游戏加密密钥:',
	'authkey_comment' => '必须与插件密钥相同',
	'tablepre' => '表名前缀:',
	'tablepre_comment' => '同一数据库安装多个游戏时可改变默认值',
	'tablepre_prompt' => '除非您需要在同一数据库安装多个游戏，否则建议不要修改表名前缀。',
	'moveut' => '服务器时差:',
	'moveut_comment' => '如果服务器跟你当地的时间有时差，在此处设置。一般用于国外服务器。当前服务器时间:',
	'bbsurl' => '论坛地址:',
	'bbsurl_comment' => '可填写你自己的论坛地址',
	'server_address' => '本地程序地址:',
	'server_address_comment' => '本地访问游戏index.php所在文件夹的地址，为游戏内部http转发等功能必需，建议提供不需通过DNS解析的本地地址',
	'gameurl' => '游戏程序地址:',
	'gameurl_comment' => '外部访问游戏index.php所在文件夹的地址',
	'save_config' => '保存配置信息',

	'db_set' => '请设置安装游戏的数据库',
	'db_use_existence' => '使用已存在的数据库',
	'db_create_new' => '创建新的数据库',

	'confirm_config' => '上述配置正确',
	'refresh_config' => '刷新修改结果',
	'recheck_config' => '重新检查设置',
	'check_env' => '检查当前服务器环境',
	'compare_env' => '游戏所需环境和当前服务器配置对比',
	'env_required' => '最低配置',
	'env_best' => '推荐配置',
	'env_current' => '当前服务器',
	'confirm_preparation' => '请确认已完成如下步骤',
	'install_note' => '安装向导提示',
	'add_admin' => '设置管理员账号',
	'start_install' => '开始安装 ACFUN大逃杀 - 电波版',
	'installing' => '检查管理员账号信息并开始安装游戏。',
	'check_admin' => '检查管理员账号',
	'check_admin_validity' => '检查信息合法性',
	'admin_username_invalid' => '用户名空, 长度超过限制或包含非法字符。',
	'admin_password_invalid' => '密码为空, 长度超过限制或包含非法字符。',
	'admin_invalid' => '您的信息没有填写完整。',
	'fail_reason' => '失败。原因:',
	'go_back' => '返回上一页修改',
	'init_file' => '初始化运行目录与文件',
	'lock_exists' => '您已经安装过游戏，为了保证游戏数据安全，请手动删除 install.php 文件 和 ./install 文件夹下的所有文件，如果您想重新安装游戏，请删除 gamedata/install.lock 文件，并再次运行安装文件。',

	'config_nonexistence' => '您的 config.inc.php 不存在, 无法继续安装, 请检查游戏文件完整性。',
	'config_comment' => '请在下面填写您的数据库账号信息, 通常情况下不需要修改红色选项内容。',
	'config_unwriteable' => '安装向导无法写入配置文件, 请核对现有信息, 如需修改, 请手动修改对应文件。',

	'php_version_low' => '您的 PHP 版本过低, 无法安装 ACFUN大逃杀 - 电波版。',
	'attach_enabled' => '允许/最大尺寸 ',
	'attach_enabled_info' => '您可以上传附件的最大尺寸: ',
	'attach_disabled' => '不允许上传附件',
	'attach_disabled_info' => '附件上传或相关操作被服务器禁止。',
	'mysql_version_low' => '您的 MySQL 版本过低，安装无法继续进行。',
	'diskspace_low' => '您的可用磁盘空间不足，安装无法继续进行。',
	'unwriteable_template' => '模板目录(./templates)属性非 777 或无法写入，安装无法继续进行。',
	'unwriteable_gamedata' => '数据目录(./gamedata)属性非 777 或无法写入，安装无法继续进行。',
	'extension_off' => '扩展没有开启，安装无法继续进行。',
	'server_address_unavailable' => '本地程序地址无法从本地访问，请检查服务器配置，安装无法继续进行。',

	'tablepre_invalid' => '您指定的数据表前缀包含点字符(".")，请返回修改。',
	'db_invalid' => '指定的数据库不存在, 也无法自动建立, 无法安装游戏。',
	'db_auto_created' => '指定的数据库不存在, 但已成功建立, 可以继续安装。',
	'db_not_null' => '数据库已存在, 继续安装会清空原有数据。',
	'db_drop_table_confirm' => '继续安装会清空全部原有数据，您确定要继续吗？',

	'install_abort' => '由于您目录属性或服务器配置原因, 无法继续安装游戏, 请仔细阅读安装说明。',
	'install_process' => '您的服务器可以安装本游戏，请进入下一步安装。',
	'install_succeed' => '恭喜您，ACFUN大逃杀 - 电波版 安装成功！',
	'goto_bbs' => '点击这里返回论坛，增加游戏插件',
	'goto_game' => '点击这里进入游戏首页',


	'choice_or_new_db' => '请选择已存在的数据库，或者新建一个数据库存放游戏数据',
	'game_db_conf' => '游戏数据库设置',
	'show_and_edit_db_conf' => '浏览/编辑当前数据库配置',
	'choice_one_db' => '请指定一个数据库',
	'db' => '数据库',
	'check_user_and_pass' => '检查数据库账号权限',
	'permission' => '权限',
	'status' => '状态',
	
	'username' => '管理员账号:',
	'username_comment' => '初始管理员账号，默认为权限9。如果与创建者账号不同，请在安装完成后尽快注册与创建者同名的账号，以避免安全问题。',
	'brpswd' => '管理员密码:',
	'brpswd_comment' => '',
	'adminmsg' => '站长留言:',
	'adminmsg_comment' => '给用户的公告信息',
	'startmode' => '游戏开始模式:',
	'startmode_comment' => '游戏安装后，可在后台修改默认开始时间',
	'starttime' => '首局开始时间:',
	'iplimit' => 'IP限制:',
	'iplimit_comment' => '0为不限制，数字为允许同时存活人数。',

	'startmode_0' => '手动设定:',
	'startmode_1' => '每日定时:',
	'startmode_2' => '整点开始:',
	'startmode_3' => '间隔开始:',
	'starttime_0' => '设定时间:',
	'starttime_1' => '立即开始:',
	'year' => '年',
	'month' => '月',
	'day' => '日',
	'hour' => '时',
	'min' => '分',

	'license' => '<p class="subtitle">
	ACFUN大逃杀 - 电波版 授权协议：<br>
	本游戏版权属<a style="font-weight: bold;" href="https://bbs.brdts.online/?thread-2.htm"> 无名机关 </a>所有。<br>
	ACFUN大逃杀、电波大逃杀或常磐大逃杀之源代码遵循 知识共享 署名-相同方式共享 3.0协议（CC-BY-SA 3.0）；<br>
	本游戏背景、剧情及原创角色设定遵循 知识共享 署名-非商业性使用-相同方式共享 3.0协议（CC-BY-NC-SA 3.0）。<br>
	在满足上述要求的前提下，任何人均可搭建或开发属于自己的分支。
	</p>',

	'preparation' => '<li>开启curl和sockets两项扩展；</li>
	<li>将php.ini中output_buffering一项打开（一般设为output_buffering = 4096）。</li>
	<li>确定服务器支持本地对本地php文件的http访问。</li>
	<li>建议将php所需内存修改为256M或更高，建议将php最大执行时间修改为180秒或更高。</li>
	<li>把游戏根目录下的gamedata、include和templates三个文件夹全部chmod 0777，win7以上系统需要为IUSR用户和USER用户添加完全访问权限，可自行查找相关教程进行设置。</li>',

);

?>