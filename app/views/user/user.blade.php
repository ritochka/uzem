@section('content')

	<div> {{{ $user->firstname }}} - {{{ $user->lastname }}} <a href="/user/{{{ $user->id }}}/edit">edit</a> </div>

@stop