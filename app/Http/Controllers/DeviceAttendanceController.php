<?php

namespace App\Http\Controllers;

use App\Attendanceinfo;
use App\DeviceAttendance;
use App\DeviceAttendanceFile;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceAttendanceController extends Controller
{
    private $path = 'device/attendance';

    private function folderFiles()
    {
        $files = array_diff(scandir($this->path, SCANDIR_SORT_DESCENDING), array('.', '..'));
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) == 'txt') {
                $data[] = $file;
            }
        }
        return $data;
    }

    public function index()
    {
        $employees = Employee::all();
        $fileDatas = $this->folderFiles();
        foreach ($fileDatas as $fileData) {
            $storeAttendanceFile = DeviceAttendanceFile::where('name', '=', $fileData)->first();
            if ($storeAttendanceFile == null) {
                $deviceAttendanceFile = DeviceAttendanceFile::firstOrNew(
                    ['name' => $fileData],
                    ['process' => 1]
                );

                $deviceAttendanceFile->save();
                $employeeAttendanceData = file_get_contents("$this->path" . '/' . $deviceAttendanceFile->name);
                $dataArray = (explode('"', $employeeAttendanceData));

                foreach (array_chunk($dataArray, 2, true) as $pair) {
                    $even = array_slice($pair, 1, 3, true);
                    foreach ($even as $key => $value) {
                        $attendanceData = explode(':', $value);
                        $date = (substr($attendanceData[2], 0, 4) . '-' . substr($attendanceData[2], 4, 2) . '-' . substr($attendanceData[2], 6, 2));
                        $inOut = (substr($attendanceData[3], 0, 2) . ':' . substr($attendanceData[3], 2, 2) . ':' . substr($attendanceData[3], 4, 2));


                        $deviceAttendance = DeviceAttendance::firstOrCreate([
                            'device_name' => $attendanceData[0],
                            'employeeId' => $attendanceData[1],
                            'date' => $date,
                            'inOut' => $inOut,
                            'active' => 1,
                            'slug' => Str::slug(md5(time() . rand()))
                        ]);
                        $deviceAttendance->save();
                        foreach ($employees as $employee) {
                            $emply = DeviceAttendance::where('employeeId', $employee->id_no)->get();

                        }



                    }
                }


            } else {
                return "no new file added";
            }
        }
        dd($emply);
    }


}
