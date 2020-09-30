<?php 
	
	[$locationParam, $startDate, $endDate] = $this->getParams();
	
	$results = $this->getResults();
	
?>
	<div class="row-fluid">
		
    <?php
        if (sizeof($this->getLocations()) > 1){
	?>
					
	<div class="list-filter" id="filter-list-filter">
		
	    <form id="filter-form" class="form-inline" accept-charset="utf-8" method="GET" action="<?= admin_url('thoughtco/reports/dashboard'); ?>" role="form">
		    	
	        <div class="d-sm-flex flex-sm-wrap w-100 no-gutters">
		        
				<div class="col-sm-3 pr-5">
					
					<div class="filter-scope form-group">
						
						<label for="fld-location">Location</label>
						<select name="location" class="form-control select2-hidden-accessible" id="fld-location">
							<?php 
								foreach ($this->getLocations() as $key=>$location) echo '<option value="'.$key.'"'.($key == $locationParam ? ' selected' : '').'>'.$location.'</option>'; 
							?>
            			</select>
            			
            		</div>
            		
		        </div>	 
		        
				<div class="col-sm-2 pr-5">
					
					<div class="filter-scope date form-group">
						
						<label for="datepicker-formfixeddate-date-fixed-startdate">Start Date</label>
						<div id="datepicker-formfixeddate-fixed-startdate" class="control-datepicker">
                    
							<div class="input-group">
								<input type="text" id="datepicker-formfixeddate-date-fixed-startdate" class="form-control" autocomplete="off" value="<?= $startDate->format('d-m-Y'); ?>" data-control="datepicker" data-format="dd-mm-yyyy">
							    <span class="input-group-prepend" data-original-title="" title="">
							        <span class="input-group-icon" data-original-title="" title=""><i class="fa fa-calendar-o"></i></span> 
							    </span>
							    <input type="hidden" name="start_date" value="<?= $startDate->format('Y-m-d'); ?>" data-datepicker-value="<?= $startDate->format('Y-m-d'); ?>">
							</div>
            			
            			</div>						
            			
            		</div>
            		
		        </div>      
		        
				<div class="col-sm-2 pr-5">
					
					<div class="filter-scope date form-group">
						
						<label for="datepicker-formfixeddate-date-fixed-enddate">End Date</label>
						<div id="datepicker-formfixeddate-fixed-enddate" class="control-datepicker">
                    
							<div class="input-group">
								<input type="text" id="datepicker-formfixeddate-date-fixed-enddate" class="form-control" autocomplete="off" value="<?= $endDate->format('d-m-Y'); ?>" data-control="datepicker" data-format="dd-mm-yyyy">
							    <span class="input-group-prepend" data-original-title="" title="">
							        <span class="input-group-icon" data-original-title="" title=""><i class="fa fa-calendar-o"></i></span> 
							    </span>
							    <input type="hidden" name="end_date" value="<?= $endDate->format('Y-m-d'); ?>" data-datepicker-value="<?= $endDate->format('Y-m-d'); ?>">
							</div>
            			
            			</div>						
            			
            		</div>
            		
		        </div> 		        
		        		        
				<div class="col-sm-1">
					
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-primary"><?= lang('lang:thoughtco.kitchendisplay::default.btn_view') ?></button>
					
				</div>
        
	    	</div>
	    	
		</form>
		
	</div>
	
    <?php 
        }
    ?>	 
        
	<div class="row mx-1">
			
		<div class="col col-sm-4">
			<div class="card bg-light p-3 shadow-sm">
				<div class="card-counter sale">
					<i class="stat-icon  bg-success text-white fa fa-line-chart"></i>
					<span class="stat-number"><?= $results->total_sales; ?></span>
					<span class="stat-text">Total Sales</span>
				</div>
			</div>
		</div>

		<div class="col col-sm-4">
			<div class="card bg-light p-3 shadow-sm">
				<div class="card-counter sale">
					<i class="stat-icon  bg-success text-white fa fa-line-chart"></i>
					<span class="stat-number"><?= $results->total_orders; ?></span>
					<span class="stat-text">Total Orders</span>
				</div>
			</div>
		</div>

		<div class="col col-sm-4">
			<div class="card bg-light p-3 shadow-sm">
				<div class="card-counter sale">
					<i class="stat-icon  bg-success text-white fa fa-line-chart"></i>
					<span class="stat-number"><?= $results->quantity_of_items; ?></span>
					<span class="stat-text">Total Items</span>
				</div>
			</div>
		</div>
								 
	</div>
	
	<div class="row mx-1 mt-4">
		
		<div class="col col-sm-6">
			<div class="card bg-light p-3 shadow-sm">
				<div class="card-title">Top Customers</div>
				<div class="card-body">
				<?php foreach ($results->top_customers as $item){ ?>
					<dd><?= $item->name ?> (<?= currency_format($item->value) ?>)</dd>
				<?php } ?>
				</div>
			</div>
		</div>

		<div class="col col-sm-6">
			<div class="card bg-light p-3 shadow-sm">
				<div class="card-title">Top Items</div>
				<div class="card-body">
				<?php foreach ($results->top_items as $item){ ?>
					<dd><?= $item->name ?> (<?= $item->quantity ?>)</dd>
				<?php } ?>
				</div>
			</div>
		</div>
		
	</div>
		    	    
</div>
