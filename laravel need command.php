php artisan migrate:rollback --step=1 
===========
git config --global --unset user.email
==============
$loop->iteration
======================
php artisan migrate:rollback --path=Modules/YourModule/database/migrations/2020_05_15_xxxxxx_create_your_table.php
=============
@if($MedicineGroup->name == $EditMedicine->group)? selected : '' @endIf
@if($MedicineGroup->name == '')? selected : '' @endIf
@if ( $Doctor->doc_status  == 'active') ? status-green @else status-red @endif
<span class="custom-badge @if ($Department->dept_status == 'active') ? status-green @else status-red @endif">{{ $Department->dept_status }}</span>
==================
composer require haruncpi/laravel-id-generator
use Haruncpi\LaravelIdGenerator\IdGenerator;  
public static function boot()
	{
	    parent::boot();
	    static::saving(function ($model) {
	        $model->out_p_id = IdGenerator::generate(['table' => 'out_patients', 'field'=>'out_p_id', 'length' => 10, 'prefix' => 'OUT-PAT-']);
	    });
	}

=================
 if ($request->file('photo')) {
        $photoname = $request->file('photo')->getClientOriginalName();
        $request->photo->storeAs('public/images', $photoname);
        $User->profile_photo_path = $photoname; 
       }
 if ($request->file('photo')) {

        $path = storage_path().'/app/public/images/';

        $file_old = $path . $OldData->profile_photo_path;
        unlink($file_old);
        $photoname = $request->file('photo')->getClientOriginalName();
        $request->photo->storeAs('public/images', $photoname);
        $OldData->profile_photo_path = $photoname; 
       }
       $OldData->update();
===============
'nullable|mimes:jpg,jpeg,png|max:2048'
php artisan config:clear

php artisan cache:clear

===========
 <td>
@php $patient=collect($patients)->where('out_p_id',$appointment->app_p_id)->first() 
@endphp
 {{$patient->out_p_name}}
</td>
===========
php artisan migrate:refresh  --path=/database/migrations/  2014_10_12_000000_create_users_table.php
php artisan migrate:rollback  --path=/database/migrations/
php artisan migrate  --path=/database/migrations/
=========
    $id = User::insertGetId(
	        ['email' => 'john@example.com','name' => 'john']
	    );
===================
use Illuminate\Support\Str;
 return Str::words($this->description, 10, '...');
{{\Illuminate\Support\Str::limit($category->name, 20, $end='.......')}}  
=================
 $dd = $request->atten_date;
       $date = Carbon::createFromFormat('Y-m-d', $dd);
        $monthName = $date->format('M');
        $year = $date->format('Y');
        $day = $date->format('d');







