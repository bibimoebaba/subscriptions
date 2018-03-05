<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\SubscriptionExceptionRule as ser;

class SubscriptionExceptionRuleTest extends TestCase
{
    
	use DatabaseTransactions;

    public function testIndexStatusCode(){
        $this->get('exceptions')
            ->seeStatusCode(200);
    }

    public function testIfIndexRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        factory(ser::class, 10)->create();
        $exceptions = ser::all();
        $this->assertCount(10, $exceptions);
    }

    public function testShowStatusCode(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $first = factory(ser::class)->create();
        $this->get('exceptions/' . $first->id)->seeStatusCode(200);
    }

    public function testIfShowRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(ser::class)->create();
        $exception = $this->get('exceptions/' . $record->id);
        $this->assertCount(1, $exception);
    }

    public function testIfRightDataIsRetrieved(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(ser::class)->create();
        $this->seeInDatabase('subscription_rule_exceptions', [
            'account_id'            => $record->account_id,
            'subscription_id'       => $record->subscription_id,
            'product_id'            => $record->product_id,
            'price'                 => $record->price,
            'quantity'              => $record->quantity,
            'time_period'           => $record->time_period,
            'priority'              => $record->priority
        ]);
    }

    public function testStoreStatusCode(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(ser::class)->make();
        $this->post('exceptions', [
            'account_id'            => $record->account_id,
            'subscription_id'       => $record->subscription_id,
            'product_id'            => $record->product_id,
            'price'                 => $record->price,
            'quantity'              => $record->quantity,
            'time_period'           => $record->time_period,
            'priority'              => $record->priority 
        ])
            ->seeStatusCode(200);
    }

    public function testIfRecordsCanBeUpdated(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(ser::class)->create();
        $updatedRecord = factory(ser::class)->make();
        $exception = ser::findOrFail($record->id);
        $exception->update([
            'account_id'            => $updatedRecord->account_id,
            'subscription_id'       => $updatedRecord->subscription_id,
            'product_id'            => $updatedRecord->product_id,
            'price'                 => $updatedRecord->price,
            'quantity'              => $updatedRecord->quantity,
            'time_period'           => $updatedRecord->time_period,
            'priority'              => $updatedRecord->priority 
        ]);

        $updrec = ser::findOrFail($record->id);
        $this->assertEquals($updrec->name, $updatedRecord->name);
        $this->assertEquals($updrec->description, $updatedRecord->description);
    }

    public function testIfRecordsCanBeDeleted(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(ser::class)->create();
        $response = $this->call('delete', 'exceptions/' . $record->id);
        $this->notSeeInDatabase('subscription_rule_exceptions', ['deleted_at' => null, 'id' => $record->id]);
    }
}
