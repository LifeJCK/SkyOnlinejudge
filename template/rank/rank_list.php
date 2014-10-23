<?php
if(!defined('IN_TEMPLATE'))
{
  exit('Access denied');
}
?>
<script>
$(document).ready(function()
{
    $('#b_add').tooltip();
})
</script>

<div id = "image-bar"></div>
<div class="container">

    <div>
        <div class="page-header">
                <h1>解題統計 <small>網羅各大OJ資訊</small></h1>
        </div>

        <table class = "table">
        <thead>
            <tr>
                <th style = "width: 40px"></th>
                <th>NAME</th>
                <th style = 'width: 140px'>
                <?php if($_G['uid']): ?>
                <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="新增記分板" id="b_add" onclick="location.href='rank.php?mod=cbedit'">-->
                    TOOLS
                    <span class = "icon-bttn" title = "Create New" onclick="location.href='rank.php?mod=cbedit'">
                    <span class="glyphicon glyphicon-plus"></span>
                    </span>
                <!--</button>-->
                <?php endif;?>
                </th>
                <th style = "width: 180px">FOUNDER</th>
                <th style = "width: 100px">STATUS</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($_E['template']['row'] as $row){ ?>
            <tr style = "height: 40px">
                <td><?=$row['id'];?></td>
                <td><a href="rank.php?mod=commonboard&id=<?=$row['id'];?>"><?=htmlspecialchars($row['name']);?></a></td>
                <td>
                    <?php if($_G['uid']): ?>
                        <!--<span class="icon-bttn glyphicon glyphicon-plus-sign" title="加入"></span>
                        <span class="icon-bttn glyphicon glyphicon-remove" title="離開"></span>-->
                        <?php if(userControl::getpermission($row['owner'])): ?>
                        <span class = "icon-bttn">
                        <span class="glyphicon glyphicon-pencil" onclick="location.href='rank.php?mod=cbedit&id=<?=$row['id'];?>'" title="編輯">
                        </span></span>
                        
                        <span class = "icon-bttn">
                        <span class="glyphicon glyphicon-lock" title="鎖定">
                        </span></span>
                        
                        <span class = "icon-bttn">
                        <span class="glyphicon glyphicon-trash" title="移除">
                        </span></span>
                        <?php endif;?>
                    <?php endif;?>
                </td>
                <td><?=htmlspecialchars($_E['template']['nickname'][$row['owner']])?></td>
                <td>
                    <span class = 'jointoggle-on'>
                        <span class = 'AC'>●</span>
                        <span>joined</span>
                    </span>
                </td>
            </tr>
        <?php }?>
        </tbody>
        
        </table>
    </div>
    
    <center>
        <ul class="page-nav">
            <?php
                $_L = max($_E['template']['pagerange']['0'],$_E['template']['pagerange']['1']-1);
                $_R = max($_E['template']['pagerange']['2'],$_E['template']['pagerange']['1']+1);
            ?>
            <li><a href="rank.php?mod=list&page=<?=$_L ?>">&laquo;</a></li>
            <?php for($i=$_E['template']['pagerange']['0'];$i<=$_E['template']['pagerange']['2'];$i++){ ?>
                <?php if($i==$_E['template']['pagerange']['1']): ?>
                    <li class="active"><a href="rank.php?mod=list&page=<?=$i?>"><?=$i?></a></li>
                <?php else:?>
                    <li><a href="rank.php?mod=list&page=<?=$i?>"><?=$i?></a></li>
                <?php endif;?>
            <?php }?>
            <li><a href="rank.php?mod=list&page=<?=$_R ?>">&raquo;</a></li>
        </ul>
    </center>
    
</div>