<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
{{-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> --}}

<li class="treeview">
	<a href="#"><i class="fa fa-group"></i> <span>Setup</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('category') }}'><i class='fa fa-tag'></i> <span>Category</span></a></li>
		<li><a href='{{ backpack_url('company') }}'><i class='fa fa-tag'></i> <span>Company</span></a></li>
		<li><a href='{{ backpack_url('unit') }}'><i class='fa fa-tag'></i> <span>Unit</span></a></li>
		<li><a href='{{ backpack_url('product') }}'><i class='fa fa-tag'></i> <span>Products</span></a></li>
		<li><a href='{{ backpack_url('supplier') }}'><i class='fa fa-tag'></i> <span>Supplier</span></a></li>
		<li><a href='{{ backpack_url('customer') }}'><i class='fa fa-tag'></i> <span>Customer</span></a></li>
		<li><a href='{{ backpack_url('employee') }}'><i class='fa fa-tag'></i> <span>Employee</span></a></li>
		<li><a href='{{ backpack_url('bank') }}'><i class='fa fa-tag'></i> <span>Bank</span></a></li>
		<li><a href='{{ backpack_url('type') }}'><i class='fa fa-tag'></i> <span>Types</span></a></li>
		<li><a href='{{ backpack_url('income') }}'><i class='fa fa-tag'></i> <span>Incomes</span></a></li>
		<li><a href='{{ backpack_url('expanse') }}'><i class='fa fa-tag'></i> <span>expanses</span></a></li>
	</ul>
</li>

<li class="treeview">
	<a href="#"><i class="fa fa-group"></i> <span>Purchase</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href='{{ backpack_url('purchasereceipt') }}'><i class='fa fa-tag'></i> <span>Purchase Receipts</span></a></li>
	</ul>
</li>

