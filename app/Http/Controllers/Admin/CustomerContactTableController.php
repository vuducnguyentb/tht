<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\CustomerContactTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\CustomerContact;
use App\Http\Requests\Admin\ValidatePostRequest;

class CustomerContactTableController extends Controller
{
    use Datatable;
    protected $tableClass = CustomerContactTable::class;

    public function destroy(CustomerContact $customercontact)
    {
        $customercontact->delete();
        return [
            'message' => __('The CustomerContact was successfully deleted'),
            'redirect' => 'admin.customercontacts',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' CustomerContactTable-> store');
        }
        $customercontact = CustomerContact::create($request->all());

        return [
            'message' => __('The customercontact was successfully created'),
            'redirect' => 'admin.customercontact.edit',
            'param' => ['customercontact' => $customercontact->id],
        ];
    }
    public function show(CustomerContact $customercontact) {
        return ['customercontact', $customercontact];
    }
    public function read(CustomerContact $customercontact) {
        $read = $customercontact->read;
        if($read == 0) {
            //update read =1
            $customercontact->update(["read"=>1]);
        }else {
            //update read = 0
            $customercontact->update(["read"=>0]);
        }
        if(env('APP_DEBUG', false) == true) {
            Log::info('CustomerContactTableController->read->'.$read);
        }
        return [
            'message' => __('The customercontact read was successfully updated'),
            'redirect' => 'admin.customercontact.edit'
        ];
    }
    // public function edit(CustomerContact $customercontact, PostForm $form) {
    //     return ['form' => $form->edit($post)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}