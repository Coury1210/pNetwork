<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ForumDiscussion;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
	public function search(Request $request, $module)
	{
		$searchTerm = $request->search;
		$data = collect();

		if ($module == 'users') {
			$data = User::query()
				->orWhere('username', 'LIKE', "%{$searchTerm}%")
				->orWhere('first_name', 'LIKE', "%{$searchTerm}%")
				->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
				->orWhere('email', 'LIKE', "%{$searchTerm}%")
				->paginate(15);
		}

		if ($module == 'market_place') {
			$data = Product::query()
				->orWhere('name', 'LIKE', "%{$searchTerm}%")
				->orWhere('description', 'LIKE', "%{$searchTerm}%")
				->paginate(15);
			return view('search', compact('data', 'module'));
		}

		if ($module == 'forum_discussions') {
			dd(12);
			$data = ForumDiscussion::query()
				->orWhere('topic', 'LIKE', "%{$searchTerm}%")
				->orWhere('description', 'LIKE', "%{$searchTerm}%")
				->paginate(15);
		}

		if ($module == 'inbox') {
			$data = Message::query()
				->orWhere('content', 'LIKE', "%{$searchTerm}%")
				->paginate(15);
		}
		return view('search', compact('data', 'module'));
	}
}
