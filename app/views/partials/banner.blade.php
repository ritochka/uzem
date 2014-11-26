
	<div class="row">
		<div class="col-sm-3">
			<a href="http://manas.edu.kg" target="_blank" style="text-decoration:none">
				<img src="/img/logo2.png" style="display:inline-block; width: 80px; margin-top:5px;">
				<div style="display:inline-block; font-size:14px; vertical-align:middle;  text-align: center; margin-left: 5px; font-weight:bold; color: #82B6E4;">
					{{ trans('default.KTMU2')}}
				</div>	
			</a>
				
		</div>
		<div class="col-sm-6">
			<div style="font-size:34px; font-weight:bold;  font-style: italic; padding-top: 15px; vertical-align:middle; text-align:center; color: #dc3338;">{{ trans('default.DEC') }}</div>
		</div>
		<div class="col-sm-3">
			<div class="pull-right" style="margin-top:20px; margin-bottom:20px; font-size:11px;">
				<a href="/lang/kg" title="кыргызча" style="@if(App::getLocale() == 'kg') color: #de3338 @else color: #2a6496 @endif">КЫР</a> <span style="color:#ccc;">|</span>
				<a href="/lang/tr" title="türkçe" style="@if(App::getLocale() == 'tr') color: #de3338 @else color: #2a6496 @endif">TUR</a> <span style="color:#ccc;">|</span>
				<a href="/lang/en" title="english" style="@if(App::getLocale() == 'en') color: #de3338 @else color: #2a6496 @endif">ENG</a> <span style="color:#ccc;">|</span>
				<a href="/lang/ru" title="русский" style="@if(App::getLocale() == 'ru') color: #de3338 @else color: #2a6496 @endif">РУС</a>
			</div>
		</div>
	</div>