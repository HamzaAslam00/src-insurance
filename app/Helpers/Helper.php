<?php

use App\Models\UserSubmitHour;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

function getFullName($user)
{
    return ucwords($user->first_name . ' ' . $user->last_name);
}

function getImage($image, $isAvatar = false, $withBaseurl = false)
{
    $errorImage = $isAvatar ? url('/backend/no_avatar.png') : url('/backend/no_image.png');
    return !empty($image) ? ($withBaseurl ? url('/storage/' . $image) : Storage::url($image)) : $errorImage;
}

function saveResizeImage($file, $directory, $width = null, $height = null, $type = 'Jpeg')
{
    if (!Storage::exists($directory)) {
        Storage::makeDirectory($directory);
    }
    $is_preview = strpos($directory, 'previews') !== false;
    $filename = Str::random() . time() . '.' . $type;
    $path = "$directory/$filename";

    $imageManager = new ImageManager(new Driver());

    $img = $imageManager->read($file);
    if ($width) {
        $img->resizeDown(width: $width);
    }
    if ($height) {
        $img->resizeDown(height: $height);
    }
    if ($width && $width == $is_preview) {
        $img = $img->blur(60);
    }
    $resource = $img->{'to' . ucfirst($type)}($is_preview ? 40 : 85);
    Storage::disk('public')->put($path, $resource, 'public');

    return $path;
}

function convertTo24Hour($time, $amPm)
    {
        $hour = (int) $time;

        // Convert to 24-hour format
        if ($amPm == 'PM' && $hour != 12) {
            $hour += 12;
        } elseif ($amPm == 'AM' && $hour == 12) {
            $hour = 0;
        }

        return sprintf('%02d:00', $hour); // Return time in HH:00 format
    }
function saveDocument($file, $directory, $fileName = null)
{
    if (!Storage::exists($directory)) {
        Storage::makeDirectory("$directory");
    }
    $filename = $fileName ? $fileName : Str::random() . time() . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($directory, $file, $filename);
    $path = $directory . '/' . $filename;
    return $path;
}

/**
 * @param $file
 * get files
 */
function getFiles($file_name)
{
    $file = empty($file_name) ? '' : url('/storage/' . $file_name);
    return empty($file) ? '' : $file;
}

function saveAnyFile($file, $directory, $fileName)
{
    $file_type = $file->getMimeType();
    if (str_starts_with($file_type, 'image/')) {
        $path = saveResizeImage($file, $directory);
    } else {
        $path = saveDocument($file, $directory, $fileName);
    }
    return $path;
}

function statusClasses($status)
{
    $class = '';
    switch ($status) {
        case 'active':
        case 'approved':
        case 'accepted':
        case 'completed':
            $class = 'success';
            break;
        case 'inactive':
        case 'rejected':
        case 'cancelled':
            $class = 'danger';
            break;
        case 'pending':
            $class = 'warning';
            break;
    }
    return $class;
}

function deleteFile($path)
{
    if (!empty($path) && file_exists('app/' . $path)) {
        unlink(storage_path('app/' . $path));
    }

    $storage_path = 'storage/' . $path;
    $public_path = public_path($storage_path);
    if (!empty($path) && file_exists($public_path)) {
        unlink($public_path);
    }
}

function getDateOfSubmitHour($user_id)
{
    $userSubmitHours = UserSubmitHour::where('user_id', $user_id)->get();
    $dateArray = [];
    foreach ($userSubmitHours as $userSubmitHour) {
        $newDate = Carbon::parse($userSubmitHour->submit_date)->format('Y-m');

        $dateArray[] = $newDate;
    }
    return $dateArray;
}

function getNextSixMonth()
{
    $startDate = Carbon::now();
    $months = [];
    for ($i = 0; $i < 7; $i++) {
        $date = $startDate->copy()->addMonths($i)->day(24);
        $months[] = [
            'month' => __('messages.' . $date->format('l')) . ' ' . $date->format('d') . ' ' . strtolower(__('messages.' . $date->format('F'))),
        ];
    }
    return $months;
}

function getReminingDaya()
{
    $startDate = Carbon::now();
    $currentDay = $startDate->day;
    $months = [];

    // Calculate remaining days based on current date
    if ($currentDay <= 24) {
        // Current month's 24th
        $targetDate = $startDate->copy()->day(24);
        $remainingDays = $targetDate->diffInDays($startDate);
    } else {
        // Next month's 24th
        $targetDate = $startDate->copy()->addMonths(1)->day(24);
        $remainingDays = $targetDate->diffInDays($startDate);
    }

    $months = [
        'month' => $targetDate->format('F'),
        'date' => $targetDate->format('d'),
        'day' => $targetDate->format('l'),
        'remainingDays' => $remainingDays,
    ];

    return $months['remainingDays'];
}

function getDatesBetweenTwoDates($start_date, $end_date)
{
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $datePeriod = new DatePeriod($start, $interval, $end);
    $dates = [];
    foreach ($datePeriod as $date) {
        $dates[] = $date->format('Y-m-d');
    }
    return $dates;
}

function getUserRegisterHours($user_id, $date = null)
{
    $workingHours = WorkingHour::select('start_date', 'end_date', 'hours')
        ->where('user_id', $user_id)
        ->get();

    if ($workingHours) {
        $total_hours = 0;

        // Parse the input date or use the current date if null
        if ($date) {
            $parsedDate = Carbon::parse($date);
            $targetMonth = $parsedDate->month;
            $targetYear = $parsedDate->year;
        } else {
            $targetMonth = Carbon::now()->month;
            $targetYear = Carbon::now()->year;
        }

        foreach ($workingHours as $workinghour) {
            $start_date = Carbon::parse($workinghour->start_date);
            $end_date = Carbon::parse($workinghour->end_date);
            $hours_per_day = $workinghour->hours;

            $current_date = $start_date->copy();
            while ($current_date <= $end_date) {
                if ($current_date->month == $targetMonth && $current_date->year == $targetYear && !$current_date->isWeekend()) {
                    $total_hours += $hours_per_day;
                }
                // Move to the next day
                $current_date->addDay();
            }
        }
        // Return the total hours for the given month
        return $total_hours;
    }
    return 0;
}

function checkCallInBetter()
{
    $user = Auth::user();
    return $user->call_in_better;
    // $sickDate = date('Y-m-d');

    // $leaveRecord = Leave::where('applied_by', $user->id)->whereDate('start_date', '<=', $sickDate)
    //     ->whereDate('end_date', '>=', $sickDate)->where('status', '!=', 'cancelled')
    //     ->exists();

    // if ($leaveRecord == false) {
    //     //// check holiday
    //     $holiday = HolidayAgenda::where('start_date', '<=', $sickDate)
    //         ->where('end_date', '>=', $sickDate)
    //         ->exists();

    //     if ($holiday == false) {
    //         //// check alreay applied leave with approved and pinding status.

    //         $report = SickReport::where('sending_date', $sickDate)->where('applied_by', $user->id)->where('status', 'pending')
    //             ->orWhere('status', 'approved')->exists();

    //         if ($report == false) {
    //             return true;
    //         }
    //     }
    // }
    // return false;
}
function checkCallInBetterTime()
{
    $user = Auth::user();
    $call_better_time = $user->call_in_better_time;

    $currentDateTime = Carbon::now();
    $callInCarbon = Carbon::parse($call_better_time);
    if ($currentDateTime->greaterThanOrEqualTo($callInCarbon)) {
        return true;
    } else {
        return false;
    }
}

function addEllipsis($text, $max = 30)
{
    return strlen($text) > 30 ? mb_substr($text, 0, $max, "UTF-8") . "..." : $text;
}

function isValue($value)
{
    if ($value !== 'undefined' && $value !== null && !empty($value)) {
        return $value;
    } else {
        return 'N/A';
    }
}

function formatString($key, $reverse = false)
{
    if ($reverse) {
        return str_replace([' ', "'"], '_', strtolower($key));
    } else {
        return str_replace(['_', '-'], ' ', strtolower($key));
    }
}

function getAssignedPermissionsCount($role, $group)
{
    return $role->permissions()->where('group', $group)->count();
}

function checkSubmittedHours()
{
    $user = Auth::user();
    $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
    $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
    $submitted_hours = UserSubmitHour::where('user_id', $user->id)->whereBetween('submit_date', [$startOfMonth, $endOfMonth])->exists();
    return $submitted_hours;
}
