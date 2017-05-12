<div class="sidebar">
	<div class="sidebar-nav">
		<ul>
			<!-- Define Sidebar-nav Links -->
			@section('sidebar-nav-links')
				@if(Auth::user()->admin)
					<li class="ripple-effect"><a href="/admin"><i class="material-icons md-24">home</i>Dashboard</a></li>
					<li class="ripple-effect"><a href="/admin/staff" id="show-modal"><i class="material-icons md-24">people</i>Staff</a></li>
					<li class="ripple-effect"><a href="/admin/stats"><i class="material-icons md-24 ">poll</i>Stats</a></li>
					<li class="ripple-effect"><a href="/admin/repair-orders"><i class="material-icons md-24">build</i>Repair Orders</a></li>
					<li class="ripple-effect"><a href="/admin/part-orders"><i class="material-icons md-24">local_shipping</i>Part Orders</a></li>
					<li class="ripple-effect"><a href="/admin/inventory"><i class="material-icons md-24">compare_arrows</i>Inventory Ordering</a></li>

				@else
					<li class="ripple-effect"><a href="/"><i class="material-icons md-24">home</i>Dashboard</a></li>
					<li class="ripple-effect"><a href="/sales" id="show-modal"><i class="material-icons md-24">shopping_cart</i>New Sale</a></li>
					<li class="ripple-effect"><a href="/repair-orders"><i class="material-icons md-24">build</i>Repair Orders</a></li>
					<li class="ripple-effect"><a href="/part-orders"><i class="material-icons md-24">local_shipping</i>Part Orders</a></li>
					<li class="ripple-effect"><a href="/inventory"><i class="material-icons md-24">content_paste</i>Inventory</a></li>
					<li class="ripple-effect"><a href="/close-out"><i class="material-icons md-24">assignment_return</i>Close Out Day</a></li>
				@endif
			@show
			<!-- End Sidebar-nav links -->
		</ul>
	</div>
</div>

<div>
	{{-- <rep-login-modal :show.sync="showRepLoginModal" title="Rep Login" :location="{{ Auth::User() }}"></rep-login-modal> --}}
	
</div>