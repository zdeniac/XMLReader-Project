<?php

namespace App\Http\Controllers;

use App\Exceptions\XMLUploadException;
use App\Helpers\XMLReader;
use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use App\Models\PersonLog;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persons.index', [
            'persons' => Person::with('log')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        try {
            /**
             * @var \Illuminate\Http\UploadedFile $file
             */
            $file = $request->file('file');
            $xml = (new XMLReader($file))->readAsArray();

            $xml = $xml['person'];
            $log = [];

            // We create the data for the log table
            foreach ($xml as $key1 => $value1)
            {
                foreach ($value1 as $key2 => $value2)
                {
                    if ($key2 == 'id') {
                        $log[] = [
                            'person_id' => $value2,
                            'created_at' => now()
                        ];
                    }
                }
            }

            // We start a transaction of creating the data
            // if it fails at any point, we revert the whole process
            DB::transaction(function() use ($xml, $log) {
                Person::insert($xml);
                PersonLog::insert($log);
            });

            return redirect()->route('persons.index')
                             ->with('success', 'Sikeresen feltöltötte az adatokat!');
        }
        catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function storeWithoutTransaction(StorePersonRequest $request)
    {
        try {

            /**
             * @var \Illuminate\Http\UploadedFile $file
             */
            $file = $request->file('file');
            $xml = (new XMLReader($file))->readAsArray()['person'];

            foreach ($xml as $data) {

                $person = Person::create($data);

                if (! $person->exists()) {
                    throw new XMLUploadException('Hiba történt a feltöltéskor.');
                }

                $log = PersonLog::create([
                    'person_id' => $person->id,
                    'created_at' => now(),
                ]);
            }

            return redirect()->route('persons.index')
                             ->with('success', 'Sikeresen feltöltötte az adatokat!');
        }
        catch (XMLUploadException $e) {
            return back()->withErrors($e->getMessage())
                         ->with('missingData', $data);
        }
        catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('persons.show', [
            'person' => $person->load('log')
        ]);
    }

}
