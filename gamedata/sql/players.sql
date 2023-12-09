--
-- 表的结构 `bra_players`
-- 储存角色数据的激活信息，包括PC和NPC。
--

DROP TABLE IF EXISTS bra_players;
CREATE TABLE bra_players (
  `pid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` char(15) NOT NULL DEFAULT '',
  `pass` char(32) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '',
  `motto` char(30) NOT NULL DEFAULT '',
  `killmsg` char(30) NOT NULL DEFAULT '',
  `lastword` char(30) NOT NULL DEFAULT '', 
  `winner_flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `player_dead_flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `corpse_clear_flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gd` char(1) NOT NULL DEFAULT 'm',
  `sNo` smallint(5) unsigned NOT NULL DEFAULT '0',
  `club` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `validtime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `cdsec` int(10) unsigned NOT NULL DEFAULT '0',
  `cdmsec` smallint(3) unsigned NOT NULL DEFAULT '0',
  `cdtime` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action` char(12) NOT NULL DEFAULT '',
  `a_actionnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `v_actionnum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `hp` int(10) unsigned NOT NULL DEFAULT '0',
  `mhp` int(10) unsigned NOT NULL DEFAULT '0',
  `sp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `msp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ss` smallint(5) unsigned NOT NULL DEFAULT '0',
  `mss` smallint(5) unsigned NOT NULL DEFAULT '0',
  `att` smallint(5) unsigned NOT NULL DEFAULT '0',
  `def` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pls` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `lvl` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `exp` smallint(5) unsigned NOT NULL DEFAULT '0',
  `money` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rp` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `bid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `inf` char(10) NOT NULL DEFAULT '',
  `rage` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pose` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tactic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `killnum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `npckillnum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `skillpoint` smallint(5) NOT NULL DEFAULT '0',
  `flare` tinyint(1) NOT NULL DEFAULT '0',
  `wp` int(10) unsigned NOT NULL DEFAULT '0',
  `wk` int(10) unsigned NOT NULL DEFAULT '0',
  `wg` int(10) unsigned NOT NULL DEFAULT '0',
  `wc` int(10) unsigned NOT NULL DEFAULT '0',
  `wd` int(10) unsigned NOT NULL DEFAULT '0',
  `wf` int(10) unsigned NOT NULL DEFAULT '0',
  `icon` varchar(255) NOT NULL DEFAULT '0',
  `teamID` char(15) NOT NULL DEFAULT '',
  `teamPass` char(15) NOT NULL DEFAULT '',
  `card` smallint(5) NOT NULL DEFAULT '0',
  `cardname` varchar(50) NOT NULL DEFAULT '',
  `wep` varchar(30) NOT NULL DEFAULT '',
  `wepk` varchar(15) NOT NULL DEFAULT '',
  `wepe` int(10) unsigned NOT NULL DEFAULT '0',
  `weps` varchar(10) NOT NULL DEFAULT '0',
  `wepsk` text NOT NULL DEFAULT '',
  `arb` varchar(30) NOT NULL DEFAULT '',
  `arbk` varchar(15) NOT NULL DEFAULT '',
  `arbe` int(10) unsigned NOT NULL DEFAULT '0',
  `arbs` varchar(10) NOT NULL DEFAULT '0',
  `arbsk` text NOT NULL DEFAULT '',
  `arh` varchar(30) NOT NULL DEFAULT '',
  `arhk` varchar(15) NOT NULL DEFAULT '',
  `arhe` int(10) unsigned NOT NULL DEFAULT '0',
  `arhs` varchar(10) NOT NULL DEFAULT '0',
  `arhsk` text NOT NULL DEFAULT '',
  `ara` varchar(30) NOT NULL DEFAULT '',
  `arak` varchar(15) NOT NULL DEFAULT '',
  `arae` int(10) unsigned NOT NULL DEFAULT '0',
  `aras` varchar(10) NOT NULL DEFAULT '0',
  `arask` text NOT NULL DEFAULT '',
  `arf` varchar(30) NOT NULL DEFAULT '',
  `arfk` varchar(15) NOT NULL DEFAULT '',
  `arfe` int(10) unsigned NOT NULL DEFAULT '0',
  `arfs` varchar(10) NOT NULL DEFAULT '0',
  `arfsk` text NOT NULL DEFAULT '',
  `art` varchar(30) NOT NULL DEFAULT '',
  `artk` varchar(15) NOT NULL DEFAULT '',
  `arte` int(10) unsigned NOT NULL DEFAULT '0',
  `arts` varchar(10) NOT NULL DEFAULT '0',
  `artsk` text NOT NULL DEFAULT '',
  `itm0` varchar(30) NOT NULL DEFAULT '',
  `itmk0` varchar(15) NOT NULL DEFAULT '',
  `itme0` int(10) unsigned NOT NULL DEFAULT '0',
  `itms0` varchar(10) NOT NULL DEFAULT '0',
  `itmsk0` text NOT NULL DEFAULT '',
  `itm1` varchar(30) NOT NULL DEFAULT '',
  `itmk1` varchar(15) NOT NULL DEFAULT '',
  `itme1` int(10) unsigned NOT NULL DEFAULT '0',
  `itms1` varchar(10) NOT NULL DEFAULT '0',
  `itmsk1` text NOT NULL DEFAULT '',
  `itm2` varchar(30) NOT NULL DEFAULT '',
  `itmk2` varchar(15) NOT NULL DEFAULT '',
  `itme2` int(10) unsigned NOT NULL DEFAULT '0',
  `itms2` varchar(10) NOT NULL DEFAULT '0',
  `itmsk2` text NOT NULL DEFAULT '',
  `itm3` varchar(30) NOT NULL DEFAULT '',
  `itmk3` varchar(15) NOT NULL DEFAULT '',
  `itme3` int(10) unsigned NOT NULL DEFAULT '0',
  `itms3` varchar(10) NOT NULL DEFAULT '0',
  `itmsk3` text NOT NULL DEFAULT '',
  `itm4` varchar(30) NOT NULL DEFAULT '',
  `itmk4` varchar(15) NOT NULL DEFAULT '',
  `itme4` int(10) unsigned NOT NULL DEFAULT '0',
  `itms4` varchar(10) NOT NULL DEFAULT '0',
  `itmsk4` text NOT NULL DEFAULT '',
  `itm5` varchar(30) NOT NULL DEFAULT '',
  `itmk5` varchar(15) NOT NULL DEFAULT '',
  `itme5` int(10) unsigned NOT NULL DEFAULT '0',
  `itms5` varchar(10) NOT NULL DEFAULT '0',
  `itmsk5` text NOT NULL DEFAULT '',
  `itm6` varchar(30) NOT NULL DEFAULT '',
  `itmk6` varchar(15) NOT NULL DEFAULT '',
  `itme6` int(10) unsigned NOT NULL DEFAULT '0',
  `itms6` varchar(10) NOT NULL DEFAULT '0',
  `itmsk6` text NOT NULL DEFAULT '',
  `searchmemory` text NOT NULL DEFAULT '',
  `nskill` text NOT NULL,
  `nskillpara` text NOT NULL,
  
  PRIMARY KEY (`pid`),
  INDEX `TYPE` (`type`),
  INDEX `NAME` (`name`),
  INDEX `PLS` (`pls`)
	
) ENGINE=MyISAM;