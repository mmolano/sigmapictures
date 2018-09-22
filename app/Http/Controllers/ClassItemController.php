<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassItemController extends Controller
{

    public function show_reference_by_machine($reference_machine_name)
    {
        $reference_by_machine = DB::table('tbl_reference')
            ->join('tbl_reference_machine', 'tbl_reference.category_reference','=','tbl_reference_machine.reference_machine_name')
            ->select('tbl_reference.*','tbl_reference_machine.reference_machine_name')
            ->where('tbl_reference_machine.reference_machine_name', $reference_machine_name)
            ->where('tbl_reference.publication_status',1)
            ->limit(15)
            ->get();

        $manage_reference_by_machine = view('pages.show_reference_by_machine')
            ->with('reference_by_machine', $reference_by_machine);
        return view('layouts.master')
            ->with('pages.show_reference_by_machine', $manage_reference_by_machine);
    }


    public function show_reference_by_installation($reference_installation_name)
    {
        $reference_by_installation = DB::table('tbl_reference')
            ->join('tbl_reference_installation', 'tbl_reference.reference_detail_installation','=','tbl_reference_installation.reference_installation_name')
            ->select('tbl_reference.*','tbl_reference_installation.reference_installation_name')
            ->where('tbl_reference_installation.reference_installation_name', $reference_installation_name)
            ->where('tbl_reference.publication_status',1)
            ->limit(15)
            ->get();

        $manage_reference_by_installation = view('pages.show_reference_by_installation')
            ->with('reference_by_installation', $reference_by_installation);
        return view('layouts.master')
            ->with('pages.show_reference_by_installation', $manage_reference_by_installation);
    }


}
