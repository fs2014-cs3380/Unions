	
	<div class="modal fade" id="add_item_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
				<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title titles" id="add_type" style="color: black;">Please enter the new Item Type</h4>
		  </div>
		  <div class="modal-body">
					<div class="credentials input">
						<input type="text" name="item_type" id="item_type" placeholder="Item Type" class="box" title="Please provide your username" />
					</div>
				</div>
				  <div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-default" type="button" name="submit" value="Add" onclick="addType('item_type', 'item_id');">
				  </div>
			
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->