<header class="panel-heading">
  <h1 class="h4">Update Interested</h1>
</header>

<div class="panel-body"><!-- Body -->
	<!-- Top container -->
        <div class="float-right"><!-- ng-if="filterData.CategoryTypes.length>1" -->
                <a class="btn btn-success btn-sm ml-1" href="<?php echo site_url('interested'); ?>" >Interested List</a>
        </div>
	<!-- Data table -->
        <?php echo form_open('interested/update/'.$interested['id']); ?>
        <div class="table-responsive"> 
		<!-- data table -->
                <div class="row">
                    <div class="col-md-6">
                        <label class="">Interested Name</label>
                        <input type="text" name="name" value="<?php echo ($interested['name'])?$interested['name']:$this->input->post('name'); ?>" class="form-control col-md-12">
                        <br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-danger"><?php echo validation_errors(); ?></span>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-5">
                        <br />
                        <input type="submit" value="Update Interested" class="btn btn-success btn-sm" />
                    </div>
                </div>
                <?php echo form_close(); ?>
                <br />
	</div>
	<!-- Data table/ -->
</div><!-- Body/ -->



