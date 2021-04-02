<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\QueryAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
  public function verify(Request $request)
  {
    $addressCount = Address::
        where('area', $request->input('area'))
      ->where('city', $request->input('city'))
      ->where('region', $request->input('region'))
      ->where('street', $request->input('street'))
      ->where('house', $request->input('house'))
      ->count();
    QueryAddress::firstOrCreate([
        'area' => $request->input('area'),
        'area_type_full' => $request->input('area_type_full'),
        'city' => $request->input('city'),
        'city_type_full' => $request->input('city_type_full'),
        'federal_district' => $request->input('federal_district'),
        'geo_lat' => $request->input('geo_lat'),
        'geo_lon' => $request->input('geo_lon'),
        'house' => $request->input('house'),
        'house_type_full' => $request->input('house_type_full'),
        'match' => $addressCount,
        'postal_code' => $request->input('postal_code'),
        'region' => $request->input('region'),
        'region_type_full' => $request->input('region_type_full'),
        'settlement' => $request->input('settlement'),
        'settlement_type_full' => $request->input('settlement_type_full'),
        'street' => $request->input('street'),
        'street_type_full' => $request->input('street_type_full'),
      ]);
    return response($addressCount);
  }

  public function add(Request $request)
  {
    Address::firstOrCreate([
      'area' => $request->input('area'),
      'area_type_full' => $request->input('area_type_full'),
      'city' => $request->input('city'),
      'city_type_full' => $request->input('city_type_full'),
      'federal_district' => $request->input('federal_district'),
      'geo_lat' => $request->input('geo_lat'),
      'geo_lon' => $request->input('geo_lon'),
      'house' => $request->input('house'),
      'house_type_full' => $request->input('house_type_full'),
      'postal_code' => $request->input('postal_code'),
      'region' => $request->input('region'),
      'region_type_full' => $request->input('region_type_full'),
      'settlement' => $request->input('settlement'),
      'settlement_type_full' => $request->input('settlement_type_full'),
      'street' => $request->input('street'),
      'street_type_full' => $request->input('street_type_full'),
    ]);
  }
}
