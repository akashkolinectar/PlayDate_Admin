<header class="panel-heading">
  <h1 class="h4">Interested</h1>
</header>

<div class="panel-body"><!-- Body -->
        <?php echo form_open('interested'); ?>
        <div class="table-responsive"> 
                <div class="row">
                    <div class="col-md-6">
                        <label class="">Interested Name</label>
                        <input type="text" name="name" value="<?php echo $this->input->post('name');?>" class="form-control col-md-12">
                        <br />
                    </div>
                    <div class="col-md-5">
                        <br />
                        <input type="submit" value="Add Interested" class="btn btn-success btn-sm" style="margin-top: 10px;" />
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-danger"><?php echo validation_errors(); ?></span>
                    </div>
                </div>                            
        </div>
        <?php echo form_close(); ?>
	<!-- Top container -->
	<div class="clearfix mt-2 mb-2">
		<span class="float-left records d-none d-sm-block">
                    <span class="h5">Total records: <?php echo isset($response['data'])?count($response['data']):0;?></span>
		</span>
		<div class="float-right"><!-- ng-if="filterData.CategoryTypes.length>1" -->
		</div>
	</div>
	<!-- Top container/ -->


	<!-- Data table -->
	<div class="table-responsive"> 
		<!-- data table -->
		<table class="table table-striped table-condensed table-hover table-sortable">
			<!-- table heading -->
			<thead>
				<tr>
					<th>Name</th>
					<th style="width: 100px;" class="text-center">Action</th>
				</tr>
			</thead>
			<!-- table body -->
			<tbody id="tabledivbody">
                            <?php if(isset($response['data']) && count($response['data']) > 0){ ?>
                            <?php foreach ($response['data'] as $item): ?>
				<tr>
                                        <td><strong><?php echo $item['name']?></strong></td>
					<td class="text-center">
						<div class="dropdown">
							<button class="btn btn-secondary  btn-sm action" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#8230;</button>
							<div class="dropdown-menu dropdown-menu-left">
                                                                <a class="dropdown-item" href="<?php echo base_url('interested/update/'.$item['id']);?>">Update</a>
							</div>
						</div>
					</td>
				</tr>
                            <?php endforeach; }else{ ?>
                                <tr>
                                    <td colspan=""><h3>-- NO RECORD FOUND --</h3></td>
                                </tr>
                            <?php } ?>
			</tbody>
		</table>
	</div>
	<!-- Data table/ -->
</div><!-- Body/ -->



