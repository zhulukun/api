<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>最新</title>

    <!-- Bootstrap & Snippet plugin core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="stickup.css" rel="stylesheet">   -->
     <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.zlight.menu.1.0.min.js"></script>
    <!-- ### IMPORTANT ### stickUp javascript file -->
    <!-- ######################################### --> 
    <script src="<?php echo base_url();?>js/stickUp.min.js"></script>
    <!-- ######################################### -->

    <!-- ### IMPORTANT ### stickUp options in use -->
    <!-- ######################################## -->
    <script>
    $(document).ready(function(){
      $('#zlight-nav').zlightMenu();

      $('.nav-tabs li').click(function() {
                
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');

              });


    });
  </script>
     <script type="text/javascript">
      $(function(){
      // 初始化轮播
         $("#myCarousel").carousel('cycle');
         $('#myCarousel').carousel({
              interval: 2000
            })
      });
   </script>
   <style type="text/css">
   body
    {
      overflow-x: hidden;
    }
    img
    {
      min-width: 100%;
    }
    .nav-tabs {
    border-bottom: 1px solid #E25353;
    border-top: 1px solid #E25353;
    color: #000000;
    }
    .nav-tabs>li {
    float: left;
    /*margin-top: -1px;
    border-top: 3px solid #E25353;*/
    margin-bottom:0px;
    }
    .topnav
    {
          position: fixed;
          /*top: 0px;*/
          background: #FFFFFF;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus
    {
      border: none;
      background: none;
      color:#E25353;
      border-top: 3px solid #E25353;
    }
    .nav-tabs>li>a, .nav-tabs>li>a:hover, .nav-tabs>li>a:focus
    {
      border: none;
      background: none;
/*      border-top: 3px solid #E25353;
*/    }
    .nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.428571429;
    border: none;
    border-radius: 0 0 0 0;
    }
    a {
    color: #000000;
    text-decoration: none;
    }
    .nav-tabs>li>a 
    {
        padding-left:0px;
        padding-right: 0px;
    }
    .nav-tabs>li>a 
    {
      margin-left: 10px;
      margin-right: 10px; 
    }
   </style>
  </head>
  <body>
    <!-- START THE COVER -->

          <div id="myCarousel" class="carousel slide">
   <!-- 轮播（Carousel）指标 -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   <!-- 轮播（Carousel）项目 -->
   <div class="carousel-inner">
            <?php 
            for($i=0;$i<count($pptinfo);$i++)
            {
              $path=$pptinfo[$i]['imagepath'];
              $url=base_url().'index.php/planinfo/index/plan_id/'.$pptinfo[$i]['id'];
              $title=$pptinfo[$i]['title'];
              if ($i == 0) {
                echo  '<div class="item active">
         <img src='.$path.' class="img-responsive" alt="First slide">
         <div class="carousel-caption"><a href='.$url.'>'.$title.'</a></div>
      </div>';
              }
              else
              {
                 echo  '<div class="item">
         <img src='.$path.' class="img-responsive" alt="First slide">
         <div class="carousel-caption"><a href='.$url.'>'.$title.'</a></div>
      </div>';
              }
            }



            ?>

       </div>
   <!-- 轮播（Carousel）导航 -->
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
</div> 

    <div id="home">
    <!-- START THE NAVBAR -->
    <div id="zlight-nav" class="navbar-wrapper topnav" style=" width:100%;">
        <ul class="nav nav-tabs" style="background: #FFFFFF;">
            <li class="active"><a href="<?php echo base_url();?>index.php/home"><?php echo $new;?></a></li>

        <?php 
            for ($i=0; $i < count($info); $i++) { 

                  echo '<li><a href="'.base_url().'index.php/home/index/cat/'.$info[$i]['id'].'">'.$info[$i]['category_cn'].'</a></li>';
                
            }

        ?>

  </ul>
    </div>
  </div>
    <div>
    <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>
      <div class="item active">
         <img src="<?php echo base_url();?>images/slide1.png" class="img-responsive" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php echo base_url();?>images/slide2.png" class="img-responsive" alt="Second slide">
      </div>


    </div>



