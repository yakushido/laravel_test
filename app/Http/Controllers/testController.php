<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show(Request $request)
    {
        $items = $request->all();
        $items['fullname'] = $request->firstname . ' ' . $request->lastname;
        return view('confirm', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $items = $request->all();
        $items['fullname'] = $request->firstname . ' ' . $request->lastname;
        Contact::create([
            'fullname' => $items['fullname'],
            'gender' => $items['gender'],
            'email' => $items['email'],
            'postcode' => $items['postcode'],
            'address' => $items['address'],
            'building_name' => $items['building_name'],
            'opinion' => $items['opinion']
        ]);
        return view('thanks');
    }

    public function modif(Request $request)
    {
        $items = $request->all();
        $items['fullname'] = $request->firstname . ' ' . $request->lastname;
        return view('update', ['items' => $items]);
        // var_dump($items['gender']);
    }

    public function manage(Request $request)
    {
        $items = Contact::paginate(10);
        $query = Contact::query();

        // return view('manage', ['items' => $items]);
        $keyword_fullname = $request->input('fullname');
        $keyword_gender = $request->input('gender');
        $keyword_from = $request->input('from');
        $keyword_until = $request->input('until');
        $keyword_email = $request->input('email');

        $query = Contact::query();

        if (!empty($keyword_fullname)) {
            $query->where('fullname', 'LIKE', '%' . $keyword_fullname . '%')->get();
        } elseif (!empty($keyword_from) && !empty($keyword_until)) {
            $query->whereBetween('created_at', [$keyword_from, $keyword_until])->get();
        } elseif (!empty($keyword_email)) {
            $query->where('email', 'LIKE', '%' . $keyword_email . '%')->get();
        } elseif ($keyword_gender == '1') {
            $query->where('gender', '1')->get();
        } elseif ($keyword_gender == '2') {
            $query->where('gender', '2')->get();
        }
        $items = $query->paginate(10);
        return view('manage')->with('items', $items);
    }
    public function delete(Request $request, $id)
    {
        $delete_id = Contact::find($id);
        $delete_id->delete();
        return redirect('/manage');
    }
}
