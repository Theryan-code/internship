<script type="text/javascript">
$(document).ready(function() {
    $('#customer').select2();
    if($('#level').val()=='1'){
	  	$("#tampilan_customer").hide();
	}else if($('#level').val()=='2'){
		$("#tampilan_customer").show();
	}

    $("#level").change(function() {
	  if($('#level').val()=='1'){
	  	$("#tampilan_customer").hide();

	  }else if($('#level').val()=='2'){
		$("#tampilan_customer").show();
	  }

	});
});
</script>

<section class="content-header">
    <h1>Users
        <small>Pengguna / Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Edit User</h3>
			<div class="pull-right">
				<a href="<?=site_url('user')?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
				<form action="" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Name *</label>
							<input type="hidden" name="user_id" value="<?=$row->user_id?>">
							<input type="text" name="name" id="name" value="<?=$row->name?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="username">Username *</label>
							<input type="text" name="username" id="username" value="<?=$row->username?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea name="address" id="address" class="form-control"><?=$row->address?></textarea>
						</div>
						<div class="form-group">
							<label for="level">Level *</label>
							<select name="level" id="level" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="1" <?=$row->level == 1 ? 'selected' : null?>>Admin</option>
								<option value="2" <?=$row->level == 2 ? 'selected' : null?>>Customer</option>
							</select>
						</div>
						<div class="form-group <?=form_error('customer') ? 'has-error' : null?>"  id="tampilan_customer">
							<label for="customer">Customer</label>
							<select name="customer" id="customer" class="form-control">
                                <option value=0>- Pilih -</option>
                                <?php foreach($customer as $cst => $data) {
                                	if($data->customer_id==$row->customer_id){
                                		echo '<option value='.$data->customer_id.' selected>'.$data->name.'</option>';
                                	}else{
                                		echo '<option value='.$data->customer_id.'>'.$data->name.'</option>';
                                	}
                                    
                                } ?>
                            </select>
							<?=form_error('customer')?>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="edit" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button> 
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>