<div class="d-flex flex-column flex-shrink-0 bg-light" style="padding: 20px ">
	<a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
		<span class="fs-4">Sidebar</span>
	</a>
	<hr>
	<ul class="nav nav-pills flex-column mb-auto" id="myActive">
		<li class="nav-item">
			<a href="#" class="nav-link link-dark" aria-current="page">
				Dashboard
			</a>
		</li>
		<li>
			<a href="{{route('category.index')}}" class="nav-link link-dark">
				Category
			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-dark">
				Orders
			</a>
		</li>
		<li>
			<a href="{{route('product.index')}}" class="nav-link link-dark">
				Products
			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-dark">
				Customers
			</a>
		</li>
	</ul>
	<hr>
	<div class="dropdown">
		<a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
		   data-bs-toggle="dropdown" aria-expanded="false">
			<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
			<strong>Vũ Minh Hiếu</strong>
		</a>
		<ul class="dropdown-menu text-small shadow">
			<li><a class="dropdown-item" href="#">New project...</a></li>
			<li><a class="dropdown-item" href="#">Settings</a></li>
			<li><a class="dropdown-item" href="#">Profile</a></li>
			<li>
				<hr class="dropdown-divider">
			</li>
			<li>
				<a class="dropdown-item" href="#">
					{{ __('Logout') }}
				</a>
			</li>
		</ul>
	</div>
</div>

