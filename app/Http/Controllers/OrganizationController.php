<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Occupation;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * @group Organizations
     *
     * List all organizations
     *
     * Returns a list of all organizations with their houses, phones, and occupations.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Parker Inc",
     *     "house_id": 3,
     *     "phones": [{"number":"123-456"},{"number":"789-012"}],
     *     "occupations": [{"name":"Food"},{"name":"Beverages"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
    public function index()
    {
        $organizations = Organization::all();
        return response()->json($organizations);
    }

    /**
     * @group Organizations
     *
     * Get organization by ID
     *
     * @urlParam id integer required The ID of the organization
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Parker Inc",
     *   "house_id": 3,
     *   "phones": [{"number":"123-456"}],
     *   "occupations": [{"name":"Food"}],
     *   "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     * }
     */
    public function show($organizationId)
    {
        $organization = Organization::where('id', $organizationId)->first();
        return response()->json($organization->load('house', 'phones', 'occupations'));
    }

    /**
     * @group Organizations
     *
     * List organizations in a specific house
     *
     * @urlParam id integer required The ID of the house
     *
     * @response 200 [
     *   {
     *     "id": 2,
     *     "name": "Green Foods",
     *     "house_id": 3,
     *     "phones": [{"number":"555-123"}],
     *     "occupations": [{"name":"Food"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
    public function byHouse($houseId)
    {
        $house = House::where('id', $houseId)->first();
        return response()->json($house->organizations()->with('occupations', 'phones')->get());
    }

    /**
     * @group Organizations
     *
     * Search organizations by occupation ID
     *
     * Returns all organizations linked to a specific occupation.
     *
     * @urlParam occupation integer required The ID of the occupation
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Parker Inc",
     *     "house_id": 3,
     *     "phones": [{"number":"123-456"}],
     *     "occupations": [{"name":"Food"},{"name":"Dairy"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
    public function byOccupation($occupationId)
    {
        $occupation = Occupation::where('id', $occupationId)->first();
        $orgs = $occupation->organizations()->with('house', 'phones')->get();
        return response()->json($orgs);
    }


    /**
     * @group Organizations
     *
     * Search organizations by geographic location
     *
     * Returns organizations within a given radius from a point.
     *
     * @queryParam lat float required Latitude of center point
     * @queryParam lng float required Longitude of center point
     * @queryParam radius float required Radius in kilometers
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Parker Inc",
     *     "house_id": 3,
     *     "distance": 2.34,
     *     "phones": [{"number":"123-456"}],
     *     "occupations": [{"name":"Food"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
    public function byLocation(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        $lat = $request->lat;
        $lng = $request->lng;
        $radius = $request->radius;

        $organizations = Organization::select('organizations.*')
            ->join('houses', 'organizations.house_id', '=', 'houses.id')
            ->selectRaw(
                "6371 * acos(
            cos(radians(?)) *
            cos(radians(houses.latitude)) *
            cos(radians(houses.longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(houses.latitude))
        ) AS distance",
                [$lat, $lng, $lat]
            )
            ->whereRaw(
                "6371 * acos(
            cos(radians(?)) *
            cos(radians(houses.latitude)) *
            cos(radians(houses.longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(houses.latitude))
        ) <= ?",
                [$lat, $lng, $lat, $radius]
            )
            ->with('occupations', 'phones', 'house')
            ->get();
        return response()->json($organizations);
    }

    /**
     * @group Organizations
     *
     * Search organizations by occupation name
     *
     * Returns organizations linked to an occupation name and its children.
     *
     * @queryParam q required The occupation name to search
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Parker Inc",
     *     "house_id": 3,
     *     "phones": [{"number":"123-456"}],
     *     "occupations": [{"name":"Food"},{"name":"Dairy"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
    public function byOccupationName(Request $request)
    {
        $request->validate(['q' => 'required|string']);
        $query = $request->q;

        $occupation = Occupation::where('name', $query)->first();
        if (!$occupation) {
            return response()->json([]);
        }
        $occupationIds = $occupation->tree();
        $occupationIds[] = $occupation->id;

        $organizations = Organization::whereHas('occupations', function ($q) use ($occupationIds) {
            $q->whereIn('occupations.id', $occupationIds);
        })->with('house', 'phones', 'occupations')->get();

        return response()->json($organizations);
    }

    /**
     * @group Organizations
     *
     * Search organizations by name
     *
     * @queryParam q string required The search term for organization name
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Parker Inc",
     *     "house_id": 3,
     *     "phones": [{"number":"123-456"}],
     *     "occupations": [{"name":"Food"}],
     *     "house": {"id":3,"address":"123 Main St","latitude":40.12,"longitude":44.56}
     *   }
     * ]
     */
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
