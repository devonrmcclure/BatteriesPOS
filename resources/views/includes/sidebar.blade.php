<div class="sidebar">
	<div class="sidebar-nav">
		<ul>
			<!-- Define Sidebar-nav Links -->
			@section('sidebar-nav-links')
				<li class="ripple-effect"><a href="/"><i class="material-icons md-24 indigo500">home</i> Dashboard</a></li>
				<li class="ripple-effect"><a href="/customers"><i class="material-icons md-24 green500">person</i> Customers</a></li>
				<li class="ripple-effect"><a href="/sales"><i class="material-icons md-24 green500">shopping_cart</i> Sales</a></li>
				<li class="ripple-effect"><a href="/repair-orders"><i class="material-icons md-24 grey700">build</i> Repair Orders</a></li>
				<li class="ripple-effect"><a href="/part-orders"><i class="material-icons md-24 deep-purple500">build</i> Part Orders</a></li>
				<li class="ripple-effect"><a href="/inventory"><i class="material-icons md-24 redA700">content_paste</i> Inventory</a></li>
			@show
			<!-- End Sidebar-nav links -->
		</ul>
	</div>
</div>