<?php

namespace smartmix
{
	$mix_successful_flag = 0;
	$tmp_itemselect = -1;
	
	function init() {}
	
	//以道具名反查mixinfo数据
	//tp & 1 以原料反查，tp & 2 以产物反查
	//返回mixinfo里的单个array
	function smartmix_find_recipe($itm, $tp=0){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		$recipe = \itemmix\get_mixinfo();
		$mix_res = array();		
		$itm = htmlspecialchars_decode(\itemmix\itemmix_name_proc($itm));
		foreach ($recipe as $ma){
			$ma['type'] = 'normal';
			//隐藏合成是无法查到的
			if(($tp & 1 && in_array($itm, $ma['stuff']) && $ma['class']!='hidden') || ($tp & 2 && $itm == $ma['result'][0])){
				$mix_res[] = $ma;
			}
		}
		return $mix_res;
	}
	
	//以道具编号反查mixinfo_overlay数据
//	function smartmix_find_recipe_overlay($mlist, $tp=0){
//		if (eval(__MAGIC__)) return $___RET_VALUE;
//		eval(import_module('sys','itemmix_overlay'));
//		$ovl_res = \itemmix_overlay\itemmix_overlay_check($mlist, 1);
//		foreach($ovl_res as &$oval){
//			$oval['type'] = 'overlay';
//		}
//		return $ovl_res;
//	}
	
	//检查玩家包裹，返回可合成的道具列表
	function smartmix_check_available(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player','logger'));
		//itms为零的道具不参与判断
		$packn = array();
		for($i=1;$i<=6;$i++){
			if(!empty(${'itms'.$i})){
				$packn[] = $i;
				//$packname[] = \itemmix\itemmix_name_proc(${'itm'.$i});
			}
		}
		//生成道具序号的全组合
		$fc = full_combination($packn, 2);
		//基于全组合生成道具名的组合
		//$fcname = full_combination($packname, 2);
		
		//所有的组合全部判断一遍是否可以合成，最简单粗暴和兼容
		$mix_available = $mix_overlay_available = $mix_sync_available = array();
		foreach($fc as $fcval){

			$mix_res = \itemmix\itemmix_get_result($fcval);
			if($mix_res){
				//$mix_res['type'] = 'normal';
				$mix_available[] = $mix_res;
			}
		}
		foreach($fc as $fval){
			$mix_overlay_res = \itemmix_overlay\itemmix_overlay_check($fval);
			if($mix_overlay_res){
				foreach($mix_overlay_res as $mkey => $mval){
					//$mval['type'] = 'overlay';
					if(!isset($mix_overlay_available[$mkey])){
						$mix_overlay_available[$mkey] = array($mval);
					}else{
						$mix_overlay_available[$mkey][] = $mval;
					}
				}
			}
			$mix_sync_res = \itemmix_sync\itemmix_sync_check($fval);
			if($mix_sync_res){
				foreach($mix_sync_res as $mkey => $mval){
					//$mval['type'] = 'sync';
					if(!isset($mix_sync_available[$mkey])){
						$mix_sync_available[$mkey] = array($mval);
					}else{
						$mix_sync_available[$mkey][] = $mval;
					}
				}
			}
		}
		return array($mix_available,$mix_overlay_available,$mix_sync_available);
	}
	
	function parse_smartmix_recipelink($itemindex, $stext = '', $sstyle = ''){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return "<a ".($sstyle ? "class=\"{$sstyle}\" " : '')."onclick=\"$('mode').value='command';$('command').value='itemmain';$('subcmd').name='itemcmd';$('subcmd').value='itemmix';$('subcmd2').name='itemindex';$('subcmd2').value='$itemindex';postCmd('gamecmd','command.php');\">".($stext ? $stext : $itemindex).'</a>';
	}
	
	function get_itemmix_filename(){//彻底覆盖原来的
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys'));
		if($gametype == 17) {
			$uip['tutorial_cmd_inner_tpl'] = MOD_SMARTMIX_ITEMMIX;
			return MOD_TUTORIAL_TUTORIAL_CMD;
		}
		else{
			return MOD_SMARTMIX_ITEMMIX;
		}
	}
	
	//显示之前的处理
	function smartmix_show()
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player','itemmix'));
		$mhint = '';
		$itemindex = get_var_input('itemindex');
		if(!empty($itemindex)){
			$mix_res = smartmix_find_recipe($itemindex, 1 + 2);				
			if($mix_res){
				$mhint .= '<span class="yellow b">'.$itemindex.'</span>涉及的合成公式有：<br><ul>';
				foreach($mix_res as $mval){
					$mhint_single = '<li>';
//					$mhint_slen_calc = '';
					if(!isset($mval['type']) || $mval['type'] == 'normal'){
						foreach($mval['stuff'] as $ms){
							$mhint_single .= parse_smartmix_recipelink($ms).' + ';
//							$mhint_slen_calc .= $ms.' + ';
						}
						$mhint_single = substr($mhint_single,0,-3);
//						$mhint_slen_calc = substr($mhint_slen_calc,0,-3);
					}
					$mr = $mval['result'][0];
					$mhint_single .= ' → '.parse_smartmix_recipelink($mr, \itemmix\parse_itemmix_resultshow($mval['result'])).'</li>';
//					$mhint_slen_calc .= ' → '.\itemmix\parse_itemmix_resultshow($mval['result']);
//					if(gshow_len($mhint_slen_calc) > 110) {//经测算这个粗估值大于95就会换行。如果两行都写不下，那么分行处理
//						$mhint_single = str_replace(' → ', '<br> → ', $mhint_single);
//					}
					$mhint .= $mhint_single;
				}
				$mhint .= '</ul>';
			}	else{
				$mhint .= '所选道具不存在相关的合成公式。<br>';
			}
		}else{
			list($mix_available,$mix_overlay_available,$mix_sync_available) = smartmix_check_available();
			if(empty($mix_available) && empty($mix_overlay_available) && empty($mix_sync_available)){
				$mhint .= '可合成的道具不存在。<br>';
			}else{
				$mhint .= '<span>合成提示：</span><br>';
				$shown_list = array();
				foreach($mix_available as $mlist){//第一层：不同配方
					$mstuff = $mresult = '';
					$o_type = '';
					foreach ($mlist as $mval){//第二层：不同结果
						if(!empty($o_type) && $o_type != $mval['type']) {//换类型时把上一合成类别显示，并且清空显示的配方和结果列表
							$mtstr = '';
							if(isset($mix_type[$o_type])) $mtstr = $mix_type[$o_type];
							$show_str = '<span>'.$mstuff.'</span>可'.$mtstr.'合成：<ul>'.$mresult.'</ul><br>';
							if(!in_array($show_str, $shown_list)){
								$shown_list[] = $show_str;
								$mhint .= $show_str;
							}
							$mstuff = $mresult = '';
						}
						$o_type = $mval['type'];
						if(!$mstuff) {//配方只显示1次					
							sort($mval['stuff']);			
							foreach($mval['stuff'] as $ms){
								$mstuff .= parse_smartmix_recipelink($ms).' + ';
							}
							$mstuff = substr($mstuff,0,-3);
						}
						$mresult .= '<li>'.parse_smartmix_recipelink($mval['result'][0], \itemmix\parse_itemmix_resultshow($mval['result']), 'yellow b').'</li>';
					}
					$mtstr = '';
					if(isset($mix_type[$o_type])) $mtstr = $mix_type[$o_type];
					$show_str = '<span>'.$mstuff.'</span>可'.$mtstr.'合成：<ul>'.$mresult.'</ul>';
					if(!in_array($show_str, $shown_list)){
						$shown_list[] = $show_str;
						$mhint .= $show_str;
					}
				}
			}
		}
		$mhint .= '<br>';
		$uip['mixhint'] = $mhint;
	}
	
	//显示之前的处理
	function act(){
		if (eval(__MAGIC__)) return $___RET_VALUE;
		eval(import_module('sys','player'));
		if ($mode == 'command' && $command == 'itemmain' && get_var_input('itemcmd')=='itemmix'){
			smartmix_show();
			if(!empty($uip['mixhint'])) {
				$main = MOD_SMARTMIX_MIXHINT_MAIN;
			}
		}
		$chprocess();
	}
	
	//是否允许【按上一次合成】功能。本模块只判断skill1003是否存在
	function is_lastmix_allowed()
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		return defined('MOD_SKILL1003');
	}
	
	//检测是否提交按上一次合成的指令，并判定合成是否成功
	function itemmix($mlist, $itemselect=-1) {
		if (eval(__MAGIC__)) return $___RET_VALUE;
		
		eval(import_module('smartmix'));
		$mix_successful_flag = 0;
		$tmp_itemselect = $itemselect;//暂时记录二级选项
		
		if(is_lastmix_allowed() && 'lastmix' == get_var_in_module('subcmd','input')){
			list($lastlist, $lastres, $lastselect) = get_lastmix();
			if(!empty($lastlist)) {
				$mlist = $lastlist;
				if($lastselect > 0) {//如果上一次合成有选择二级选项，直接提交二级选项
					$itemselect = $lastselect;
				}
			}
		}
		
		$chprocess($mlist, $itemselect);
		
		if(is_lastmix_allowed()){
			if(!$mix_successful_flag && $itemselect < 0) {//合成不成功则清空上一次合成的记录
				list($lastlist, $lastres) = get_lastmix();
				if(!empty($lastlist)) {
					save_lastmix(Array(), Array());
					//这里由于执行顺序，需要重新生成一遍指令
					eval(import_module('player'));
					if(!empty($cmd) && strpos($cmd, 'itemmain')!==false) {
						ob_clean();
						include template(get_itemmix_filename());
						$cmd = ob_get_contents();
						ob_clean();
					}					
				}
			}
		}
	}
	
	//在合成处理之后，储存合成的选项
	function itemmix_proc($mlist, $minfo)
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		
		$chprocess($mlist, $minfo);
		if(is_lastmix_allowed()) {
			eval(import_module('smartmix'));
			save_lastmix($mlist, $minfo, $tmp_itemselect);
		}
	}
	
	//合成成功时，给合成成功标记赋值
	function itemmix_success()
	{
		if (eval(__MAGIC__)) return $___RET_VALUE;
		
		$chprocess();
		eval(import_module('smartmix'));
		$mix_successful_flag = 1;
	}
	
	//【上一次合成】核心函数，使用skill1003来储存
	function save_lastmix($mlist, $minfo, $msel=-1) {
		if (eval(__MAGIC__)) return $___RET_VALUE;
		if(\skillbase\skill_query(1003)) {
			\skillbase\skill_setvalue(1003, 'last_mix_list', gencode($mlist));
			\skillbase\skill_setvalue(1003, 'last_mix_result', gencode($minfo));
			\skillbase\skill_setvalue(1003, 'last_mix_select', $msel);
		}
	}
	
	//从skill1003读取上一次合成的值
	function get_lastmix() {
		if (eval(__MAGIC__)) return $___RET_VALUE;
		$mlist = $mres = Array();
		if(\skillbase\skill_query(1003)) {
			$mlist = \skillbase\skill_getvalue(1003, 'last_mix_list');
			if(!empty($mlist)) $mlist = gdecode($mlist,1);
			$mres = \skillbase\skill_getvalue(1003, 'last_mix_result');
			if(!empty($mres)) $mres = gdecode($mres,1);
			$msel = \skillbase\skill_getvalue(1003, 'last_mix_select');
		}
		return Array($mlist, $mres, $msel);
	}
}

?>