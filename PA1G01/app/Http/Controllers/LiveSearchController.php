<?php

// namespace App\Http\Controllers;

// use App\Models\Galery;
// use Illuminate\Http\Request;

// class LiveSearchController extends Controller
// {
//     function index()
//     {
//         return view();
//     }
//     function action(Request $request)
//     {
//         if ($request->ajax()) {
//             $output = '';
//             $query = $request->get('query');
//             if ($query != '') {
//                 $data = Galery::where('nama', 'like', '%' . $query . '%')
//                     ->orwhere('description', 'like', '%' . $query . '%')
//                     ->orderBy('id', 'desc')
//                     ->get();
//             }
//         } else {
//             $data = Galery::orderBy('id', 'desc')->get();
//         }

//         $total_row = $data->count();
//         if ($total_row > 0) {

//         } else {
//             $output = '
//         <tr>
//         <td align= "center" colspan= "5"> No Data Found</td>
//         </tr>';

//         }
//     }
// }
