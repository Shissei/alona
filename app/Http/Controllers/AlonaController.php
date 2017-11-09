<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class AlonaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function getForm() {
        return view('form');
    }

    public function storeGuest(Request $request) {
        $id = DB::table('bookings')->insertGetId([
            'guest' => $request->input('guest'),
            'phone' => $request->input('phone'),
            'household' => $request->input('household'),
            'room' => $request->input('room'),
            'arr_days' => $request->input('arr_days'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'arr_price' => $request->input('arr_price'),
            'insurance' => $request->input('insurance'),
            'arr_sum' => $request->input('arr_sum'),
            'guarantee' => $request->input('guarantee'),
            'arr_neto' => $request->input('arr_neto'),
            'comment' => $request->input('comment')
        ]);
        
        return redirect('/print');
        
    }

    public function getGuestPrint(Request $request) {
        $host = DB::table('bookings')->orderBy('id', 'desc')->first();
       
        view()->share('host', $host);
        if($request->has('download')) {
            $pdf = PDF::loadView('print');
            return $pdf->download('guest_' . date('d-m-Y H_i_s\h') . '.pdf');
        }

        return view('print', compact('host'));
    }

    public function find() {
        return view('find');
    }

    public function getGuest(Request $request) {
        $find = $request->input('find');
        $guests = DB::table('bookings')->where('id', $find)
                            ->orWhere('guest', $find)
                            ->orWhere('household', $find)
                            ->paginate(2);
       return view('show')->with('guests', $guests);

    }

    public function getList(Request $request) {
        $household = $request->object;
        
        if ($household == 'Svi apartmani') {
            $guests = DB::table('bookings')->paginate(2);

        } else {
            $guests = DB::table('bookings')->where('household', $household)->paginate(2);
        }
        // $guests = DB::table('bookings')->paginate(5);
        return view('show', compact(['guests', 'household']));

    }

    public function getPrint(Request $request) {
        $id = $request->id;
        $host = DB::table('bookings')->where('id', $id)->get();
        view()->share('host', $host);

        if ($request->has('pdf')) {
            $pdf = PDF::loadView('guest');
            return $pdf->download('guest_' . date('d-m-Y') . '.pdf');
        }
        return view('guest')->with('host', $host);
    }

    public function edit(Request $request) {
        $host = DB::table('bookings')->where('id', $request->id)->get();
        return view('edit')->with('host', $host);
    }

    public function update(Request $request) {
        $data = DB::table('bookings')->where('id', $request->id)->first();
        $host1 = get_object_vars($data);
        $host2 = $request->all();
        $test = false;

        $diff = array_diff_assoc($host1, $host2); 
        $what = array_keys($diff);
        $from = array_values($diff);
        $to = \array_intersect_key($host2, $diff);
        $data_changed = $old_value = $new_value = '';

        if (count($what) > 1) {
            $data_changed = implode(', ', $what);
        } else {
            $data_changed = $what;
        }

        if (count($from) > 1) {
            $old_value = implode(', ', $from);
        } else {
            $old_value = $from;
        }

        if (count($to) > 1) {
            $new_value = implode(', ', $to);
        } else {
            $new_value = $to;
        }
        
        if (!empty($diff)) {
            echo "Update me";
        } else {
            echo "Go back, you faggot!";
        }

        // dump($data_changed, $old_value, $new_value);
        
        if (!empty($diff)) {
            DB::table('revisions')->insert([
                'guest_id' => $host1['id'],
                'data_changed' => $data_changed,
                'old_value' => $old_value,
                'new_value' => $new_value,
                'old_booking' => json_encode([
                    'guest' => $host1['guest'],
                    'phone' => $host1['phone'],
                    'household' => $host1['household'],
                    'room' => $host1['room'],
                    'arr_days' => $host1['arr_days'],
                    'from_date' => $host1['from_date'],
                    'to_date' => $host1['to_date'],
                    'arr_price' => $host1['arr_price'],
                    'insurance' => $host1['insurance'],
                    'arr_sum' => $host1['arr_sum'],
                    'guarantee' => $host1['guarantee'],
                    'arr_neto' => $host1['arr_neto'],
                    'comment' => $host1['comment']
                ]),
                'updated_at' => date('Y-m-d')
            ]);
            if (DB::table('bookings')->where('id', $host1['id'])->update([
                'guest' => $request->input('guest'),
                'phone' => $request->input('phone'),
                'household' => $request->input('household'),
                'room' => $request->input('room'),
                'arr_days' => $request->input('arr_days'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'arr_price' => $request->input('arr_price'),
                'insurance' => $request->input('insurance'),
                'arr_sum' => $request->input('arr_sum'),
                'guarantee' => $request->input('guarantee'),
                'arr_neto' => $request->input('arr_neto'),
                'comment' => $request->input('comment')
            ])) return redirect('/guest?id=' . $host1['id']);
            
        } else {
            echo "Ne diraj nista, sve je isto! \n";
        }
        
    }

    public function revisions() {
        $revisions = DB::table('revisions')->where('guest_id', '1')->get();
        $index = [];
        $values1 = [];
        $values2 = [];
        $tasks[] = [];
        foreach($revisions as $r) {
            $index = explode(',', $r->data_changed);
            $values1 = explode(',', $r->old_value);
            $values2 = explode(',', $r->new_value);

            foreach($index as $key => $value) {
                $comparison[$value] = [$values1[$key], $values2[$key]];
            }
            $tasks[$r->id] = $comparison;
            $tasks[$r->id]['updated_at'] = $r->updated_at;
            unset($comparison);
        }
        unset($tasks[0]);
        $guest = DB::table('bookings')->where('id', '1')->pluck('guest');
        $guest[] = $revisions[0]->guest_id;
        return view('revisions')->with(['tasks' => $tasks, 'guest' => $guest]);
    }

}