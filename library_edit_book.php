<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$book_number = $_POST['book_number'];
	 $book_category_id = $_POST['book_category_id'];
	 $book_name=$_POST['book_name'];
	 $book_description=$_POST['book_description'];
	 $book_author=$_POST['book_author'];
	//$school_logo = $_POST['school_logo'];
	
	 $sql1="SELECT * FROM book_manager where book_number='".$book_number."' and `book_id` != '" . $_GET['sid'] . "'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	  $sql3="UPDATE book_manager SET `book_number` = '".$book_number."',book_category_id='".$book_category_id."',`book_name` = '".$book_name."',book_description='".$book_description."',`book_author` = '".$book_author."'   WHERE `book_id` = '" . $_GET['sid'] . "'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:library_book_manager.php?msg=3");
	}else
		{    header("location:library_edit_book.php?error=2&&sid=".$_GET['sid']);
			
		}
}


if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Book Detail Already Exists  </h4></span>";
	}
	
		
	$sql2="SELECT * FROM book_manager WHERE `book_id` = '" . $_GET['sid'] . "'";
	$res2=mysql_query($sql2);	
	$row2=mysql_fetch_array($res2);
		
  ?>
<div class="page_title">
	<!--	<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>-->
		<div class="top_search">
			<form action="#" method="post">
				<ul id="search_box">
					<li>
					<input name="" type="text" class="search_input" id="suggest1" placeholder="Search...">
					</li>
					<li>
					<input name="" type="submit" value="" class="search_btn">
					</li>
				</ul>
			</form>
		</div>
	</div>
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Edit book detail</h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Category   Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="book_category_id" >
								<option value="" selected="selected"> - Select ctegory - </option>
							<?php
							 $sql="SELECT * FROM library_category  ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									
									if($row2['book_category_id']==$row['library_category_id']){
										$select_sel='selected="selected"';
										}
									else{
										$select_sel='';
										
										}
									?>
									<option <?php echo $select_sel; ?> value="<?php echo $row['library_category_id']; ?>"><?php echo $row['category_name']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Category name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Book Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="book_name" type="text" value="<?php echo $row2['book_name'];?>" />
											
											<span class=" label_intro">book name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Author Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="book_author" type="text" value="<?php echo $row2['book_author'];?>" />
											
											<span class=" label_intro">Author name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Book number</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="book_number" type="text"  value="<?php echo $row2['book_number'];?>" />
											
											<span class=" label_intro">Book number</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Book Description</label>
                                     <div class="form_input">
										<div class="form_grid_5 alpha">
											<textarea  name="book_description" rows="4" cols="20"><?php echo $row2['book_description'];?></textarea>
											
											<span class=" label_intro"> Book Description</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" class="btn_small btn_blue" name="submit"><span>Save</span></button>
										
										<a href="library_book_manager.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
									</div>
								</div>
								</li>
							</ul>
						</form>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>