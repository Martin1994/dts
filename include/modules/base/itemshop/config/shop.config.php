<?php

namespace itemshop
{
	//哪里有商店
	$shops = Array(0,14,27); 
	
	//商店栏目名
	$shop_tag_list=array(
		1 => '补给品',
		2 => '药剂',
		3 => '钝器',
		4 => '锐器',
		5 => '远程兵器',
		6 => '投掷武器及材料',
		7 => '爆炸物及材料',
		8 => '灵力兵器及材料',
		9 => '防具',
		10 => '书籍',
		11 => '电子装备',
		16 => '弹药和箭矢',
		17 => '陷阱',
		12 => '杂物',
		13 => '埃克法轻工特供',
		18 => '强化道具',
		15 => 'Key社纪念品',
		14 => '林苍月的提示',
	);
	
	//哪些商店栏目允许玩家一次买多个数量
	$shop_allow_input_num=Array(1, 2, 6, 7, 8, 10, 11, 16, 18, 12, 17, 13, 15);
}

?>