<div class="sidebar">
	<div class="sidebar-nav">
		<ul>
			<!-- Define Sidebar-nav Links -->
			@section('sidebar-nav-links')
				@if(Auth::user()->admin)
					<li class="ripple-effect"><a href="/admin"><i class="material-icons md-24 indigo500">home</i>Dashboard</a></li>
					<li class="ripple-effect"><a href="/admin/staff" id="show-modal"><i class="material-icons md-24 green500">people</i>Staff</a></li>
					<li class="ripple-effect"><a href="/admin/stats"><i class="material-icons md-24 grey700">poll</i>Stats</a></li>
					<li class="ripple-effect"><a href="/admin/repair-orders"><i class="material-icons md-24 grey700">build</i>Repair Orders</a></li>
					<li class="ripple-effect"><a href="/admin/part-orders"><i class="material-icons md-24 grey700">local_shipping</i>Part Orders</a></li>
					<li class="ripple-effect"><a href="/admin/inventory"><i class="material-icons md-24 grey700">assignment</i>Inventory Ordering</a></li>

				@else
					<li class="ripple-effect"><a href="/"><i class="material-icons md-24 indigo500">home</i>Dashboard</a></li>
					<li class="ripple-effect"><a href="/sales" id="show-modal"><i class="material-icons md-24 green500">shopping_cart</i>New Sale</a></li>
					<li class="ripple-effect"><a href="/repair-orders"><i class="material-icons md-24 grey700">build</i>Repair Orders</a></li>
					<li class="ripple-effect"><a href="/part-orders"><i class="material-icons md-24 deep-purple500">local_shipping</i>Part Orders</a></li>
					<li class="ripple-effect"><a href="/inventory"><i class="material-icons md-24 redA700">content_paste</i>Inventory</a></li>
					<li class="ripple-effect"><a href="/close-out"><i class="material-icons md-24 redA700">assignment_return</i>Close Out Day</a></li>
				@endif
			@show
			<!-- End Sidebar-nav links -->
		</ul>
	</div>
</div>

<div>
	{{-- <rep-login-modal :show.sync="showRepLoginModal" title="Rep Login" :location="{{ Auth::User() }}"></rep-login-modal> --}}
	
</div>