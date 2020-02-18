<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Tables\Builders\Admin\SubscriberTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\ValidatePostRequest;

class SubscriberTableController extends Controller
{
    use Datatable;
    protected $tableClass = SubscriberTable::class;

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return [
            'message' => __('The Subscriber was successfully deleted'),
            'redirect' => 'admin.subscribers',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function read(Subscriber $subscriber) {
        $read = $subscriber->read;
        if($read == 0) {
            //update read =1
            $subscriber->update(["read"=>1]);
        }else {
            //update read = 0
            $subscriber->update(["read"=>0]);
        }
        if(env('APP_DEBUG', false) == true) {
            Log::info('SubscriberTableController->read->'.$read);
        }
        return [
            'message' => __('The subscriber read was successfully updated'),
            'redirect' => 'admin.subscriber.edit'
        ];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' SubscriberTableController-> store');
        }
        $subscriber = Subscriber::create($request->all());

        return [
            'message' => __('The Subscriber was successfully created'),
            'redirect' => 'admin.subscriber.edit',
            'param' => ['subscriber' => $subscriber->id],
        ];
    }
    public function show(Subscriber $subscriber) {
        return ['subscriber', $subscriber];
    }

    // public function edit(Subscriber $subscriber, PostForm $form) {
    //     return ['form' => $form->edit($post)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
