<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
class FellowshipController extends Controller
{
    //
  private $page_title = 'Manage Fellowship';


  public function index(Request $request)
  {
    $group = $request->query('grp');
    $gender = $request->query('gender');
  
    if(isset($gender))
    {
      if($gender === 'female')
      {
        $members = Member::where('gender', 'female')->get();
      }elseif ($gender === 'male') {
        $members = Member::where('gender', 'male')->get();
      }else{
        $members = Member::all();
      }
    }else {
      $members = Member::all();
    }

    return $this->assign_view($group, $members);
  }

  private function assign_view($group, $members)
  {
    $max_age = 35;
    $min_age = 10;
    $page_title = $this->page_title;
    $members = $members;
    $heading = 'Manage '.ucfirst($group).' Fellowship';
    switch ($group) {
      case 'elderly':
        return view('fellowship.elderly', compact('page_title', 'heading', 'members', 'max_age'));
        break;
      case 'children':
        return view('fellowship.children', compact('page_title', 'heading', 'members', 'min_age'));
        break;
      case 'youth':
        return view('fellowship.youth', compact('page_title', 'heading', 'members', 'min_age', 'max_age'));
        break;
      default:
        return view('fellowship.index', compact('page_title', 'heading', 'members'));
       
        break;
    }
  }

}
