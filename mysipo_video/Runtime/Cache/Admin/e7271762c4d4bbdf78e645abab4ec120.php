<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|思博网管理平台</title>
    <link href="/mysipo_video/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/mysipo_video/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/mysipo_video/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/mysipo_video/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/mysipo_video/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/mysipo_video/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
    <link rel="stylesheet" href="/mysipo_video/Public/Admin/css/series.css">

     <!--[if lt IE 9]>
    <script type="text/javascript" src="/mysipo_video/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/mysipo_video/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/mysipo_video/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        <div id="subnav" class="subnav">
    <?php if(is_array($nodes)): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
        <?php if(!empty($sub_menu)): ?><h3>
            	<i class="icon <?php if(($sub_menu['current']) != "1"): ?>icon-fold<?php endif; ?>"></i>
            	<?php if(($sub_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (u($sub_menu["url"])); ?>"><?php echo ($sub_menu["title"]); ?></a><?php else: echo ($sub_menu["title"]); endif; ?>
            </h3>
            <ul class="side-sub-menu <?php if(($sub_menu["current"]) != "1"): ?>subnav-off<?php endif; ?>">
                <?php if(is_array($sub_menu['_child'])): $i = 0; $__LIST__ = $sub_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li <?php if($menu['id'] == $cate_id or $menu['current'] == 1): ?>class="current"<?php endif; ?>>
                        <?php if(($menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (u($menu["url"])); ?>&cate_id=<?php echo ($sub_menu["id"]); ?>"><?php echo ($menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($menu["title"]); ?></a><?php endif; ?>

                        <!-- 一级子菜单 -->
                        <?php if(isset($menu['_child'])): ?><ul class="subitem">
                        	<?php if(is_array($menu['_child'])): foreach($menu['_child'] as $key=>$three_menu): ?><li>
                                <?php if(($three_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo (u($three_menu["url"])); ?>"><?php echo ($three_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($three_menu["title"]); ?></a><?php endif; ?>
                                <!-- 二级子菜单 -->
                                <?php if(isset($three_menu['_child'])): ?><ul class="subitem">
                                	<?php if(is_array($three_menu['_child'])): foreach($three_menu['_child'] as $key=>$four_menu): ?><li>
                                        <?php if(($four_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo U('index','cate_id='.$four_menu['id']);?>"><?php echo ($four_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($four_menu["title"]); ?></a><?php endif; ?>
                                        <!-- 三级子菜单 -->
                                        <?php if(isset($four_menu['_child'])): ?><ul class="subitem">
                                        	<?php if(is_array($four_menu['_child'])): $i = 0; $__LIST__ = $four_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$five_menu): $mod = ($i % 2 );++$i;?><li>
                                            	<?php if(($five_menu['allow_publish']) > "0"): ?><a class="item" href="<?php echo U('index','cate_id='.$five_menu['id']);?>"><?php echo ($five_menu["title"]); ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo ($five_menu["title"]); ?></a><?php endif; ?>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                        <!-- end 三级子菜单 -->
                                    </li><?php endforeach; endif; ?>
                                </ul><?php endif; ?>
                                <!-- end 二级子菜单 -->
                            </li><?php endforeach; endif; ?>
                        </ul><?php endif; ?>
                        <!-- end 一级子菜单 -->
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endif; ?>
        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
    $(function(){
        $(".side-sub-menu li").hover(function(){
            $(this).addClass("hover");
        },function(){
            $(this).removeClass("hover");
        });
    })
</script>

        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
  <!-- 标题栏 -->
  
  <div class="main-title">
    <h2>批阅管理</h2>
  </div>
  <div class="tools clearfloat"> <a class="btn" href="<?php echo U('add');?>" style="">新 增</a> 
    <!-- <button class="btn ajax-post" target-form="ids" url="<?php echo U('ser/setStatus',array('status'=>1));?>">启 用</button>
        <button class="btn ajax-post" target-form="ids" url="<?php echo U('ser/setStatus',array('status'=>0));?>">禁 用</button> --> 
    <!-- <a class="btn" href="<?php echo U('generate');?>">删除</a> --> 
  </div>
  
<div>    
    <br/>
    <br/>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file"/> 
    <input type="submit" name="submit" value="批量上传" />
    </form>
    <br/>
    <br/>
</div> 
  
  <!-- 数据列表 -->
  <div class="data-table">
    <div class="data-table table-striped">
      <table class="">
        <thead>
          <tr>
            <th>案例类型</th>
            <th>会员名称</th>
            <th>作业id</th>
            <th>分数</th>
            <th>状态</th>
            <th>发布时间</th>
            <th>批阅时间</th>
            <!-- <th>排序</th> -->
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
        <tbody>
         
        <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($vo["lesson"]["live_title"]); ?> (一)</td>
              <td><?php echo ($vo["username"]); ?></td>
              <td><?php echo ($vo["series_id"]); echo ($vo["lesson_id"]); echo ($vo["user_id"]); ?></td>
              <td><?php echo ($vo["fraction"]); ?></td>
              <td>未审阅</td>
              <td><?php echo (substr($vo["lesson"]["live_start_time"],0,10)); ?></td>
              <td><?php echo (date("Y-m-d",$vo["uploadTime"])); ?></td>
              <td><a title="编辑" href="<?php echo U('edit?id='.$video['video_id']);?>">下载附件</a>  <a title="编辑" href="<?php echo U('edit?id='.$video['video_id']);?>">上传附件</a>  <a class="confirm ajax-get" title="删除" href="<?php echo U('del?id='.$video['video_id']);?>">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        
        <?php else: ?>
            <td colspan="10" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
        
        </tbody>
      </table>
    </div>
  </div>
  <div class="page"> <?php echo ($_page); ?> </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.mysipo.com" target="_blank">思博知网</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/mysipo_video", //当前网站地址
            "APP"    : "/mysipo_video/index.php?s=", //当前项目地址
            "PUBLIC" : "/mysipo_video/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/mysipo_video/Public/static/think.js"></script>
    <script type="text/javascript" src="/mysipo_video/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
  <script src="/mysipo_video/Public/static/thinkbox/jquery.thinkbox.js"></script>

</body>
</html>