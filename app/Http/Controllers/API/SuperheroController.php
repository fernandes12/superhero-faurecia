<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\AbilitySuperhero;
use App\Models\Superhero;
use App\Models\Team;
use App\Models\TeamSuperhero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('index');
        // return response()->json($superheros);
    }

    public function all_superheros()
    {
        $superheros = Superhero::all();
        
        return view('all-superheros', compact('superheros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abilities = Ability::all();
        $teams = Team::all();
        return view('superhero', compact('abilities','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->abilities[0]);
        $validate = $request->validate([
                'real_name' => 'required',
                'hero_name' => 'required',
                'publisher' => 'required',
                'date' => 'required'
            ],
        );

        $superhero = new Superhero();
        $superhero->real_name = $request->real_name;
        $superhero->hero_name = $request->hero_name;
        $superhero->publisher = $request->publisher;
        $superhero->date = $request->date;
        $superhero->save();

        if ($request->abilities) {
            for ($i=0; $i < count($request->abilities); $i++) { 
                $abilityObj = new AbilitySuperhero();
                $abilityObj->ability_id = $request->abilities[$i];
                $abilityObj->superhero_id = $superhero->id;
                $abilityObj->save();
                unset($abilityObj);
            }
        }

        if ($request->teams) {
            for ($i=0; $i < count($request->teams); $i++) { 
                $teamObj = new TeamSuperhero();
                $teamObj->team_id = $request->teams[$i];
                $teamObj->superhero_id = $superhero->id;
                $teamObj->save();
                unset($teamObj);
            }
        }

        if ($validate && $superhero) {
            return redirect()->route('api.all')->with('success','New superhero added successfully!');
        } else {
            return redirect()->back()->with('error','It was not possible to add a new superhero!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superhero = DB::table('superheroes')->where('id', $id)->first();

        $hero_abilities = DB::table('ability_superheroes')
            ->join('superheroes', 'ability_superheroes.superhero_id', '=', 'superheroes.id')
            ->join('abilities', 'abilities.id', '=', 'ability_superheroes.ability_id')
            ->select('abilities.*')
            ->where('superheroes.id', '=', $superhero->id)
            ->get();
        
        $hero_teams = DB::table('team_superheroes')
            ->join('superheroes', 'team_superheroes.superhero_id', '=', 'superheroes.id')
            ->join('teams', 'teams.id', '=', 'team_superheroes.team_id')
            ->select('teams.*')
            ->where('superheroes.id', '=', $superhero->id)
            ->get();

        if ($superhero) {
            return view('view', compact('superhero', 'hero_abilities', 'hero_teams'));
        } else {
            return redirect()->back()->with('error','Could not find the superhero!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superhero = DB::table('superheroes')->where('id', $id)->first();
        $abilities = DB::table('abilities')->get();
        $teams = DB::table('teams')->get();

        if ($superhero) {
            return view('edit-superhero', compact('superhero', 'abilities', 'teams'));
        } else {
            return redirect()->back()->with('error','Could not find the superhero!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'real_name' => 'required',
            'hero_name' => 'required',
            'publisher' => 'required',
            'date' => 'required'
        ],
        );

        $superhero = Superhero::where('id', $request->id)
        ->update(
            ['real_name'=>$request->real_name,
             'hero_name'=>$request->hero_name,
             'publisher'=>$request->publisher,
             'date'=>$request->date,
            ]);

        $hero_teams = DB::table('team_superheroes')->where('superhero_id', $request->id)->delete();
        $hero_abilities = DB::table('ability_superheroes')->where('superhero_id', $request->id)->delete();

        if ($request->teams) {
            for ($i=0; $i < count($request->teams); $i++) { 
                $teamObj = new TeamSuperhero();
                $teamObj->team_id = $request->teams[$i];
                $teamObj->superhero_id = $request->id;
                $teamObj->save();
                unset($teamObj);
            }
        }

        if ($request->abilities) {
            for ($i=0; $i < count($request->abilities); $i++) { 
                $abilityObj = new AbilitySuperhero();
                $abilityObj->ability_id = $request->abilities[$i];
                $abilityObj->superhero_id = $request->id;
                $abilityObj->save();
                unset($abilityObj);
            }
        }

        if ($validate && $superhero) {
            return redirect()->route('api.all')->with('success','Superhero updated successfully!');
        } else {
            return redirect()->back()->with('error','It was not possible to update superhero!');
        }
    }

    public function find(Request $request)
    {
        $found_hero = Superhero::where('hero_name','like','%'.$request->search.'%')->orWhere('real_name','like','%'.$request->search.'%')->first();

        if ($found_hero) {
            $superhero = DB::table('superheroes')->where('id', $found_hero->id)->first();

                $hero_abilities = DB::table('ability_superheroes')
                    ->join('superheroes', 'ability_superheroes.superhero_id', '=', 'superheroes.id')
                    ->join('abilities', 'abilities.id', '=', 'ability_superheroes.ability_id')
                    ->select('abilities.*')
                    ->where('superheroes.id', '=', $superhero->id)
                    ->get();
                
                $hero_teams = DB::table('team_superheroes')
                    ->join('superheroes', 'team_superheroes.superhero_id', '=', 'superheroes.id')
                    ->join('teams', 'teams.id', '=', 'team_superheroes.team_id')
                    ->select('teams.*')
                    ->where('superheroes.id', '=', $superhero->id)
                    ->get();

                    return view('view', compact('superhero', 'hero_abilities', 'hero_teams'));
        } else {
            return redirect()->route('api.home')->with('error','Could not find superhero with such name!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superhero = DB::table('superheroes')->where('id', $id)->delete();

        if ($superhero) {
            return redirect()->back()->with('success','Superhero deleted successfully!');
        } else {
            return redirect()->back()->with('error','It was not possible to delete the superhero!');
        }
    }
}
