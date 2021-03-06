<!DOCTYPE html>
<html>
<head lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Dingtalk Robot WebHook Example</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="stylesheet" href="Source/amazeui.min.css">
<style>
.header {
  text-align: center;
  }
.header h1 {
  font-size: 200%;
  color: #333;
  margin-top: 30px;
  }
.header p {
  font-size: 14px;
  }
</style>
</head>

<body>
<div class="header">
  <div class="am-g">
    <h1>钉钉机器人 WebHook 示例</h1>
    <p>Worked by Charlie.Pan(AYUMI Team)</p>
  </div>
  <hr>
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>发送消息</h3>
    <hr>
    <br>

    
    <?php 
    if($_GET['r']=='success'){echo '<p class="am-alert am-alert-success">推送成功！快去群里看看吧。</p>'; }
    if($_GET['r']=='wrong'){echo '<p class="am-alert am-alert-danger">刚刚的推送失败鸟。错误信息是'.$_GET['e'].'</p>'; }
    if($_GET['r']=='illgal'){echo '<p class="am-alert am-alert-warning">不合法的访问请求！</p>'; }
    $pass="11223344556677889900";//你懂的，和do.php里面保持一致
    $timestamp=time();
    $random=rand();
    $token= md5("DTRobotV1".$pass.$timestamp.$random);
    ?>


    <form method="post" class="am-form" action="do.php?t=<?php echo $timestamp ?>&r=<?php echo $random ?>&token=<?php echo $token ?>">
      <label for="urls">WebHook Token：</label>
      https://oapi.dingtalk.com/robot/send?access_token=
      <input type="text" name="urls" id="urls" value="<?php echo $_COOKIE["Lasteseturl"];?>" required="true"/>
      <br>
      <label for="type1">消息类型：
      <select name="type1" id="type1" class="data-am-selected">
      <option value="text">文本消息</option>
      <option value="link">图文消息</option>
      </select>
      </label>
      <br>
      <label for="messages">消息内容:</label>
      <textarea name="messages" id="messages" required="true" rows=5></textarea>
      <br>
      <label for="titles">消息标题(当且仅当【图文消息】有效必填，【文本消息】无效无需填写)</label>
      <input type="text" name="titles" id="titles"/>
      <br>
      <label for="messageUrl">点击消息跳转的URL：（当且仅当【图文信息】有效且必填）</label>
      <input type="text" name="messageUrl" id="messageUrl" />
      <br>
      <label for="picUrl">图片URL：（当且仅当【图文信息】有效但选填）</label>
      <input type="text" name="picUrl" id="picUrl" />
      <br>
      <label for="isAtAll">AT群内全员？（当且仅当【文本消息】有效）
      <select name="isAtAll" id="isAtAll" class="data-am-selected">
      <option value="false">否</option>
      <option value="true">是</option>
      </select>
      </label>
      <br>
      <br>
      <div class="am-cf">
        <input type="submit" name="" value="推 送" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>
    <hr>
    <p>© 2017 Charlie.Pan（AYUMI Team）|钉钉机器人 WebHook 示例V0.2|仅供团队开发测试使用</p>
  </div>
</div>


</body></html>