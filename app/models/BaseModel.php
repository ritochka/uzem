<?php
namespace models;
use DateTime;
use App;

class BaseModel
{
	public static function localDate($date)
	{
		$d = new DateTime($date);
		return $d->format('j').' '.static::localMonth($d->format('F')).' '.$d->format('Y');
	}

	public static function localMonth($month)
	{
		$locale = App::getLocale();

		if ($locale == 'kg' || $locale == 'ru')
		{
			switch ($month) {
				case 'January'  : return 'Январь'  ; break;
				case 'February' : return 'Февраль' ; break;
				case 'March'    : return 'Март'    ; break;
				case 'April'    : return 'Апрель'  ; break;
				case 'May'      : return 'Май'     ; break;
				case 'June'     : return 'Июнь'    ; break;
				case 'July'     : return 'Июль'    ; break;
				case 'August'   : return 'Август'  ; break;
				case 'September': return 'Сентябрь'; break;
				case 'October'  : return 'Октябрь' ; break;
				case 'November' : return 'Ноябрь'  ; break;
				case 'December' : return 'Декабрь' ; break;
				default: return ''; break;
			}
		}
		elseif ($locale == 'tr')
		{
			switch ($month) {
				case 'January'  : return 'Ocak'   ; break;
				case 'February' : return 'Şubat'  ; break;
				case 'March'    : return 'Mart'   ; break;
				case 'April'    : return 'Nisan'  ; break;
				case 'May'      : return 'Mayıs'  ; break;
				case 'June'     : return 'Haziran'; break;
				case 'July'     : return 'Temmuz' ; break;
				case 'August'   : return 'Ağustos'; break;
				case 'September': return 'Eylül'  ; break;
				case 'October'  : return 'Ekim'   ; break;
				case 'November' : return 'Kasım'  ; break;
				case 'December' : return 'Aralık' ; break;
				default: return ''; break;
			}
		}

		return $month;

	}
}