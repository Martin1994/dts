<?php

namespace instance11
{
	function init() {
		eval(import_module('skillbase','map_display'));
		//开局获得技能：扭蛋、打牌、占卜、欺货
		if(!isset($valid_skills[21])) {
			$valid_skills[21] = array();
		}
		$valid_skills[21] += array(716,733,734,731);
		//地图显示的配置组
		$map_display_group[1] = Array(
			'x' => 3,
			'y' => 3,//用字母表示
			'background-image' => 'map/neomap.jpg',
			'background-width' => 500,
			'background-height' => 500,
		);
	}

	//蹲站房特殊地图数目。仅在$use_config == 1时触发
	function get_plsnum($use_config = 0) {
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if($use_config && 21 == get_var_in_module('gametype','sys')) return sizeof(get_var_in_module('plsinfo11','instance11'));
		return $chprocess($use_config);
	}

	//蹲站房特殊地图数据。仅在$use_config == 1时触发
	function get_all_plsno($use_config = 0) {
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if($use_config && 21 == get_var_in_module('gametype','sys')) return array_keys(get_var_in_module('plsinfo11','instance11'));
		return $chprocess($use_config);
	}
	
	//蹲站房入场道具
	function init_enter_battlefield_items($ebp){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		$ebp = $chprocess($ebp);
		eval(import_module('sys'));
		if (21 == $gametype){
			$ebp['money'] += 980;//初始资金
			$ebp['itm6'] = '窥屏用头戴式显示器'; $ebp['itmk6'] = 'DH'; $ebp['itme6'] = 76; $ebp['itms6'] = 5;$ebp['itmsk6'] = '';
		}
		return $ebp;
	}
	
	//特殊的NPC列表
	function get_npclist(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys','instance11'));
		if (21 == $gametype){
			return $npcinfo_instance11;
		}else return $chprocess();
	}

	//特殊的商店类别
	function get_shop_tag_list()
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','instance11'));
		if (21 == $gametype){
			return $shop_tag_list11;
		}
		return $chprocess();
	}
	
	//特殊的商店道具列表
	function get_shopconfig(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys','instance11'));
		if (21 == $gametype){
			$file = __DIR__.'/config/shopitem.config.php';
			$l = openfile($file);
			return $l;
		}
		return $chprocess();
	}

	//特殊的商店地图
	function check_in_shop_area($p)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','instance11'));
		if (21 == $gametype){
			return in_array($p, $shops11);
		}
		return $chprocess($p);
	}
	
	//特殊的地图道具列表
	function get_itemfilecont(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys'));
		if (21 == $gametype){
			$file = __DIR__.'/config/mapitem.config.php';
			$l = openfile($file);
			return $l;
		}else return $chprocess();
	}
	
	//特殊的开局随机道具列表
	function get_startingitemfilecont(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys'));
		if (21 == $gametype){
			$file = __DIR__.'/config/stitem.config.php';
			$l = openfile($file);
			return $l;
		}else return $chprocess();
	}
	
	//特殊的开局随机武器列表
	function get_startingwepfilecont(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys'));
		if (21 == $gametype){
			$file = __DIR__.'/config/stwep.config.php';
			$l = openfile($file);
			return $l;
		}else return $chprocess();
	}
	
	//特殊的陷阱列表
	function get_trapfilecont(){
		if (eval(__MAGIC__)) return $___RET_VALUE; 
		eval(import_module('sys'));
		if (21 == $gametype){
			$file = __DIR__.'/config/trapitem.config.php';
			$l = openfile($file);
			return $l;
		}else return $chprocess();
	}
	
	//不会连斗
	function checkcombo($time){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys'));
		if(21 == $gametype) return;
		$chprocess($time);
	}
	
	//开局天气极光、禁区时间追加、地图显示配置组修改、$plsinfo重载数据修改
	function rs_game($xmode = 0)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$chprocess($xmode);
		eval(import_module('sys','instance11'));
		if ((21 == $gametype)&&($xmode & 2)) 
		{
			$weather = 17;
			$areatime = $starttime + 1919810;//相当于22天
			$gamevars['map_display_group'] = 1;
			$gamevars['plsinfo'] = $plsinfo11;
		}
	}

	//不显示禁区时间
	function init_areatiming(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys'));
		if (21 == $gametype){
			$uip['timing']['area_timing'] = array(
				'on' => false,
			);
			return;
		}
		$chprocess();
	}

	//开局位于会议室
	function post_enterbattlefield_events(&$pa)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys'));
		if (21 == $gametype) 
		{
			$pa['pls'] = 101;
		}
		$chprocess($pa);
	}

	//允许窥屏——摘自《不允许窥屏》
	function check_observe_act_allowed()
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if(21 == get_var_in_module('gametype','sys')) return true;
		return $chprocess();
	}
	
	//无法使用结局道具、窥屏道具的使用
	function itemuse(&$theitem)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player','logger'));
		$itm=&$theitem['itm']; $itmk=&$theitem['itmk'];
		$itme=&$theitem['itme']; $itms=&$theitem['itms']; $itmsk=&$theitem['itmsk'];	
		if (21 == $gametype)
		{
			if (strpos ( $itmk, 'Y' ) === 0 || strpos ( $itmk, 'Z' ) === 0) {
				if ($itm == '游戏解除钥匙' || $itm == '奇怪的按钮' || $itm == '『G.A.M.E.O.V.E.R』' || $itm == '好想按这个按钮')
				{
					$log .= '这好像只是一个完成度非常高的手办……<br>';
					$mode = 'command';
					return;
				}
			}
			elseif(check_item_observer($itm, $itmk)){
				$obsv_flag = 1;
			}
		}
		$chprocess($theitem);
		if(21 == $gametype && !empty($obsv_flag) && check_item_observer($arh, $arhk)) {
			ob_start();
			include template('MOD_NEWS_OBSERVE_OBSERVE_SELECT');
			$cmd = ob_get_contents();
			ob_end_clean();
			$log .= '你打开了'.$arh.'的开关……<br><br>';
			return;
		}
	}

	//每次行动后如果没有戴着窥屏显示器那么结束窥屏状态
	function post_act(){//每次行动记录得到的金钱
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		if (21 == $gametype)
		{
			$obsv_id = \news_observe\get_observe_groomid();
			if($obsv_id >= 0 && !check_item_observer($arh, $arhk)) {
				\news_observe\observe_main(-1);
			}
		}
		$chprocess();
	}

	function check_item_observer($itm, $itmk)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return ('窥屏用头戴式显示器' == $itm && 'DH' == $itmk);
	}
}

?>