<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PurchaseReceiptRequest as StoreRequest;
use App\Http\Requests\PurchaseReceiptRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

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
            'type'=>'number',
            'label'=>'Paid',
            'name'=>'paid',
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
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
