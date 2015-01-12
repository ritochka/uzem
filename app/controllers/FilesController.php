<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FilesController extends BaseController
{

	public function __construct()
	{
		$this->layout = 'layouts.default';

		if(Menu::countChild(urldecode(Request::segment(3))) == 0)
			$this->layout = 'layouts.home';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => 'post']);
		// $this->beforeFilter('auth', ['on' => 'post', 'except' => ['pLogin', 'pRegister']]);

		$this->beforeFilter(function()
		{	
			if(!User::hasRoles(['admin', 'secretary']))
				return Redirect::guest('login');
		}, ['only' => ['HomePic', 'PostHomePic', 'EditPage', 'UpdatePage', 'EditNews', 'UpdateNews', 'NewNews', 'CreateNews', 'ListPics', 'CreatePicture', 'StorePicture', 'Picture', 'UpdatePicture', 'DeletePicture']]);

		$this->beforeFilter(function()
		{	
			if(Auth::check() && Hash::check(Auth::user()->kimlik, Auth::user()->getAuthPassword() ) )
				return Redirect::to('/user/'. Auth::user()->kimlik . '/editpass');
		});
	
	}

	
	public function HomePic()
	{
		
		if(User::hasRoles(['admin']))
		{
			$this->layout = View::make('layouts.home');
			$this->layout->title = trans('default.Home');
			$this->layout->content = View::make('files.homepic');
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function PostHomePic()
	{
		

		if(User::hasRoles(['admin']))
		{
			$crop = Input::get('coords');
			$file = (Input::get('dataUrl') == "")? File::get(Input::get('srcUrl')): base64_decode(Input::get('dataUrl'));

			if ($crop != "" && $file != "")
			{
				$path = 'img/homepics';
				if(!File::isDirectory($path)) File::makeDirectory($path);

				$crop   = json_decode($crop, true);	

				$orig   = imagecreatefromstring($file);
				$big    = ImageCreateTrueColor($crop['w'], $crop['h']);

				$b_path = $path . '/' . $department->personeldb_id . '.jpg';
				imagecopyresampled($big, $orig, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($big, $b_path, 80);

				imagedestroy($big); // release from memory

				return Redirect::to('/');
			}
		}
		
		return Redirect::to('/');
		
	}
	

	public function ListPics()
	{
		
		if(User::hasRoles(['admin']))
		{
			$pics = File::files('img/pics');

			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Pictures';
			$this->layout->content = View::make('files.listpics')->with('pics', $pics);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function Picture($picname)
	{
		
		if(User::hasRoles(['admin']))
		{
			if(File::isFile('img/pics/'.$picname))
				$pic = $picname;
			else
				return Redirect::action('FilesController@ListPics');

			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Picture';
			$this->layout->content = View::make('files.picture')->with('pic', $pic);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function UpdatePicture($picname)
	{
		
		if(User::hasRoles(['admin']))
		{
			$crop = Input::get('coords');
			$dir = 'img/pics';
			$path = $dir.'/'.$picname;
			$file = File::get($path);
			$ext  = File::extension($path);

			if ($crop != "" && $file != "")
			{
				if(!File::isDirectory($dir)) File::makeDirectory($dir);

				$crop = json_decode($crop, true);

				$org = imagecreatefromstring($file);
				$src = ImageCreateTrueColor($crop['w'], $crop['h']);

				imagecopyresized($src, $org, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($src, $path, 80);

				imagedestroy($src); // release from memory

				return Redirect::action('FilesController@ListPics');
			}
		}
		
		return Redirect::to('/');
	}

	public function CreatePicture()
	{
		
		if(User::hasRoles(['admin']))
		{
			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Create picture';
			$this->layout->content = View::make('files.createpicture');
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function StorePicture()
	{
		
		if(User::hasRoles(['admin']))
		{
			$crop = Input::get('coords');
			$dir = 'img/pics';
			$path = $dir.'/'.uniqid().'.jpg';
			$file = base64_decode(Input::get('dataUrl'));

			if ($crop != "" && $file != "")
			{
				if(!File::isDirectory($dir)) File::makeDirectory($dir);

				$crop = json_decode($crop, true);
				$org = imagecreatefromstring($file);
				$src = ImageCreateTrueColor($crop['w'], $crop['h']);

				imagecopyresized($src, $org, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($src, $path, 80);

				imagedestroy($src); // release from memory

				return Redirect::action('FilesController@ListPics');
			}
		}
		
		return Redirect::to('/');
	}

	public function DeletePicture($picname)
	{
		
		if(File::delete('img/pics/'.$picname))
			return Redirect::action('FilesController@ListPics');

		return Redirect::action('FilesController@Picture', [$picname])->with('message', 'retry again');
	}
///////////// File Upload ////////////////////////////////////////////////////////////////////////////////////
	public function ListFiles()
	{
		
		if(User::hasRoles(['admin']))
		{
			$files = File::files('img/files');

			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Files';
			$this->layout->content = View::make('files.listfiles')->with('files', $files);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function CreateFile()
	{
		
		if(User::hasRoles(['admin']))
		{
			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Create file';
			$this->layout->content = View::make('files.createfile');
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function StoreFile()
	{
		
		if(User::hasRoles(['admin']))
		{
			$file = Input::file('file');

			// dd($file);

			$dir  = 'img/files';
			$path = $file->getClientOriginalName();
			
			if(!File::isDirectory($dir)) File::makeDirectory($dir);

			$file->move($dir, $path);

			return Redirect::action('FilesController@ListFiles');
		}
		
		return Redirect::to('/');
	}

	public function File($filename)
	{
		
		if(User::hasRoles(['admin']))
		{
			if(File::isFile('img/files'.'/'.$filename))
				$file = $filename;
			else
				return Redirect::action('FilesController@ListFiles');

			$this->layout = View::make('layouts.home');
			$this->layout->title = 'File';
			$this->layout->content = View::make('files.file')->with('file', $file);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function UpdateFile($filename)
	{
		
		if(User::hasRoles(['admin']))
		{
			$file = Input::file('file');

			// dd($file);

			$dir  = 'img/files';

			if(!File::isDirectory($dir))
				File::makeDirectory($dir);
			
			File::delete($dir.'/'.$filename);

			$name = $file->getClientOriginalName();
			$file->move($dir, $name);

			return Redirect::action('FilesController@ListFiles');
		}
		
		return Redirect::to('/');
	}

	public function DeleteFile($filename)
	{
		
		if(File::delete('img/files'.'/'.$filename))
			return Redirect::action('FilesController@ListFiles');

		return Redirect::action('FilesController@Picture', [$filename])->with('message', 'retry again');
	}

}