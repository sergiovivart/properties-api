<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Office;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Neighborhood;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Region;
use App\Models\Location;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $office = Office::first();
        $type = PropertyType::first();
        $user = User::first();
        $neighborhood = Neighborhood::first();
        $district = District::first();
        $municipality = Municipality::first();
        $region = Region::first();
        $location = Location::first();

        Property::create([
            'ulid' => '01ARZ3NDEKTSV4RRFFQ69G5FAV',
            'intern_reference' => 'PROP-12345',
            'title' => 'Piso en el centro de Valencia',
            'street' => 'Calle Mayor',
            'number' => '10',
            'zip_code' => '46001',
            'is_active' => true,
            'is_sell' => true,
            'is_rent' => false,
            'sell_price' => 250000,
            'rental_price' => null,
            'built_m2' => 85,
            'office_id' => $office->id,
            'property_type_id' => $type->id,
            'user_id' => $user->id,
            'secondary_user_id' => null,
            'neighborhood_id' => $neighborhood->id,
            'district_id' => $district->id,
            'municipality_id' => $municipality->id,
            'region_id' => $region->id,
            'location_id' => $location->id,
        ]);
    }
}
