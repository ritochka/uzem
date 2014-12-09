<ul class="depsidebar">
	@foreach($menus as $menu)
	<li>
			@if($menu->link == '')
				<a href="/{{{ $menu->type }}}/{{{ $menu->name }}}" @if($menu->name == urldecode(Request::segment(3))) style="color: #dc3338;" @endif>{{{ $menu->getName() }}}</a>
			@else
				<a href="{{{ $menu->link }}}" target="_blank">{{{ $menu->getName() }}}</a>
			@endif
	
	</li>
	@endforeach
</ul>