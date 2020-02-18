<?php

namespace App\Http\Controllers;

use App\Traits\{ApiMotbit, View};
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use ApiMotbit;

    public function report()
    {
        $count_users = $this->getModel('User')->count();
        $count_posts = $this->getModel('Post')->active()->post()->count();
        $count_subscribers = $this->getModel('Subscriber')->count();
        $count_comments = $this->getModel('Comment')->count();
        $count_contacts = $this->getModel('CustomerContact')->count();
        $count_products = $this->getModel('Product')->count();
        $new_comments= $this->getModel('Comment')->orderBy('created_at', 'desc')->take(5)->get();
        $new_contacts= $this->getModel('CustomerContact')->orderBy('created_at', 'desc')->take(5)->get();
        $new_subscribers= $this->getModel('Subscriber')->orderBy('created_at', 'desc')->take(5)->get();
        return compact(
            'count_users',
            'count_posts',
            'count_contacts',
            'count_comments',
            'count_subscribers',
            'count_products',
            'new_comments',
            'new_contacts',
           'new_subscribers'
            );
    }
}
