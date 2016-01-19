<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>方案详情</title>

    <!-- Bootstrap & Snippet plugin core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="stickup.css" rel="stylesheet">   -->
     <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
     <style type="text/css">
      .head
      {
        background-color: #f1f0f5;
        height: 50px;
        width: 100%;
        line-height: 50px;
        text-align: center;
      }
      .float 
      {
        float: left;
        margin-left: 20px;
      }
      .title
      {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        font-weight: bold;
      }
      .content
      {
        text-align: left;
        padding-left: 30px;
        padding-right: 30px;
        margin-top: 30px;
      }
      .info
      {
        margin-bottom: 50px;
      }
      .head-time
      {
        float:right;
        margin-right:20px;
      }
      .labels
      {
        margin-left: 30px;
        margin-top: 10px;
        margin-bottom: 10px;        
      }
      .label-infos
      {
        margin-left: 8px;
        color:#b51d44;
      }
      .span
      {
        color:#b51d44;
      }
     </style>
   
  </head>
  <body>
    <div class="head">
      <div class="float">
          <img src="<?php echo base_url();?>images/logo.jpg" width="40px" height="40px"/>
          <span style="margin-left:10px" class="span"><?php echo $nickname;?></span>
      </div>
      <div class="head-time">
        <span class="span"><?php echo $publish_date;?></span>
      </div>
    </div>
    <div class="labels">
      <img src="<?php echo base_url();?>/images/label.png" style="width:20px;height:20px"/>
      <?php foreach ($label as $item ):?>
      <span class="label-infos"><?php echo $item;?></span>
    <?php endforeach;?>
    </div>
    <div>
      <img src="<?php echo $imagepath;?>" class="img-responsive" style="width:100%">
      <input type="hidden" id="imagepath" value="<?php echo $imagepath;?>"/>
    </div>
    <div class="info">
      <div class="title"><?php echo $title;?></div>
      <div class="content"><?php echo $content;?></div>
    </div>
  </body>
  </html>

