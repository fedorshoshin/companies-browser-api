<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Occupation;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return response()->json($organizations);
    }

    public function show($organizationId)
    {
        $organization = Organization::where('id', $organizationId)->first();
        return response()->json($organization->load('house', 'phones', 'occupations'));
    }


    public function byHouse($houseId)
    {
        $house = House::where('id', $houseId)->first();
        return response()->json($house->organizations()->with('occupations', 'phones')->get());
    }

    public function byOccupation($occupationId)
    {
        $occupation = Occupation::where('id', $occupationId)->first();
        $orgs = $occupation->organizations()->with('house', 'phones')->get();
        return response()->json($orgs);
    }

    public function byLocation(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'radius' => 'required|numeric', // in km
        ]);

        $lat = $request->lat;
        $lng = $request->lng;
        $radius = $request->radius;

        $organizations = Organization::select('organizations.*')
            ->join('houses', 'organizations.house_id', '=', 'houses.id')
            ->selectRaw("6371 * acos(cos(radians(?)) * cos(radians(houses.latitude)) * cos(radians(houses.longitude) - radians(?)) + sin(radians(?)) * sin(radians(houses.latitude))) AS distance", [$lat, $lng, $lat])
            ->having('distance', '<=', $radius)
            ->with('occupations', 'phones', 'house')
            ->get();

        return response()->json($organizations);
    }

    public function byOccupationName(Request $request)
    {
        $request->validate(['q' => 'required|string']);
        $query = $request->q;

        $occupation = Occupation::where('name', $query)->first();
        if (!$occupation) {
            return response()->json([]);
        }
        $occupationIds = $occupation->tree(); // we need to implement this method
        $occupationIds[] = $occupation->id;

        $organizations = Organization::whereHas('occupations', function ($q) use ($occupationIds) {
            $q->whereIn('occupations.id', $occupationIds);
        })->with('house', 'phones', 'occupations')->get();

        return response()->json($organizations);
    }

    public function byName(Request $request)
    {
        $request->validate(['q' => 'required|string']);
        $query = $request->q;

        $organization = Organization::where('name', 'LIKE', "%{$query}%")
            ->with('house', 'phones', 'occupations')
            ->get();
        return response()->json($organization);
    }
}
