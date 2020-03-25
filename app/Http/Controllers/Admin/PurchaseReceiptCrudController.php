<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PurchaseReceiptRequest as StoreRequest;
use App\Http\Requests\PurchaseReceiptRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use App\Transaction;
/**
 * Class PurchaseReceiptCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PurchaseReceiptCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\PurchaseReceipt');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/purchasereceipt');
        $this->crud->setEntityNameStrings('purchasereceipt', 'purchase_receipts');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->addField([
            'type'=>'select',
            'label'=>'Supplier',
            'name'=>'supplier_id',
            'entity'=>'supplier',
            'attribute'=>'name',
        ]);

        $this->crud->addField([
            'type'=>'select',
            'label'=>'Supplier',
            'name'=>'supplier_id',
            'entity'=>'supplier',
            'attribute'=>'name',
        ]);

        $this->crud->addField([
            'type'=>'date_picker',
            'label'=>'Date',
            'name'=>'date',
        ]);

        $this->crud->addField([
            'type'=>'date_picker',
            'label'=>'Date',
            'name'=>'date',
        ]);

        
        
        $this->crud->removeField('creator');
        // add asterisk for fields that are required in PurchaseReceiptRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        // $this->setPermissions();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {

        $transaction = new Transaction();
        $transaction->purpose='purchase';
        $transaction->ledger_id=$request->supplier_id;
        $transaction->purpose='1';
        $transaction->date=$request->date;
        $transaction->amount=$request->amount;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->purpose='purchase_payment';
        $transaction->ledger_id=$request->supplier_id;
        $transaction->purpose='1';
        $transaction->date=$request->date;
        $transaction->amount=$request->paid;
        $transaction->save();

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();

        // Deny all accesses
        $this->crud->denyAccess(['list', 'create', 'update', 'delete']);

        // Allow list access
        if ($user->can('list_products')) {
            $this->crud->allowAccess('list');
        }

        // Allow create access
        if ($user->can('create_product')) {
            $this->crud->allowAccess('create');
        }

        // Allow update access
        if ($user->can('update_product')) {
            $this->crud->allowAccess('update');
        }

        // Allow clone access
        if ($user->can('clone_product')) {
            $this->crud->addButtonFromView('line', trans('product.clone'), 'clone_product', 'end');
        }

        // Allow delete access
        if ($user->can('delete_product')) {
            $this->crud->allowAccess('delete');
        }
    }

}
