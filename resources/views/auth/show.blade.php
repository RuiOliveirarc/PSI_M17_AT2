@if(auth()->check())
	{{Auth::user()->id}}<br>
	{{Auth::user()->email}}<br>
	{{Auth::user()->name}}<br>
@endif