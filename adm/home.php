<?php
$page_title = 'Dashboard';
$page_link = 'home';
$random_number = random_num(16);
$_SESSION['INCLUDE_CHECK'] = $random_number;
if(isset($_SESSION['com_carsit_adm_usrId']) == true){
?>
	<div class="content-header">
	<div class="header-icon"><i class="ti-close"></i></div>
	<div class="header-title">
		<h1><?php echo $page_title;?></h1>
		<small><?php echo strCompanyName;?></small>
		<ol class="breadcrumb">
			<li><a href="index.php?view=home">Home</a></li>
			<li class="active"><?php echo $page_title;?></li>
		</ol>
	</div>
</div>
    <section class="content" style="padding:15px;">




        <div class="row">
            <div class="col-md-12">


                <div align="center" class="text"><h1> Welcome to </h1><br> <h1><?php echo strCompanyName;?></h1></div>



            </div>
        </div>



    </section>
<style>
.panel-actions {
  margin-top: -20px;
  margin-bottom: 0;
  text-align: right;
}
.panel-actions a {
  color:#333;
}
.panel-fullscreen {
    display: block;
    z-index: 9999;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    overflow: auto;
}
</style>
<script>
$(document).ready(function () {
    //Toggle fullscreen
    $("#panel-fullscreen").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('fa fa-expand'))
        {
            $this.children('i').removeClass('fa fa-expand');
            $this.children('i').addClass('fa fa-compress');
        }
        else if ($this.children('i').hasClass('fa fa-compress'))
        {
            $this.children('i').removeClass('fa fa-compress');
            $this.children('i').addClass('fa fa-expand');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
});


</script>

<?php
}else{
?>
<script type="text/javascript">
	window.location.href = ('index.php');				
</script>
<?php
}
?>
