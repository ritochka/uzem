@section('content')

<a href="/course/courses" > {{{ trans('default.back to course list')}}} </a>
</br>
		<table class="table table-bordered" style="font-size: 16px; margin-top:20px;">
            <thead>
                <tr class="info">
                    <th>{{{ trans('default.Course Code')}}}</th>
                    <th>{{{ trans('default.Course Name') }}} Kg</th>
                    <th>{{{ trans('default.Course Name') }}} Tr</th>
                    <th>{{{ trans('default.Semester') }}}</th>
                    <th>{{{ trans('default.Weekly Hours') }}}</th>
                    <th>{{{ trans('default.Credits') }}}</th>
                    <th>{{{ trans('default.ECTS') }}}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="warning">
                    <td style="width:92px;"> {{{ $course->derskod }}} </td>
                    <td style="width:300px;">{{{ $course->dersad_kg }}}</td>         
                    <td style="width:300px;">{{{ $course->dersad_tr }}}</td>         
                    <td>{{{ $course->yariyil }}}</td>
                    <td style="text-align:center;">{{{ $course->krediteori }}} + {{{ $course->krediuygulama }}}</td>
                    <td style="text-align:center;">{{{ $course->kreditoplam }}}</td>
                    <td style="text-align:center;">{{{ $course->akts }}}</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <table class="table table-bordered" style="font-size: 14px;">
            <thead>
                <tr class="info">
                    <th colspan="4" style="text-align:center;"> {{{ trans('default.Form of Assessment') }}} </th>
                </tr>
            </thead>
            <tbody>
                <tr class="warning">
                    <td width="25%"><strong> {{{ trans('default.Form of Assessment') }}} </strong></td>
                    <td width="25%"><strong> {{{ trans('default.Number') }}} </strong></td>
                    <td width="25%"><strong> {{{ trans('default.Percentage') }}}  (%)</strong></td>
                    <td width="25%"><strong> {{{ trans('default.Total Percentage') }}} </strong></td>
                </tr>
                @foreach($course->evaluation as $evaluation)
                <tr>
                    <td width="25%"> {{{ $evaluation->degeracai_id }}}</td>
                    <td width="25%"> {{{ $evaluation->adet }}} </td>
                    <td width="25%"> {{{ $evaluation->katki }}}  (%)</td>
                    <td width="25%"> {{{ $evaluation->yilicisonu }}} </td>
	            </tr>
	            @endforeach
            </tbody>
        </table> 
        <br/>
		<a class="btn btn-primary" href="/agreement/courses/{{{ $course->derskod}}}/" >
            {{{ trans('default.Enroll in class') }}}
        </a><br/> 
        <a href="/course/courses" > {{{ trans('default.back to course list')}}} </a>

@stop