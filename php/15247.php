<script>
	<?php include __DIR__ . "/js/alerts_js.php"; ?>
</script>

<!-- Alerts dialog -->
<div class="ui2 modal2 page" id="alerts">
	<div class="title">
		<h1>Alerts</h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<script type="text/javascript">
			$(document).ready(function () {
				$.tab2({
					tabs: [
						{title: "Alerts", content: $(".page#alerts #tab-alerts")},
						{title: "Alert Rules", content: $(".page#alerts #tab-alert-rules")}
					],
					width: 700,
					height: 320
				}).appendTo(".page#alerts .content");
			});
		</script>
		<div id="tab-alerts">
			<div class="table-wrapper" style="overflow: auto; height: 286px;">
				<table class="table2 zebra hoverable hl-first-column text-center">
					<thead>
						<tr>
							<th>Alert Name</th>
							<th>Alert Rule Name</th>
							<th>Author</th>
							<th>Recipients</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Workshop TPMS</td>
							<td>Tire Events</td>
							<td>Joe</td>
							<td>joe@123trackme.com +2</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="text-align: right;">
				<button class="input2" id="new-alert">New Alert</button>
			</div>
		</div>
		<div id="tab-alert-rules">
			<div class="table-wrapper" style="overflow: auto; height: 286px;">
				<table class="table2 zebra hoverable hl-first-column text-center">
					<thead>
						<tr>
							<th>Rule Name</th>
							<th>Author</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tire Events</td>
							<td>Joe</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="text-align: right;">
				<button class="input2" id="new-alert-rule">New Alert Rule</button>
			</div>
		</div>

	</div>
</div>
<!-- /Alerts dialog -->


<!-- Edit Alert dialog -->
<div class="ui2 modal2 page" id="edit-alert">
	<div class="title">
		<h1>Alert &mdash; <strong>Workshop TPMS</strong></h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<div class="input-row">
			<div class="input-group" style="width: 250px;">
				<label>Rule Name</label>
				<select class="input2">
					<option></option>
					<option>Tire Events</option>
				</select>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function () {
				$.tab2({
					tabs: [
						{title: "Vehicles", content: $(".page#edit-alert #tab-vehicles")},
						{title: "Recipients", content: $(".page#edit-alert #tab-recipients")}
					],
					width: 500,
					height: 250
				}).appendTo(".page#edit-alert .content");
			});
		</script>
		<div id="tab-vehicles">
			<div class="table-wrapper" style="width: 100%; overflow: auto; height: 250px;">
				<table class="table2 hoverable sortable compact zebra text-center">
					<thead>
						<tr>
							<th></th>
							<th>Device ID</th>
							<th>Identification</th>
							<th>Fleet</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox"></td>
							<td>00000000000000</td>
							<td>Vehicle Name</td>
							<td>Fleet Name</td>
						</tr>
						<tr>
							<td><input type="checkbox"></td>
							<td>00000000000000</td>
							<td>Vehicle Name</td>
							<td>Fleet Name</td>
						</tr>
						<tr>
							<td><input type="checkbox"></td>
							<td>00000000000000</td>
							<td>Vehicle Name</td>
							<td>Fleet Name</td>
						</tr>
						<tr>
							<td><input type="checkbox"></td>
							<td>00000000000000</td>
							<td>Vehicle Name</td>
							<td>Fleet Name</td>
						</tr>
						<tr>
							<td><input type="checkbox"></td>
							<td>00000000000000</td>
							<td>Vehicle Name</td>
							<td>Fleet Name</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div id="tab-recipients">
			<div class="table-wrapper" style="width: 100%; overflow: auto; height: 211px;">
				<table class="table2 hoverable compact zebra text-center">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th style="width: 32px;"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Joe</td>
							<td>joe@123trackme.com</td>
							<td style="padding: 2px;">
								<button class="input2 icon as-input danger"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="margin-top: 5px">
				<button class="input2" id="add-recipient"><i class="fa fa-plus"></i> <span>Recipient</span></button>
			</div>
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">Save</button>
	</div>
</div>
<!-- /Edit Alert dialog -->


<!-- Add Recipient dialog -->
<div class="ui2 modal2 page" id="add-recipient">
	<div class="title">
		<h1>Add Recipient</h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<div class="input-row">
			<div class="input-group" style="margin-bottom: 10px;">
				<label>Recipient Type</label>
				<label class="checkbox" style="display: inline-block; margin-right: 20px;"><input type="radio" name="alerts-add-recipient-type" value="user" checked> <span>User</span></label>
				<label class="checkbox" style="display: inline-block;"><input type="radio" name="alerts-add-recipient-type" value="not-user"> <span>Not User</span></label>
			</div>
		</div>
		<div class="input-row" id="user">
			<div class="input-group" style="width: 431px;">
				<label>Pick a user name</label>
				<select class="input2">
					<option></option>
					<option>Joe</option>
				</select>
			</div>
		</div>
		<div class="input-row" id="not-user" style="display: none;">
			<div class="input-group">
				<label>Name</label>
				<input class="input2" type="text">
			</div>
			<div class="input-group" style="width: 250px;">
				<label>E-mail</label>
				<input class="input2" type="text">
			</div>
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">OK</button>
	</div>
</div>
<!-- /Add Recipient dialog -->


<!-- Edit Alert Rule dialog -->
<div class="ui2 modal2 page" id="edit-alert-rule">
	<div class="title">
		<h1>Alert Rule &mdash; <strong>Tire Events</strong></h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<script type="text/javascript">
			$(document).ready(function () {
				$.tab2({
					tabs: [
						{title: "Tracker", content: $(".page#edit-alert-rule #tab-tracker")},
						{title: "Geo-Area", content: $(".page#edit-alert-rule #tab-geo-area")},
						{title: "TPMS", content: $(".page#edit-alert-rule #tab-tpms")},
						{title: "iButton", content: $(".page#edit-alert-rule #tab-ibutton")},
						{title: "Expander", content: $(".page#edit-alert-rule #tab-expander")}
					],
					width: 580,
					height: 380
				}).appendTo(".page#edit-alert-rule .content");
			});
		</script>
		<div id="tab-tracker">
			<h1 class="section-title first">Sensors</h1>
			<div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-1-h"><span>Digital Input 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-1-l"><span>Digital Input 1 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-1-h"><span>Digital Output 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-1-l"><span>Digital Output 1 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-1-h"><span>Analog Input 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-1-l"><span>Analog Input 1 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-2-h"><span>Digital Input 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-2-l"><span>Digital Input 2 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-2-h"><span>Digital Output 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-2-l"><span>Digital Output 2 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-2-h"><span>Analog Input 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-2-l"><span>Analog Input 2 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-3-h"><span>Digital Input 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-3-l"><span>Digital Input 3 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-3-h"><span>Digital Output 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-3-l"><span>Digital Output 3 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-3-h"><span>Analog Input 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-3-l"><span>Analog Input 3 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-4-h"><span>Digital Input 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-4-l"><span>Digital Input 4 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-4-h"><span>Digital Output 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-4-l"><span>Digital Output 4 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-4-h"><span>Analog Input 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-4-l"><span>Analog Input 4 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-5-h"><span>Digital Input 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-5-l"><span>Digital Input 5 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-5-h"><span>Digital Output 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-5-l"><span>Digital Output 5 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-5-h"><span>Analog Input 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-5-l"><span>Analog Input 5 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-6-h"><span>Digital Input 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-6-l"><span>Digital Input 6 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-6-h"><span>Digital Output 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-6-l"><span>Digital Output 6 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-6-h"><span>Analog Input 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-6-l"><span>Analog Input 6 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-7-h"><span>Digital Input 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-7-l"><span>Digital Input 7 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-7-h"><span>Digital Output 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-7-l"><span>Digital Output 7 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-7-h"><span>Analog Input 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-7-l"><span>Analog Input 7 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-8-h"><span>Digital Input 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-8-l"><span>Digital Input 8 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-8-h"><span>Digital Output 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-8-l"><span>Digital Output 8 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-8-h"><span>Analog Input 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-8-l"><span>Analog Input 8 Low</span></label>
					</div>
				</div>
			</div>
		</div>

		<div id="tab-geo-area">
			<div class="table-wrapper" style="height: 341px; overflow: auto;">
				<table class="table2 hoverable compact text-center">
					<thead>
						<tr>
							<th>Geo-Area</th>
							<th>When</th>
							<th style="width: 64px"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>My Geo-area Test</td>
							<td style="padding: 0; font-size: 18pt;">
								<i title="ENTER" class="fa fa-arrow-circle-o-down ui2-color success"></i>
								<i title="EXIT" class="fa fa-arrow-circle-o-up ui2-color danger"></i>
							</td>
							<td style="padding: 2px;">
								<button class="input2 icon as-input danger"><i class="fa fa-trash"></i></button>
								<button class="input2 icon as-input success"><i class="fa fa-pencil"></i></button>
							</td>
						</tr>
						<tr>
							<td>My Geo-area Test 2</td>
							<td style="padding: 0; font-size: 18pt;">
								<i title="ENTER" class="fa fa-arrow-circle-o-down ui2-color success"></i>
							</td>
							<td style="padding: 2px;">
								<button class="input2 icon as-input danger"><i class="fa fa-trash"></i></button>
								<button class="input2 icon as-input success"><i class="fa fa-pencil"></i></button>
							</td>
						</tr>
						<tr>
							<td>My Geo-area Test 3</td>
							<td style="padding: 0; font-size: 18pt;">
								<i title="EXIT" class="fa fa-arrow-circle-o-up ui2-color danger"></i>
							</td>
							<td style="padding: 2px;">
								<button class="input2 icon as-input danger"><i class="fa fa-trash"></i></button>
								<button class="input2 icon as-input success"><i class="fa fa-pencil"></i></button>
							</td>
						</tr>
						<tr>
							<td>My Geo-area Test 3</td>
							<td style="padding: 0; font-size: 18pt;">
								<i title="ENTER" class="fa fa-arrow-circle-o-down ui2-color success"></i>
								<i title="EXIT" class="fa fa-arrow-circle-o-up ui2-color danger"></i>
							</td>
							<td style="padding: 2px;">
								<button class="input2 icon as-input danger"><i class="fa fa-trash"></i></button>
								<button class="input2 icon as-input success"><i class="fa fa-pencil"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="margin-top: 5px">
				<button class="input2" id="add-geo-area"><i class="fa fa-plus"></i> <span>Geo-Area</span></button>
			</div>
		</div>

		<div id="tab-tpms">
			<div class="input-row">
				<div class="input-group">
					<label class="checkbox"><input type="checkbox" data-value="fastLeak"><span>Fast Leak</span></label>
					<label class="checkbox"><input type="checkbox" data-value="slowLeak"><span>Slow Leak</span></label>
					<label class="checkbox"><input type="checkbox" data-value="highTemperature"><span>High Temperature</span></label>
					<label class="checkbox"><input type="checkbox" data-value="lowPressure"><span>Low Pressure</span></label>
					<label class="checkbox"><input type="checkbox" data-value="highPressure"><span>High Pressure</span></label>
					<label class="checkbox"><input type="checkbox" data-value="reserved"><span>Reserved</span></label>
					<label class="checkbox"><input type="checkbox" data-value="noData"><span>No Data</span></label>
					<label class="checkbox"><input type="checkbox" data-value="lowBattery"><span>Low Battery</span></label>
				</div>
			</div>
		</div>

		<div id="tab-ibutton">
			<div class="input-row">
				<div class="input-group">
					<label class="checkbox"><input type="checkbox"><span>iButton Inserted</span></label>
				</div>
			</div>
		</div>

		<div id="tab-expander">
			<h1 class="section-title first">Sensors</h1>
			<div style="overflow: auto; height: 195px; padding: 5px; background: #ececec; border: 1px solid #d6d6d6;">
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-1-h"><span>Digital Input 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-1-l"><span>Digital Input 1 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-1-h"><span>Digital Output 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-1-l"><span>Digital Output 1 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-1-h"><span>Analog Input 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-1-l"><span>Analog Input 1 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-2-h"><span>Digital Input 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-2-l"><span>Digital Input 2 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-2-h"><span>Digital Output 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-2-l"><span>Digital Output 2 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-2-h"><span>Analog Input 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-2-l"><span>Analog Input 2 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-3-h"><span>Digital Input 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-3-l"><span>Digital Input 3 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-3-h"><span>Digital Output 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-3-l"><span>Digital Output 3 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-3-h"><span>Analog Input 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-3-l"><span>Analog Input 3 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-4-h"><span>Digital Input 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-4-l"><span>Digital Input 4 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-4-h"><span>Digital Output 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-4-l"><span>Digital Output 4 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-4-h"><span>Analog Input 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-4-l"><span>Analog Input 4 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-5-h"><span>Digital Input 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-5-l"><span>Digital Input 5 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-5-h"><span>Digital Output 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-5-l"><span>Digital Output 5 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-5-h"><span>Analog Input 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-5-l"><span>Analog Input 5 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-6-h"><span>Digital Input 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-6-l"><span>Digital Input 6 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-6-h"><span>Digital Output 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-6-l"><span>Digital Output 6 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-6-h"><span>Analog Input 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-6-l"><span>Analog Input 6 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-7-h"><span>Digital Input 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-7-l"><span>Digital Input 7 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-7-h"><span>Digital Output 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-7-l"><span>Digital Output 7 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-7-h"><span>Analog Input 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-7-l"><span>Analog Input 7 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-i-8-h"><span>Digital Input 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-i-8-l"><span>Digital Input 8 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="d-o-8-h"><span>Digital Output 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="d-o-8-l"><span>Digital Output 8 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="a-i-8-h"><span>Analog Input 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="a-i-8-l"><span>Analog Input 8 Low</span></label>
					</div>
				</div>
			</div>

			<h1 class="section-title">Temperature Sensors</h1>
			<div style="overflow: auto; height: 80px; padding: 5px; background: #ececec; border: 1px solid #d6d6d6;">
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="t-1-h"><span>Temp Sensor 1 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-1-l"><span>Temp Sensor 1 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="t-2-h"><span>Temp Sensor 2 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-2-l"><span>Temp Sensor 2 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="t-3-h"><span>Temp Sensor 3 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-3-l"><span>Temp Sensor 3 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="t-4-h"><span>Temp Sensor 4 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-4-l"><span>Temp Sensor 4 Low</span></label>
					</div>
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="t-5-h"><span>Temp Sensor 5 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-5-l"><span>Temp Sensor 5 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="t-6-h"><span>Temp Sensor 6 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-6-l"><span>Temp Sensor 6 Low</span></label>
					</div>
				</div>
				<div class="input-row">
					<div class="input-group" style="margin-right: 20px;">
						<label class="checkbox"><input type="checkbox" data-value="t-7-h"><span>Temp Sensor 7 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-7-l"><span>Temp Sensor 7 Low</span></label>
					</div>
					<div class="input-group">
						<label class="checkbox"><input type="checkbox" data-value="t-8-h"><span>Temp Sensor 8 High</span></label>
						<label class="checkbox"><input type="checkbox" data-value="t-8-l"><span>Temp Sensor 8 Low</span></label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">Save</button>
	</div>
</div>
<!-- /Edit Alert Rule dialog -->


<!-- New/Edit Geo-area dialog -->
<div class="ui2 modal2 page" id="edit-geo-area-geo-fence">
	<div class="title">
		<h1>Geo-area</h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<div class="input-group" style="width: 350px;">
			<label>Pick a geo-area</label>
			<select class="input2">

			</select>
		</div>
		<h1 class="section-title">When</h1>
		<div class="input-row">
			<div class="input-group" style="margin-right: 20px;">
				<label class="checkbox"><input type="checkbox"><span>Enter</span></label>
			</div>
			<div class="input-group">
				<label class="checkbox"><input type="checkbox"><span>Exit</span></label>
			</div>
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">OK</button>
	</div>
</div>
<!-- /New/Edit Geo-area dialog -->


<!-- New Alert dialog -->
<div class="ui2 modal2 page" id="new-alert">
	<div class="title">
		<h1>New Alert</h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<div class="input-group" style="width: 260px;">
			<label>Name</label>
			<input class="input2" type="text" id="name">
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">OK</button>
	</div>
</div>
<!-- /New Alert dialog -->

<!-- New Alert Rule dialog -->
<div class="ui2 modal2 page" id="new-alert-rule">
	<div class="title">
		<h1>New Alert Rule</h1>
		<div class="modal hide"></div>
	</div>

	<div class="content">
		<div class="input-group" style="width: 260px;">
			<label>Name</label>
			<input class="input2" type="text" id="name">
		</div>
	</div>

	<div class="footer">
		<button class="input2 transparent modal hide">Cancel</button>
		<button class="input2">OK</button>
	</div>
</div>
<!-- /New Alert Rule dialog -->