<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_medal');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=medal">ѫ��</a>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">
<img src="<?php echo STATICURL;?>image/feed/medal.gif" alt="ѫ��" class="vm" />
<?php if($_GET['action'] == 'log') { ?>�ҵ�ѫ��
<?php } else { ?>ѫ������<?php } ?>
</h1>

<?php if(empty($_GET['action'])) { if($medallist) { if($medalcredits) { ?>
<div class="tbmu">
Ŀǰ��<?php $i = 0;?><?php if(is_array($medalcredits)) foreach($medalcredits as $id) { if($i != 0) { ?>, <?php } ?><?php echo $_G['setting']['extcredits'][$id]['img'];?> <?php echo $_G['setting']['extcredits'][$id]['title'];?> <span class="xi1"><?php echo getuserprofile('extcredits'.$id);; ?></span> <?php echo $_G['setting']['extcredits'][$id]['unit'];?><?php $i++;?><?php } ?>
</div>
<?php } ?>
                        <?php 
$categoryArr = array(array('id' => 1, 'name' => '����һ'),
                           array('id' => 2, 'name' => '���Ͷ�'),
                           array('id' => 3, 'name' => '������')
                        );
                        $categoryMap = array_map();

                        foreach($medallist as $medal_t){
                            if(empty($categoryMap[$medal_t[category]])){
                               $categoryList=array($medal_t);
                               $categoryMap[$medal_t['category']] = $categoryList;
                               continue;
                            }
                            $categoryList = $categoryMap[$medal_t[category]];
                            array_push($categoryList,$medal_t);
                            $categoryMap[$medal_t['category']] = $categoryList;
                        }
                        foreach ($categoryMap as $k=>$v){
                            foreach ($categoryArr as $key=>$medalName){
                                if($categoryArr[$key]['id'] == $k){
                                    print_r($medalName["name"]);
                                }
                            }
                        ?>                         <ul class="mtm mgcl cl">
                        <?php 
                            for ($i=0;$i<count($v);$i++){
                                $medal = $v[$i];
                               // print_r($medal);
                        ?>                        <li>
                            <div id="medal_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display:none">
                                <div class="tip_horn"></div>
                                <div class="tip_c" style="text-align:left">
                                    <p><?php echo $medal['description'];?></p>
                                    <p class="mtn">
                                        <?php if($medal['expiration']) { ?>
                                        ��Ч�� <?php echo $medal['expiration'];?> ��,
                                        <?php } ?>
                                        <?php if($medal['permission'] && !$medal['price']) { ?>
                                        <?php echo $medal['permission'];?>
                                        <?php } else { ?>
                                        <?php if($medal['type'] == 0) { ?>
                                        �˹�����
                                        <?php } elseif($medal['type'] == 1) { ?>
                                        <?php if($medal['price']) { ?>
                                        <?php if($_G['setting']['extcredits'][$medal['credit']]['unit']) { ?>
                                        <?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?> <strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['unit'];?>
                                        <?php } else { ?>
                                        <strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?>
                                        <?php } ?>
                                        <?php } else { ?>
                                        ��������
                                        <?php } ?>
                                        <?php } elseif($medal['type'] == 2) { ?>
                                        �˹����
                                        <?php } ?>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div id="medal_<?php echo $medal['medalid'];?>" class="mg_img" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'medal_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});"><img src="<?php echo STATICURL;?>image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
                            <p class="xw1"><?php echo $medal['name'];?></p>
                            <p>
                                <?php if(in_array($medal['medalid'], $membermedal)) { ?>
                                ��ӵ��
                                <?php } else { ?>
                                <?php if($medal['type'] && $_G['uid']) { ?>
                                <?php if(in_array($medal['medalid'], $mymedals)) { ?>
                                <?php if($medal['price']) { ?>
                                �ѹ���
                                <?php } else { ?>
                                <?php if(!$medal['permission']) { ?>
                                ������
                                <?php } else { ?>
                                ����ȡ
                                <?php } ?>
                                <?php } ?>
                                <?php } else { ?>
                                <a href="javascript:;" onclick="showWindow('medal', 'home.php?mod=medal&action=confirm&medalid=<?php echo $medal['medalid'];?>')" class="xi2">
                                    <?php if($medal['price']) { ?>
                                    ����
                                    <?php } else { ?>
                                    <?php if(!$medal['permission']) { ?>
                                    ����
                                    <?php } else { ?>
                                    ��ȡ
                                    <?php } ?>
                                    <?php } ?>
                                </a>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </p>
                        </li>
                        <?php 

                            }
                            ?>                    </ul>
                        <?php 
                        }
                        } else { if($medallogs) { ?>
<p class="emp">���Ѿ��������ѫ���ˣ���ϲ����</p>
<?php } else { ?>
<p class="emp">û�п��õ�ѫ��</p>
<?php } } if($lastmedals) { ?>
<h3 class="tbmu">ѫ�¼�¼</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($lastmedals)) foreach($lastmedals as $lastmedal) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="t"><?php echo avatar($lastmedal[uid],small);?></a>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="xi2"><?php echo $lastmedalusers[$lastmedal['uid']]['username'];?></a> �� <?php echo $lastmedal['dateline'];?> ��� <strong><?php echo $medallist[$lastmedal['medalid']]['name'];?></strong> ѫ��
</li>
<?php } ?>
</ul>
<?php } } elseif($_GET['action'] == 'log') { if($mymedals) { 
$categoryArr = array(array('id' => 1, 'name' => '����һ'),
                           array('id' => 2, 'name' => '���Ͷ�'),
                           array('id' => 3, 'name' => '������')
                        );
$categoryMap = array_map();
//print_r($mymedals);
foreach($mymedals as $medal_m){
if(empty($categoryMap[$medal_m[category]])){
$categoryList=array($medal_m);
$categoryMap[$medal_m['category']] = $categoryList;
continue;
}
$categoryList = $categoryMap[$medal_m[category]];
array_push($categoryList,$medal_m);
$categoryMap[$medal_m['category']] = $categoryList;
}
//print_r($categoryMap);
foreach ($categoryMap as $k=>$v){
foreach ($categoryArr as $key=>$medalName){
if($categoryArr[$key]['id'] == $k){
print_r($medalName["name"]);
}
}
?><ul class="mtm mgcl cl"><?php 

                            for ($i=0;$i<count($v);$i++){
                                $mymedal = $v[$i];
?><li>
<div class="mg_img"><img src="<?php echo STATICURL;?>image/common/<?php echo $mymedal['image'];?>" alt="<?php echo $mymedal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
<p><strong><?php echo $mymedal['name'];?></strong></p>
</li><?php 
                            }
                            ?></ul><?php 
}
?><?php } if($medallogs) { ?>
<h3 class="tbmu">ѫ�¼�¼</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($medallogs)) foreach($medallogs as $medallog) { ?><li style="padding-left:10px;">
<?php if($medallog['type'] == 2 || $medallog['type'] == 3) { ?>
���� <?php echo $medallog['dateline'];?> ������ <strong><?php echo $medallog['name'];?></strong> ѫ��,<?php if($medallog['type'] == 2) { ?>�ȴ����<?php } elseif($medallog['type'] == 3) { ?>δͨ�����<?php } } elseif($medallog['type'] != 2 && $medallog['type'] != 3) { ?>
���� <?php echo $medallog['dateline'];?> �������� <strong><?php echo $medallog['name'];?></strong> ѫ��,<?php if($medallog['expiration']) { ?>��Ч��: <?php echo $medallog['expiration'];?><?php } else { ?>������Ч<?php } } ?>
</li>
<?php } ?>
</ul>
<?php if($multipage) { ?><div class="pgs cl mtm"><?php echo $multipage;?></div><?php } } else { ?>
<p class="emp">����û�л�ù�ѫ��</p>
<?php } } ?>
</div>
</div>
<div class="appl">
<div class="tbn">
<h2 class="mt bbda">ѫ��</h2>
<ul>
<li<?php if(empty($_GET['action'])) { ?> class="a"<?php } ?>><a href="home.php?mod=medal">ѫ������</a></li>
<li<?php if($_GET['action'] == 'log') { ?> class="a"<?php } ?>><a href="home.php?mod=medal&amp;action=log">�ҵ�ѫ��</a></li>
<?php if(!empty($_G['setting']['pluginhooks']['medal_nav_extra'])) echo $_G['setting']['pluginhooks']['medal_nav_extra'];?>
</ul>
</div>
</div>
</div><?php include template('common/footer'); ?>