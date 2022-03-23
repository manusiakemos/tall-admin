<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

function base64_to_jpeg($base64_string, $output_file)
{
    // open the output file for writing
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    if (count($data) > 1) {
        fwrite($ifp, base64_decode($data[1]));
    } else {
        fwrite($ifp, base64_decode($data[0]));
    }

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}

function save_base64_image($base64_string, $filename)
{
    $image = base64_to_jpeg($base64_string, $filename);
    file_put_contents(public_path("images/$filename"), $image);
}

function stringToColorCode($str)
{
    $code = dechex(crc32($str));
    $code = substr($code, 0, 6);
    return $code;
}

function replaceArrayString($x)
{
    $y = preg_replace("(\]|\[|'|\")", "", $x);
    return $y;
}

function my_upload_file($file, $path = "uploads", $withpath = false)
{
    $ext = $file->getClientOriginalExtension();
    $filename = Str::random() . '.' . $ext;
    $file->move($path, $filename);
    if ($withpath) {
        return asset($path . "/" . $filename);
    } else {
        return $filename;
    }
}

function base64_to_image($data, $path)
{
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);

    $up = File::put(public_path($path), $data);

    return $up;
}

function if_empty($str, $out = "-")
{
    if ($str == null) {
        return $out;
    }
    return $str;
}

function boolean_text($bool, $true = "aktif", $false = "nonaktif")
{
    if ($bool == true) {
        return $true;
    } else {
        return $false;
    }
}

function text_boolean($text, $true = "aktif", $false = "nonaktif")
{
    if ($text == $true) {
        return true;
    } else {
        return false;
    }
}

function getMonthFromDate($date, $year = false): string
{
    $dt = Carbon::parse($date);
    if ($year) {
        return month($dt->month) . ' ' . $dt->year;
    }
    return month($dt->month);
}

function responseJson($message, $data = null, $status = true, $text = 'success', $statusCode = 200)
{
    return response(['status' => $status, 'text' => $text, 'message' => $message, 'data' => $data], $statusCode);
}

function month($month): string
{
    if ($month == 1) {
        $bulan = 'januari';
    } else if ($month == 2) {
        $bulan = 'februari';
    } else if ($month == 3) {
        $bulan = 'maret';
    } else if ($month == 4) {
        $bulan = 'april';
    } else if ($month == 5) {
        $bulan = 'mei';
    } else if ($month == 6) {
        $bulan = 'juni';
    } else if ($month == 7) {
        $bulan = 'juli';
    } else if ($month == 8) {
        $bulan = 'agustus';
    } else if ($month == 9) {
        $bulan = 'september';
    } else if ($month == 10) {
        $bulan = 'oktober';
    } else if ($month == 11) {
        $bulan = 'november';
    } else if ($month == 12) {
        $bulan = 'desember';
    }

    return $bulan;
}

function waktu($timestamps): string
{
    $dt = Carbon::parse($timestamps);
    return $dt->hour . ":" . $dt->minute;
}

function tanggal($timestamps, $isCarbon = false, $tampilkan_hari = true, $tampilkan_waktu = false, $hanyaHari = false): string
{
    if ($isCarbon) {
        $dt = $timestamps;
    } else {
        $dt = Carbon::parse($timestamps);
    }
    $dayOfWeek = $dt->dayOfWeek;
    $day = $dt->day;
    $month = $dt->month;
    $year = $dt->year;

    if ($dayOfWeek == 1) {
        $dayOfWeek = 'Senin';
    } else if ($dayOfWeek == 2) {
        $dayOfWeek = 'Selasa';
    } else if ($dayOfWeek == 3) {
        $dayOfWeek = 'Rabu';
    } else if ($dayOfWeek == 4) {
        $dayOfWeek = 'Kamis';
    } else if ($dayOfWeek == 5) {
        $dayOfWeek = 'Jumat';
    } else if ($dayOfWeek == 6) {
        $dayOfWeek = 'Sabtu';
    } else {
        $dayOfWeek = 'Minggu';
    }

    if ($hanyaHari) {
        return $dayOfWeek;
    }

    if (!$tampilkan_hari) {
        $dayOfWeek = "";
    }

    if ($month == 1) {
        $bulan = 'januari';
    } else if ($month == 2) {
        $bulan = 'februari';
    } else if ($month == 3) {
        $bulan = 'maret';
    } else if ($month == 4) {
        $bulan = 'april';
    } else if ($month == 5) {
        $bulan = 'mei';
    } else if ($month == 6) {
        $bulan = 'juni';
    } else if ($month == 7) {
        $bulan = 'juli';
    } else if ($month == 8) {
        $bulan = 'agustus';
    } else if ($month == 9) {
        $bulan = 'september';
    } else if ($month == 10) {
        $bulan = 'oktober';
    } else if ($month == 11) {
        $bulan = 'november';
    } else if ($month == 12) {
        $bulan = 'desember';
    }

    $bulan = ucwords($bulan);

    $waktu = $dt->format("H:i:s");

    if ($tampilkan_waktu) {
        $tanggal = "$dayOfWeek $day $bulan $year $waktu";
    } else {
        $tanggal = "$dayOfWeek $day $bulan $year";
    }

    return $tanggal;
}

function rupiah($angka, $tampilkanRupiah = true)
{
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $tampilkanRupiah ? "Rp." . $hasil_rupiah : $hasil_rupiah;
}

function generate_links($name, $id, $links_additional = [])
{
    $links = [
        'store' => route($name . ".store"),
        'show' => route($name . '.show', $id),
        'edit' => route($name . '.edit', $id),
        'update' => route($name . '.update', $id),
        'destroy' => route($name . '.destroy', $id),
    ];
    if (count($links_additional) > 0) {
        array_push($links, $links_additional);
    }
    return auth()->check() ? $links : [];
}

function generate_links_api($name, $id, $links_additional = [])
{
    $links = [
        'store' => route($name . ".store"),
        'show' => route($name . '.show', $id),
        'update' => route($name . '.update', $id),
        'destroy' => route($name . '.destroy', $id),
    ];

    if (count($links_additional) > 0) {
        /*foreach($links_additional as $key => $link){
            array_merge($links, $link);
        }*/
        $links = array_merge($links, $links_additional);
    }

    return $links;
}
