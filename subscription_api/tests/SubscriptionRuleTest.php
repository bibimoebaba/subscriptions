<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\SubscriptionRule;

class SubscriptionRuleTest extends TestCase
{
    
	use DatabaseTransactions;

    public function testIndexStatusCode(){
        $this->get('rules')
            ->seeStatusCode(200);
    }

    public function testIfIndexRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        factory(SubscriptionRule::class, 10)->create();
        $subscriptionRule = SubscriptionRule::all();
        $this->assertCount(10, $subscriptionRule);
    }

    public function testShowStatusCode(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $first = factory(SubscriptionRule::class)->create();
        $this->get('rules/' . $first->id)->seeStatusCode(200);
    }

    public function testIfShowRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(SubscriptionRule::class)->create();
        $product = $this->get('rules/' . $record->id);
        $this->assertCount(1, $product);
    }

    public function testIfRightDataIsRetrieved(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(SubscriptionRule::class)->create();
        $this->seeInDatabase('subscription_rules', [
            'subscription_id'   => $record->subscription_id,
            'product_id'        => $record->product_id,
            'price'             => $record->price,
            'quantity'          => $record->quantity,
            'time_period'       => $record->time_period,
            'priority'          => $record->priority 
        ]);
    }

    public function testStoreStatusCode(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(SubscriptionRule::class)->make();
        $this->post('rules', [
            'subscription_id'   => $record->subscription_id,
            'product_id'        => $record->product_id,
            'price'             => $record->price,
            'quantity'          => $record->quantity,
            'time_period'       => $record->time_period,
            'priority'          => $record->priority 
            ])
            ->seeStatusCode(200);
    }

    public function testIfRecordsCanBeUpdated(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(SubscriptionRule::class)->create();
        $updatedRecord = factory(SubscriptionRule::class)->make();
        $product = SubscriptionRule::findOrFail($record->id);
        $product->update([
            'subscription_id'   => $updatedRecord->subscription_id,
            'product_id'        => $updatedRecord->product_id,
            'price'             => $updatedRecord->price,
            'quantity'          => $updatedRecord->quantity,
            'time_period'       => $updatedRecord->time_period,
            'priority'          => $updatedRecord->priority 
        ]);

        $updrec = SubscriptionRule::findOrFail($record->id);
        $this->assertEquals($updrec->subscription_id,   $updatedRecord->subscription_id);
        $this->assertEquals($updrec->product_id,        $updatedRecord->product_id);
        $this->assertEquals($updrec->price,             $updatedRecord->price);
        $this->assertEquals($updrec->quantity,          $updatedRecord->quantity);
        $this->assertEquals($updrec->time_period,       $updatedRecord->time_period);
        $this->assertEquals($updrec->priority,          $updatedRecord->priority);
    }

    public function testIfRecordsCanBeDeleted(){
        factory(App\Subscription::class)->create();
        factory(App\Product::class)->create();

        $record = factory(SubscriptionRule::class)->create();
        $response = $this->call('delete', 'rules/' . $record->id);
        $this->notSeeInDatabase('subscription_rules', ['deleted_at' => null, 'id' => $record->id]);
    }
}
